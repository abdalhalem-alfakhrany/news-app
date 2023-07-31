<div class="card article">
    @php
        $imageSource = asset('storage/articlesImages/' . $image);
    @endphp
    <a href="{{ route('article.show', $id) }}"><img class="card-img-top" src={{ $imageSource }} /></a>
    <div class="card-body">
        <div class="card-title">{{ $title }}</div>
        <div class="card-text">{{ $section1 }}</div>
    </div>
</div>
