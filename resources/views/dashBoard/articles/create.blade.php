@php
use App\Models\Category\Category;
use App\Models\Advertisement\ImageAdvertisement;
use App\Models\Advertisement\VideoAdvertisement;

$locale = request('locale') == '' ? app()->getLocale() : request('locale');

$video_advertisements = VideoAdvertisement::all()->map(function ($advertisement) {
    return [
        'text' => $advertisement['name'],
        'value' => $advertisement['id'],
    ];
});

$image_advertisements = ImageAdvertisement::all()->map(function ($advertisement) {
    return [
        'text' => $advertisement['name'],
        'value' => $advertisement['id'],
    ];
});

$categories = Category::all(['id'])->map(function ($category) use ($locale) {
    $translation = $category->TranslatedTo($locale, ['title'])->toArray();

    return [
        'value' => $category->id,
        'text' => $translation[0]['title'],
    ];
});
@endphp

@extends('layouts.dashBoard')
@section('content')
    <x-crud.create enctype="multipart/form-data" action="{{ route('article.store') }}">

        <x-forms.image.create title="image" name="image" />

        <x-forms.selectInput.create title="Video Advertisement" name="video_advertisement"
            :options="$video_advertisements" />

        <x-forms.urlInput.create title="video url" type="url" name="video_url" value="" />

        <x-forms.tabedFields :tabs="['arabic','french']">

            <x-slot name="arabic">
                <x-forms.textInput.create title="title" name="ar[title]" />
                <x-forms.textArea.create title="section 1" name="ar[section1]" />
                <x-forms.textArea.create title="section 2" name="ar[section2]" />
                <x-forms.textArea.create title="section 3" name="ar[section3]" />
            </x-slot>

            <x-slot name="french">
                <x-forms.textInput.create title="title" name="fr[title]" />
                <x-forms.textArea.create title="section 1" name="fr[section1]" />
                <x-forms.textArea.create title="section 2" name="fr[section2]" />
                <x-forms.textArea.create title="section 3" name="fr[section3]" />
            </x-slot>

        </x-forms.tabedFields>

        <x-forms.selectInput.create title="category" name="category" :options="$categories" />

        <x-forms.selectInput.create title="Advertisement Top" name="top_advertisement" :options="$image_advertisements" />
        <x-forms.selectInput.create title="Advertisement Middel" name="middle_advertisement"
            :options="$image_advertisements" />
        <x-forms.selectInput.create title="Advertisement Bottom" name="bottom_advertisement"
            :options="$image_advertisements" />

    </x-crud.create>
@endsection
