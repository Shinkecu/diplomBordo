@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Добавление нового мастера</h1>

    <form action="{{ route('masters.store') }}" method="POST" enctype="multipart/form-data" class="mb-4 border p-4 rounded shadow-sm bg-light">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="position">Должность</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="experience">Опыт (лет)</label>
            <input type="number" name="experience" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="education">Образование</label>
            <input type="text" name="education" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image" class="form-control-file mt-3">
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3">Добавить мастера</button>
    </form>
</div>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Редактирование мастеров</h1>

    @foreach ($masters as $master)
        <div class="mb-4 border p-4 rounded shadow-sm bg-light">
            <form action="{{ route('masters.update', ['master_id' => $master->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" class="form-control" value="{{ $master->name }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" name="phone" class="form-control" value="{{ $master->phone }}">
                </div>
                <div class="form-group">
                    <label for="position">Должность</label>
                    <input type="text" name="position" class="form-control" value="{{ $master->position }}" required>
                </div>
                <div class="form-group">
                    <label for="experience">Опыт (лет)</label>
                    <input type="number" name="experience" class="form-control" value="{{ $master->experience }}" required>
                </div>
                <div class="form-group">
                    <label for="education">Образование</label>
                    <input type="text" name="education" class="form-control" value="{{ $master->education }}">
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" class="form-control-file mt-3">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Сохранить изменения</button>
            </form>
            <div class="mt-3">
                <form action="{{ route('masters.destroy', ['master_id' => $master->id]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этого мастера?');">Удалить мастера</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
