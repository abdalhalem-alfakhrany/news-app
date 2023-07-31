@php
$locales = [
    'ar' => ['عربي', 'فرنسي'],
    'fr' => ['arabe', 'française'],
];
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <form action="{{ route('changeLocale') }}" method="post">
            @csrf
            <select onchange="this.form.submit()" name="locale" class="btn-light form-select">
                <option {{ $locale == 'ar' ? 'selected' : '' }} value="ar">{{ $locales[$locale][0] }}</option>
                <option {{ $locale == 'fr' ? 'selected' : '' }} value="fr">{{ $locales[$locale][1] }}</option>
            </select>
        </form>

        <a class="navbar-brand" href={{ route('dash-board.index') }}>Rim Lava</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#cruds"
            aria-controls="cruds" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="cruds">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest

                @else
                    @php
                        $cruds = [
                            [
                                'name' => [
                                    'single' => 'مستخدم',
                                    'plural' => 'مستخدمين',
                                ],
                                'routes' => [
                                    'اضف جديد' => route('user.create'),
                                    'اعرض الكل' => route('user.index'),
                                ],
                            ],
                            [
                                'name' => [
                                    'single' => 'مقال',
                                    'plural' => 'مقالات',
                                ],
                                'routes' => [
                                    'اضف جديد' => route('article.create'),
                                    'اعرض الكل' => route('article.index'),
                                ],
                            ],
                            [
                                'name' => [
                                    'single' => 'قسم',
                                    'plural' => 'اقسام',
                                ],
                                'routes' => [
                                    'اضف جديد' => route('category.create'),
                                    'اعرض الكل' => route('category.index'),
                                ],
                            ],
                            [
                                'name' => [
                                    'single' => 'اعلان',
                                    'plural' => 'اعلانات',
                                ],
                                'routes' => [
                                    'اضف جديد' => route('advertisement.create'),
                                    'اعرض كل اعلانات الصور' => route('image-advertisement.index'),
                                    'اعرض كل اعلانات الفديو' => route('video-advertisement.index'),
                                    'اعرض كل اعلانات الصفحة الرئيسية' => route('home-page-advertisement.index'),
                                ],
                            ],
                        ];
                    @endphp
                    @foreach ($cruds as $crud)

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id={{ $crud['name']['single'] . '-id' }}
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $crud['name']['plural'] }}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby={{ $crud['name']['single'] . '-id' }}>

                                @foreach ($crud['routes'] as $name => $route)
                                    <li>
                                        <a class="dropdown-item" href={{ $route }}>{{ $name }}</a>
                                    </li>
                                @endforeach

                            </ul>

                        </li>

                    @endforeach
                @endguest
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest

                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" tabindex="-1" aria-disabled="true">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active " style="cursor: pointer" aria-current="page"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">تسجيل
                            الخروج</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    <li>
                        <a href="nav-link" href="{{ route('dash-board.index') }}" Dash Borad></a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
