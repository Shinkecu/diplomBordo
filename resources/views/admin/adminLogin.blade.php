@extends('layout')

@section('content')
<link href="/css/admin.css" rel="stylesheet">
<div class="leaf left"></div>
<div class="leaf right"></div>
<h1 class="text-center m-5">Вход в панель администратора</h1>

<div class="p-4 mx-auto form-container m-5" style="max-width: 800px;">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authenticate') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Login</label>
            <input type="text" name="login" class="form-control form-line" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label form-line">Password</label>
            <input type="password" name="password" class="form-control form-line" id="exampleInputPassword1" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn form_button">Войти</button>
        </div>
    </form>
</div>
@endsection
