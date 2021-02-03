<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('assets.header')
</head>

    <body class="hold-transition sidebar-mini layout-fixed">

        @include('site.navbar')

        @include('site.sidebar')

        @include('assets.modalsAlerts')

        @include('assets.alerts')

        @yield('content')

        @include('site.footer')

        @include('assets.scriptsFooter')

    </body>
</html>
