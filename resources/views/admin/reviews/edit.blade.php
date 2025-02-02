@extends('layout')

@section('content')
<div class="container">
    <h1>Редактировать отзыв</h1>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $review->name }}" required>
        </div>
        <div class="form-group">
            <label for="content">Содержимое</label>
            <input type="text" name="content" id="content" class="form-control" value="{{ $review->content }}" required>
        </div>
        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $review->created_at->format('d m y')}}" required>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image" id="image" class="form-control">
            <small>Оставьте пустым, если не хотите изменять изображение.</small>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection
