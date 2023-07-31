@extends('layouts.web')
@section('content')
    @foreach ($categoriesWithArticles as $i => $categoryWithArticle)

        @if (count($advertisements) > 0)
            @php
                $advertisementImage = asset('storage/advertisementsImages/' . array_pop($advertisements));
            @endphp
            <img class="col-12 mx-5" src="{{ $advertisementImage }}" alt="">
        @endif

        <div class="col-12 mx-5 d-flex justify-content-center">
            <div style=" font-size: 35px;">{{ $categoryWithArticle['category'] }}</div>
        </div>

        @foreach ($categoryWithArticle['articles'] as $article)
            <x-web.articleCard :id="$article['id']" :image="$article['image']" :title="$article['title']"
                :section1="$article['section1']" />
        @endforeach

    @endforeach
@endsection
