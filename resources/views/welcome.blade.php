<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="vi" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="title" content="Todo aplication using laravel and vuejs" />
    <meta name="description" content="Todo aplication using laravel and vuejs" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name="revisit-after" content="1 day" />
    <meta name="google" content="nositelinkssearchbox" />
    <meta name="googlebot" content="nositelinkssearchbox" />
    <meta name="keywords" content="Todo aplication, laravel framework, vuejs" />
    <meta name="author" content="Tuquoctuan - quoctuanit2018@gmail.com" />
    <meta property="og:title" content="Todo aplication using laravel and vuejs" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://tqttodo.herokuapp.com/" />
    <link rel="shortcut icon" type="image" href="{{ asset('img/favicon.png') }}" />
    <meta property="og:image" content="{{ asset('img/cover.jpg') }}" />
    <meta property="og:description" content="Todo aplication using laravel and vuejs" />
    <meta property="og:site_name" content="Todo aplication" />
    <title>Todo List</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>

<body>
    <div id="app">
        <app></app>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
