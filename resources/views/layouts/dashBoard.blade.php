<!doctype html>
<html lang="ar" dir="rtl">
@php
$locale = app()->getLocale();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('includes.navs.dashBoard')
        <main class="py-4 container d-flex justify-content-center">
            <div class="row w-100">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

</html>
