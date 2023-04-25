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

        @yield('content')

      @include('components.footer')
    </body>
</html>
