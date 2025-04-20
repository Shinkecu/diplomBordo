@extends('layout')
@section('content')
<link href="/css/categoriesServices.css" rel="stylesheet">
<div class="container mb-5 mt-5">
    <h1>Услуги</h1>
    <a href="{{ route('services.create') }}" class="btn btn-green">Добавить услугу</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Категория</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->category->name }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-green">Редактировать</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
