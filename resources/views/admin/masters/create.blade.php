@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Добавить нового мастера</h1>

    <form action="{{ route('masters.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="position" class="form-label">Должность</label>
                    <input type="text" name="position" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="experience" class="form-label">Опыт (лет)</label>
                    <input type="number" name="experience" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="education" class="form-label">Образование</label>
                    <input type="text" name="education" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Изображение</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Добавить мастера</button>
    </form>
</div>
@endsection
