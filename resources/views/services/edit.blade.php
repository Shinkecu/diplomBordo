@extends('layout')

@section('content')
<div class="container mb-5 mt-5">
<link href="{{ asset('css/categoriesServices.css') }}" rel="stylesheet">
    <h1>Редактировать услугу</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" required>{{ $service->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" name="price" class="form-control" value="{{ $service->price }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $service->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Обновить</button>
    </form>
</div>
@endsection
