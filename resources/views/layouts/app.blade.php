<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>

    <style>
        body { padding-bottom: 100px; }
        .level { display: flex; align-items: center; }
        .flex { flex: 1; }
        button.btn { outline: none; }
        .page-header { padding-bottom: 10px; margin: 44px 0 22px; border-bottom: 1px solid #eee; }
        .ml-a { margin-left: auto; }
        .mr-a { margin-right: auto; }
        [v-cloak] { display: none; }
        .ais-highlight > em { background-color: yellow; font-style: normal; }
        .ais-refinement-list__checkbox { margin-right: 1em; }
        .ais-refinement-list__count { font-style: italic; font-weight: 500; }
        pre { background-color: #efefef; padding: 1em; border: 1px solid #bdbdbd; border-radius: 0.25rem }
    </style>

    @yield('head')
</head>
<body>
    <div id="app">
        @include('layouts.nav')

        <main class="py-4">
            @yield('content')
        </main>

    <flash message="{{ session('flash') }}"></flash>
    </div>
    @yield('scripts')
</body>
</html>
