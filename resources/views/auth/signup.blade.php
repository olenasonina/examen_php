@extends('layouts.layout')

@section('sidebar')

@endsection
@section('main_content')

@endsection

@section('form')

<div class='row'>
    <div class='col-lg-4 mx-auto my-5'>
        <h3>Регистрация</h3>
        <form method='POST' action="{{ route('authSignup') }}" novalidate>
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя (для контакта с вами):<span style="color:red;"> *</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Имя для контакта с вами" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Ваш email:<span style="color:red;"> *</span></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Например, user@gmail.com" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль:<span style="color:red;"> *</span></label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Минимум 6 символов" value="">
                @error('password')
                <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Создать аккаунт</button>
        </form>
    </div>
</div>



@endsection