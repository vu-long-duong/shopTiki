<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tiki-Home</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resset.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome.com/releases/v6.5.2/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body class="antialiased">
    <div class="app">
        <div class="header-container" id="header-container"></div>

        <div class="app__container">
            <div class="grid pdt-16 pdb-16 gap-16" style="align-items: start; overflow: visible;">
                <div class="column-3" id="nav-container" style="position: sticky; top:16px;"></div>
                <div class="column-12">
                    <div class="row content">
                        <div class="slide-container bg-white border-radius-12" id="slide-container"></div>
                        <div class="promotion-container bg-white border-radius-12" id="promotion-container"></div>
                        <div class="super-promotion-container bg-white border-radius-12" id="super-promotion-container">
                        </div>
                        <div class="product-interest-container bg-white border-radius-12"
                            id="product-interest-container"></div>
                        <div class="product-price-shock-container bg-white border-radius-12"
                            id="product-price-shock-container"></div>
                        <div class="genuine-brand-container bg-white border-radius-12" id="genuine-brand-container">
                        </div>
                        <div class="genuine-import-container bg-white border-radius-12" id="genuine-import-container">
                        </div>
                        <div class="might-like-container bg-white border-radius-12" id="might-like-container"></div>
                        <div class="today-suggestion-container border-radius-12" id="today-suggestion-container"></div>
                        <div class="footer-container" id="footer-container"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
