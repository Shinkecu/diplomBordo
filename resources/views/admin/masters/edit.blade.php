@extends('layout')

@section('content')
<div class="container mb-5 mt-5">
    <h1 class="mb-4 text-center">Редактирование мастера</h1>

    <form action="{{ route('masters.update', ['master_id' => $master->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" name="name" class="form-control" value="{{ $master->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="text" name="phone" class="form-control" value="{{ $master->phone }}">
                </div>
                <div class="form-group mb-3">
                    <label for="position" class="form-label">Должность</label>
                    <input type="text" name="position" class="form-control" value="{{ $master->position }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="experience" class="form-label">Опыт (лет)</label>
                    <input type="number" name="experience" class="form-control" value="{{ $master->experience }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="education" class="form-label">Образование</label>
                    <input type="text" name="education" class="form-control" value="{{ $master->education }}">
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Сохранить изменения</button>
    </form>

    <!-- Услуги мастера -->
    <div class="mt-4">
        <h4 class="mb-3">Услуги мастера</h4>
        <ul class="list-group mb-3">
            @foreach ($master->services as $service)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $service->name }} ({{ $service->category->name }})
                    <form action="{{ route('masters.detachService', ['master_id' => $master->id, 'service_id' => $service->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <!-- Форма добавления услуги -->
        <form action="{{ route('masters.attachService', ['master_id' => $master->id]) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="service_id" class="form-label">Добавить услугу</label>
                <select name="service_id" class="form-select" required>
                    <option value="" disabled selected>Выберите услугу</option>
                    @foreach ($categories as $category)
                        <optgroup label="{{ $category->name }}">
                            @foreach ($category->services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100">Добавить услугу</button>
        </form>
    </div>
</div>
@endsection
