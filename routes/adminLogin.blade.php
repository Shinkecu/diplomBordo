@extends('layout')
@section('content')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <div class="leaf left"></div>
<div class="leaf right"></div>
    <h1 class="text-center m-5">Вход в панель администратора </h1>

    <div class="p-4 mx-auto form-container m-5" style="max-width: 800px;">
        <form action="{{route('authenticate')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label  ">login</label>
                <input type="text" class="form-control form-line" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label  form-line">Password</label>
                <input type="password" class="form-control form-line" id="exampleInputPassword1">
            </div>
            <div class="text-center">
                <button type="submit" class="btn form_button">Войти</button>
            </div>
        </form>
    </div>
@endsection
