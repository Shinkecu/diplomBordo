@extends('layout')

@section('content')
<link href="/css/categoriesServices.css" rel="stylesheet">
    <div class="container mb-5 mt-5">
    <h1>Добавить категорию</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-green">Сохранить</button>
    </form>
</div>
@endsection
