@extends('layout')
@section('content')
<link href="{{ asset('css/categoriesServices.css') }}" rel="stylesheet">
<div class="container mb-5 mt-5">
    <h1>Категории</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Добавить категорию</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Редактировать</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
