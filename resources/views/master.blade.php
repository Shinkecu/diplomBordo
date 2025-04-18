@extends('layout')
@section('content')
    <link href="/css/master.css" rel="stylesheet">
    <div class="leaf left"></div>
    <div class="leaf right"></div>
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset($master->image) }}" alt="Master" class="img-fluid rounded master-image">
            </div>
            <div class="col-md-8">
                <h1 class="master-information-name">{{ $master->name }}</h1>
                <ul class="list-unstyled">
                    <li class="master-info">Телефон: <nobr>{{ $master->phone ?? 'Не указано' }}</nobr>
                    </li>
                    <li class="master-info">Должность: <nobr>{{ $master->position }}</nobr>
                    </li>
                    <li class="master-info">Стаж работы: <nobr>{{ $master->experience }} лет</nobr>
                    </li>
                    <li class="master-info">Обучение: <nobr>{{ $master->education ?? 'Не указано' }}</nobr>
                    </li>
                </ul>
                <a href="#" class="btn master-information-button">Записаться</a>
            </div>
        </div>
    </div>
    <div class="slider-container">
        <h1 class="slider-names">ФОТО РАБОТ МАСТЕРА:</h1>
        <div class="slider">
            @foreach ($images as $image)
                <img src="{{ asset($image->path) }}" alt="{{ $image->name }}">
            @endforeach
        </div>
    </div>

    <div class="services">
        <h1 class="master-services-name">УСЛУГИ МАСТЕРА:</h1>
        <div class="services_container">
            @foreach ($master->services->groupBy('category_id') as $categoryId => $services)
                @php
                    $category = $services->first()->category; // Предполагается, что у вас есть связь в модели Service
                @endphp
                <div class="service">
                    <button class="service-button">{{ $category->name }}<p class="service-arrow">&#5167;</p></button>
                    <div class="service-list">
                        @foreach ($services as $service)
                            <div class="service-card">
                                <a href="{{ route('serviceInformation', ['id' => $service->id]) }}">
                                    <h3 class="service-title">{{ $service->name }}</h3>
                                    <p class="service-price">{{ $service->price }} руб.</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.querySelectorAll('.service-button').forEach(button => {
            button.addEventListener('click', () => {
                const service = button.parentElement;

                document.querySelectorAll('.service').forEach(item => {
                    if (item !== service) {
                        item.classList.remove('open');
                    }
                });

                service.classList.toggle('open');
            });
        });
    </script>
@endsection
