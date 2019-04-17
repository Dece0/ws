<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-eq class=""uiv="X-UA-Compatible" content="ie=edge">
    <title>WS | @yield('title', 'Data')</title>
    <link rel="icon" href="{{ asset('/images/icon.ico') }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.min.css') }}" >
    <!-- Script -->
    @yield('scripts')
    <script src="{{ asset('/js/app.js') }}" defer> </script>
</head>
<body class="body" id="body">

    <header class="header" id="header">
            @yield('header')
    </header>

    <main class="main">
        <section v-cloak class="{{ Request::segment(1) ? Request::segment(1) : "index" }}" id="app">
            <info-component></info-component>
            <navigation-component 
                :links="{{ json_encode($nav_links) }}"
                :current="{{ json_encode(Request::segment(1)) }}"
                :name="'Weather Station 2k18'"
            >
            </navigation-component>
            @yield('content')
        </section>
    </main>
    
    <footer class="footer">
        @section('footer')
            © Weather Station 2018 - All rights reserved
        @show
    </footer>
</body>
</html>