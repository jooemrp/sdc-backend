<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIPS Digital Creative</title>
</head>
<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
</body>
</html>
