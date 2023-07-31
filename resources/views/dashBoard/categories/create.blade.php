@php
use App\Models\Advertisement\ImageAdvertisement;
$advertisements = ImageAdvertisement::all();
@endphp

@extends('layouts.dashBoard')
@section('content')
    <x-crud.create enctype="multipart/form-data" action="{{ route('category.store') }}">

        <x-forms.image.create image_src="" title="image" name="image" />

        <x-forms.tabedFields :tabs="['arabic','french']">

            <x-slot name="arabic">
                <x-forms.textInput.create title="title" name="ar[title]" />
            </x-slot>

            <x-slot name="french">
                <x-forms.textInput.create title="title" name="fr[title]" />
            </x-slot>

        </x-forms.tabedFields>

        <div class="form-group">
            <label>Advertisements</label>
            <select class="form-control" name="advertisements[]" multiple>
                @foreach ($advertisements as $advertisement)
                    <option value="{{ $advertisement['id'] }}">
                        {{ $advertisement['name'] }}
                    </option>
                @endforeach
            </select>
        </div>

    </x-crud.create>
@endsection
