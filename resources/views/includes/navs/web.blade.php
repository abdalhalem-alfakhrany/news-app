@php
use App\Models\Category\Category;
$categories = Category::all(['id'])->map(function ($category) {
    return ['id' => $category->id, 'title' => $category->translatedTo(app()->getLocale(), ['title'])[0]['title']];
});
$locales = [
    'ar' => ['عربي', 'فرنسي'],
    'fr' => ['arabe', 'française'],
];
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <form action="{{ route('changeLocale') }}" method="post">
            @csrf
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group" dir="{{ $locale == 'ar' ? 'rtl' : 'ltr' }}">
                <input onchange="this.form.submit()" type="radio" value="ar" class="btn-check" name="locale" id="arbtn">
                <label class="btn btn-outline-primary {{ $locale == 'ar' ? 'disabled' : '' }}" for="arbtn">عربي</label>

                <input onchange="this.form.submit()" type="radio" value="fr" class="btn-check" name="locale" id="frbtn">
                <label class="btn btn-outline-primary {{ $locale == 'fr' ? 'disabled' : '' }}" for="frbtn">فرنسي</label>
            </div>
        </form>

        <a class="navbar-brand" href="#">
            <img src="{{asset('images/logo.png')}}" alt="" width="70" height="70" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#cruds"
            aria-controls="cruds" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="cruds">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($categories as $category)
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link"
                            href={{ route('category.show-posts', $category['id']) }}>{{ $category['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
