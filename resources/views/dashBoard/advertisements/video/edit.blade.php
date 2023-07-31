@extends('layouts.dashBoard')
@section('content')
    <x-crud.edit enctype="multipart/form-data" action="{{ route('video-advertisement.update', $data['id']) }}">
        @php
            $video = asset('storage/advertisementsVideos/' . $data['video']);
        @endphp
        <x-forms.video.edit :video_src="$video" title="Video" name="video" />
        <x-forms.textInput.edit title="Name" name="name" :value="$data['name']" />
    </x-crud.edit>
@endsection
