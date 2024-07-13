<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div>
        @include('inc/header')
    </div>
<div class="container">
    @yield('content')
</div>
<script src="{{asset('js/script.bundel.min.js')}}"></script>
</body>
</html>