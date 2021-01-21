<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('assets.header')
</head>

    <body class="hold-transition sidebar-mini layout-fixed">        
        
        @include('site.navbar')

        @include('site.sidebar')

        @yield('content')

        @include('assets.footer')

        @include('assets.scriptsFooter')

    </body>
</html>