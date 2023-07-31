@php
use App\Models\Category\Category;
use App\Models\Advertisement\ImageAdvertisement;
use App\Models\Advertisement\VideoAdvertisement;

$locale = request('locale') == '' ? app()->getLocale() : request('locale');

$image = asset('storage/articlesImages/' . $article['image']);

$video_advertisements = VideoAdvertisement::all()->map(function ($advertisement) {
    return [
        'text' => $advertisement['name'],
        'value' => $advertisement['id'],
    ];
});

$advertisements = ImageAdvertisement::all()->map(function ($advertisement) {
    return [
        'value' => $advertisement['id'],
        'text' => $advertisement['name'],
    ];
});

$categories = Category::all(['id'])->map(function ($category) use ($locale) {
    $translation = $category->TranslatedTo($locale, ['title'])->toArray();
    return [
        'value' => $category['id'],
        'text' => $translation[0]['title'],
    ];
});
@endphp

@extends('layouts.dashBoard')
@section('content')
    <x-crud.edit enctype="multipart/form-data" action="{{ route('article.update', $article['id']) }}">

        <x-forms.image.edit :image_src="$image" title="image" name="image" />

        <x-forms.selectInput.edit title="Video Advertisement" name="video_advertisement"
            :selected="$article['video_advertisement_id']" :options="$video_advertisements" />

        <x-forms.urlInput.edit title="video url" :value="$article['video_url']" name="video_url" />

        <x-forms.tabedFields :tabs="['arabic','french']">

            <x-slot name="arabic">
                <x-forms.textInput.edit title="title" name="ar[title]" :value="$ar['title']" />
                <x-forms.textArea.edit title="section 1" name="ar[section1]">{{ $ar['section1'] }}</x-forms.textArea.edit>
                <x-forms.textArea.edit title="section 2" name="ar[section2]">{{ $ar['section2'] }}</x-forms.textArea.edit>
                <x-forms.textArea.edit title="section 3" name="ar[section3]">{{ $ar['section3'] }}</x-forms.textArea.edit>
            </x-slot>

            <x-slot name="french">
                <x-forms.textInput.edit title="title" name="fr[title]" :value="$fr['title']" />
                <x-forms.textArea.edit title="section 1" name="fr[section1]">{{ $fr['section1'] }}</x-forms.textArea.edit>
                <x-forms.textArea.edit title="section 2" name="fr[section2]">{{ $fr['section2'] }}</x-forms.textArea.edit>
                <x-forms.textArea.edit title="section 3" name="fr[section3]">{{ $fr['section3'] }}</x-forms.textArea.edit>
            </x-slot>

        </x-forms.tabedFields>

        <x-forms.selectInput.edit title="category" name="category" :options="$categories"
            :selected="$article['category']" />

        <x-forms.selectInput.edit :selected="$article['top_advertisement']" title="Advertisement Top"
            name="top_advertisement" :options="$advertisements" />
        <x-forms.selectInput.edit :selected="$article['middle_advertisement']" title="Advertisement Middel"
            name="middle_advertisement" :options="$advertisements" />
        <x-forms.selectInput.edit :selected="$article['bottom_advertisement']" title="Advertisement Bottom"
            name="bottom_advertisement" :options="$advertisements" />

    </x-crud.edit>
@endsection
