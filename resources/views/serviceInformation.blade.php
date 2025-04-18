@extends('layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif
    <link href="/css/createOrder.css" rel="stylesheet">
    <div class="leaf left"></div>
    <div class="leaf right"></div>
    <div class="container py-5">
        <h1 class="text-center text-uppercase mb-4">{{ $service->name }}</h1>
        <p class="text-muted mb-5 service-description">{{ $service->description }}</p>
        <div class="slider-container">
            <div class="slider">
                @foreach ($images as $image)
                <img src="{{ asset($image->path) }}" alt="{{ $image->name }}">
                @endforeach
            </div>
        </div>
        <style>
            .slider-container {
                overflow: hidden;
                width: 70%;
                margin: auto;
                position: relative;
                margin-top: 100px;
                margin-bottom: 100px;
            }

            .slider {
                display: flex;
                animation: slide 30s infinite;
            }

            .slider img {
                width: 100%;
                border-radius: 10px;
                margin: 0 20px;
            }

            @keyframes slide {
                0% {
                    transform: translateX(0);
                }

                50% {
                    transform: translateX(-50%);
                }

                100% {
                    transform: translateX(0);
                }
            }

            .slider-names {
                margin-top: 20px;
            }
        </style>


        <div class="p-4 mx-auto form-container" style="max-width: 800px;">
            <form action="{{ route('createOrder' , [$id = $service->id])  }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="master" class="form-label">Ваше Имя</label>
                    <input class="form-control form-line" type="text" name="name" aria-label="default input example">
                </div>
                <div class="mb-3">
                    <label for="master" class="form-label">Выберите Мастера</label>
                    <select class="form-select form-line" name="master" aria-label="Default select example">
                        @foreach ($masters as $master)
                            <option value="{{ $master->id }}">{{ $master->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="date" class="form-label">Выберите Дату</label>
                        <input type="date" id="date" name="date" class="date-form form-control form-line"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="time" class="form-label">Выберите Время</label>
                        <select id="time" name="time" class="date-form form-control form-line" required>
                            <option value="">Выберите время</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="tel" id="phone" name="phone" class="form-control form-line" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn form_button">Записаться</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#date').change(function() {
                var selectedDate = $(this).val();
                var masterId = $('select[name="master"]').val();

                if (selectedDate && masterId) {
                    $.ajax({
                        url: '/getAvailableTimes/' + masterId + '/' + selectedDate,
                        type: 'GET',
                        success: function(response) {
                            console.log(response); // Проверьте, что данные приходят в консоли
                            var timeSelect = $('#time');
                            timeSelect.empty();
                            timeSelect.append('<option value="">Выберите время</option>');

                            // Добавляем доступные времена в выпадающий список
                            response.forEach(function(time) {
                                var option = $('<option>').val(time).text(time);
                                timeSelect.append(option);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Ошибка при получении данных:', error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
