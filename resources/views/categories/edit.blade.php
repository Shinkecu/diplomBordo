@extends('layout')

@section('content')
<link href="/css/categoriesServices.css" rel="stylesheet">
<div class="container mb-5 mt-5">
    <h1>Редактировать категорию</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" required>{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-green">Обновить</button>
    </form>
</div>
@endsection
