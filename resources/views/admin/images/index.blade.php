<!-- resources/views/admin/images/index.blade.php -->

@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Управление изображениями</h1>

    <div class="card mb-4">
        <div class="card-header">Добавить новое изображение</div>
        <div class="card-body">
            <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Изображение</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Название изображения</label>
                            <input type="text" name="name" class="form-control" required>
                            <small class="text-muted">
                                Для отображения на главной странице используйте специальные названия:
                                <ul>
                                    <li>"РаботаМаникюрщиц" - для работ маникюра</li>
                                    <li>"РаботаПарикмахера" - для работ парикмахеров</li>
                                </ul>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="master_id" class="form-label">Мастер (необязательно)</label>
                            <select name="master_id" class="form-select">
                                <option value="">Не привязывать к мастеру</option>
                                @foreach($masters as $master)
                                    <option value="{{ $master->id }}">{{ $master->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="service_id" class="form-label">Услуга (необязательно)</label>
                            <select name="service_id" class="form-select">
                                <option value="">Не привязывать к услуге</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Описание (необязательно)</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-green">Загрузить</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Список изображений</div>
        <div class="card-body">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="/{{$image->path}}" class="card-img-top" alt="{{ $image->description }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $image->name }}</h5>
                                @if($image->master)
                                    <p class="card-text">Мастер: {{ $image->master->name }}</p>
                                @endif
                                @if($image->service)
                                    <p class="card-text">Услуга: {{ $image->service->name }}</p>
                                @endif
                                @if($image->description)
                                    <p class="card-text">{{ $image->description }}</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
