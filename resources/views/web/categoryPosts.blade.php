@extends('layouts.web')
@section('content')
    {{-- {{ $pages }} --}}
    @foreach ($articles as $i => $article)
        @if ($i % 4 == 0)
            @if (count($advertisements) > 0)
                @php
                    $advertisementImage = asset('storage/advertisementsImages/' . array_pop($advertisements));
                @endphp
                <img class="col-12 mx-5" src="{{ $advertisementImage }}" alt="">
            @endif
        @endif
        <x-web.articleCard :id="$article['id']" :image="$article['image']" :title="$article['title']"
            :section1="$article['section1']" />
    @endforeach
    @include('includes.paginators.web')
@endsection
