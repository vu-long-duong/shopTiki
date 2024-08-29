<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tiki-Home</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('client/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/resset.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="{{ asset('client/fonts/fontawesome.com/releases/v6.5.2/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/main.css') }}">

</head>

<body class="antialiased">
    <div class="app">
        @include('client.layouts.header')

        <div class="app__container">
            <div class="grid pdt-16 pdb-16 gap-16" style="align-items: start; overflow: visible;">
                @include('client.layouts.navbar')
                <div class="column-12">
                    <div class="row content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>
    @stack('scripts')

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
