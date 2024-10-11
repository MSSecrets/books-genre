<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Full Stack Tech Test</title>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            @include('partials.header')
            <div class="sm:max-w-full md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl mx-auto my-10">
                @yield('content')
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
