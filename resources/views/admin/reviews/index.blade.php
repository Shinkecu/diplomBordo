@extends('layout')

@section('content')
<div class="container">
    <h1>Отзывы</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Содержимое</th>
                <th>Дата</th>
                <th>Изображение</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->content }}</td>
                    <td>{{ $review->created_at->format('d m y') }}</td>
                    <td>
                        @if($review->image)
                            <img src="{{ asset($review->image) }}" alt="Изображение отзыва" style="width: 50px; height: auto;">
                        @else
                            Нет изображения
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
