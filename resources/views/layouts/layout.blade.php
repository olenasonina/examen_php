<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>{{ $title }}</title>
</head>
<body>

@section('navbar')

<nav>
<ul class='navbar-nav ml-auto'>
    @if(Auth::check())
    <li class='navbar-item'><a href="#" class='nav-link'>{{ Auth::user()->getName() }}</a></li>
    <li class='navbar-item'><a href="{{ route('authSignout') }}" class='nav-link'>Выйти</a></li>
    @else
    <li class='navbar-item'><a href="{{ route('authSignup') }}" class='nav-link'>Зарегистрироваться</a></li>
    <li class='navbar-item'><a href="{{ route('authSignin') }}" class='nav-link'>Войти</a></li>
    @endif
</ul>
</ul>
</nav>

@endsection

@yield('navbar')

@section('header')

<div>
<div>Шапка</div>
</div>

@show

    <div class='container'>
        <div class='row'>
            @section('sidebar')
            <div class='col-4'>Sidebar</div>
            @show
            @section('main_content')
            <!-- <div class='col-8'>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, officiis?</p>
            </div> -->
            @show
            <div class='col-12'>
            @section('form')
            
            @show
            </div>
        </div>
    </div>
</body>
</html>