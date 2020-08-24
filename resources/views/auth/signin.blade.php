@extends('layouts.layout')

@section('sidebar')

@endsection
@section('main_content')

@endsection

@section('form')

<div class='row'>
    <div class='col-lg-4 mx-auto'>
        <h3>Войти на сайт</h3>
        <form method='POST' action="{{ route('authSignin') }}" novalidate>
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Например, user@gmail.com" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Минимум 6 символов" value="">
                @error('password')
                <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input name="remember" type="checkbox" class="custom-control-input" id="remember">
                <label class="custom-control-label" for="remember">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</div>



@endsection