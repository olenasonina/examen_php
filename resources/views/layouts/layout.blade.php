<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>{{ $title }}</title>
</head>

<body>
    @section('navbar')
    @include('contents.navbar')
    @show

    @section('alert')
    @include('contents.alert')
    @show



    <div class='container'>
        <div class='row'>
            @section('sidebar')
            @show

            @section('main_content')
            @show
        </div>
    </div>

    @section('form')
    @show

</body>

</html>