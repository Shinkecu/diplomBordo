@extends('layout')
@section('content')
<style>

.form_button {
    background-color: #66836E;
    color: white;
    border-radius: 15px;
    padding: 15px 30px; /* Увеличиваем внутренние отступы для кнопки */
    font-size: 18px; /* Увеличиваем размер шрифта кнопки */
}

.form-line {
    border-radius: 15px;
    font-size: 16px; /* Увеличиваем размер шрифта */
    padding: 10px; /* Увеличиваем внутренние отступы */
}

.form-container {
    background-color: #EAEAEA;
    border-radius: 15px;
    padding: 20px; /* Добавляем отступы внутри формы */
}

/* Стили для светлого текста внутри полей */
.form-control::placeholder {
    color: #B0B0B0; /* Цвет текста плейсхолдера */
    opacity: 1; /* Убираем прозрачность */
}
.date-form,
.form-select {
    font-family: 'playfair';
}

</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="p-4 mx-auto form-container m-5" style="max-width: 800px;">
    <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
        <h1 class="text-center">Оставить отзыв!</h1>
        @csrf
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="master" class="form-label">Ваше Имя</label>
            <input class="form-control form-line" type="text" name="name" aria-label="default input example">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Телефон</label>
            <input type="tel" id="phone" name="phone" class="form-control form-line" required>
        </div>
        </div>
            <div class="col-md-12">
                <label for="content" class="form-label">Ваш Отзыв</label>
                <input type="text" id="date" name="content" class="date-form form-control form-line"
                    required>
            </div>
            <div class="col-md-12">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" name="image" class="date-form form-control form-line">
            </div>


        <div class="text-center mt-5">
            <button type="submit" class="btn form_button">Записаться</button>
        </div>
    </form>
</div>

@endsection
