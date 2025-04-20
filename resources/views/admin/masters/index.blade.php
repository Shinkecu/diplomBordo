@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Список мастеров</h1>

    <a href="{{ route('masters.create') }}" class="btn btn-green mb-4">Добавить нового мастера</a>

    @foreach ($masters as $master)
        <div class="mb-4 border p-4 rounded shadow-sm bg-light">
            <h3>{{ $master->name }}</h3>
            <p>Телефон: {{ $master->phone }}</p>
            <p>Должность: {{ $master->position }}</p>
            <p>Опыт: {{ $master->experience }} лет</p>
            <p>Образование: {{ $master->education }}</p>

            <a href="{{ route('masters.edit', ['master_id' => $master->id]) }}" class="btn btn-primary">Редактировать</a>

            <form action="{{ route('masters.destroy', ['master_id' => $master->id]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этого мастера?');">Удалить</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
