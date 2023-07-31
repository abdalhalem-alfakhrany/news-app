@extends('layouts.dashBoard')
@section('content')
    <x-crud.edit enctype="multipart/form-data" action="{{ route('image-advertisement.update', $data['id']) }}">
        @php
            $image = asset('storage/advertisementsImages/' . $data['image']);
        @endphp
        <x-forms.image.edit :image_src="$image" title="Image" name="image" />
        <x-forms.textInput.edit title="Name" name="name" :value="$data['name']" />
    </x-crud.edit>
@endsection
