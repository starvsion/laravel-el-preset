<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <base href="{{env('APP_URL')}}">
    </head>
    <body>
        <div id="app">
            <el-container>
                <el-header>
                    <navigation :has-login="true" :has-register="true"/>
                </el-header>
                <el-main>
                    @yield('content')
                </el-main>
            </el-container>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>