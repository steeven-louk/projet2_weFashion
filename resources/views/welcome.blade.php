<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>We Fashion</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->



            @include('modules._module')

    </head>
    <body class="antialiased text-white bg-dark">
      @include('components.navbar')

        {{-- @yield('content') --}}


        <div class="container">
            <header class="p-5 bg-success">
                <h1 class="display-2 mx-auto fw-semibold text-uppercase">ceci est le header du site de vente</h1>
            </header>
            <span class="result my-3 text-capitalize text-end d-block">result(4)</span>
        
            <div class="articleContainer px-2">
                @include('components.card')
            </div>
        </div>


      @include('components.footer')
    </body>
</html>
