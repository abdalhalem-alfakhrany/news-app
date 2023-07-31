@php
use App\Models\Advertisement\ImageAdvertisement;
$advertisements = ImageAdvertisement::all();
$image = asset('storage/categoriesImages/' . $category['image']);
@endphp

@extends('layouts.dashBoard')
@section('content')
    <x-crud.edit enctype="multipart/form-data" action="{{ route('category.update', $category['id']) }}">

        <x-forms.image.edit title="image" :image_src="$image" name="image" />

        <x-forms.tabedFields :tabs="['arabic','french']">

            <x-slot name="arabic">
                <x-forms.textInput.edit title="title" name="ar[title]" :value="$ar['title']" />
            </x-slot>

            <x-slot name="french">
                <x-forms.textInput.edit title="title" name="fr[title]" :value="$fr['title']" />
            </x-slot>

        </x-forms.tabedFields>

        <div class="form-group">
            <label>Advertisements</label>
            <select class="form-control" name="advertisements[]" multiple>
                @foreach ($advertisements as $advertisement)
                    <option value="{{ $advertisement['id'] }}"
                        {{ in_array($advertisement['id'], $category_advertisements) ? 'selected' : '' }}>
                        {{ $advertisement['name'] }}
                    </option>
                @endforeach
            </select>
        </div>

    </x-crud.edit>
@endsection
