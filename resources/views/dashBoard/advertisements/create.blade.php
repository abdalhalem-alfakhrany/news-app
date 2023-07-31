@extends('layouts.dashBoard')
@section('content')
    <x-forms.tabedFields :tabs="['image','video']">
        <x-slot name='image'>
            <x-crud.create enctype="multipart/form-data" action="{{ route('image-advertisement.store') }}">
                <x-forms.image.create title="Image" name="image" />
                <x-forms.textInput.create title="name" name="name" />
            </x-crud.create>
        </x-slot>
        <x-slot name='video'>
            <x-crud.create enctype="multipart/form-data" action="{{ route('video-advertisement.store') }}">
                <x-forms.video.create title="Video" name="video" />
                <x-forms.textInput.create title="name" name="name" />
            </x-crud.create>
        </x-slot>
    </x-forms.tabedFields>
@endsection
