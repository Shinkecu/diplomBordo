@extends('layout')
@section('content')
    <link href="/css/master.css" rel="stylesheet">
    <div class="leaf left"></div>
    <div class="leaf right"></div>
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="/{{$master->image}}" alt="Master" class="img-fluid rounded master-image">
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


    <div class="slider-container">
    <h1 class="master-services-name">РАБОТЫ МАСТЕРА:</h1>
        <div class="slider">
            @foreach ($images as $image)
                <img src="/{{$image->path}}" alt="{{ $image->description }}">
            @endforeach
            <!-- Дублируем изображения для бесшовного скролла -->
            @if(count($images) > 0)
                @foreach ($images as $image)
                    <img src="/{{$image->path}}" alt="{{ $image->description }}">
                @endforeach
            @endif
        </div>
    </div>
    <h1 class="master-services-name">УСЛУГИ МАСТЕРА:</h1>
    <div class="services mb-5">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Функция для настройки слайдера
            function setupSlider(sliderClass, animationName, duration) {
                const slider = document.querySelector(`.${sliderClass}`);
                if (!slider) return;

                const images = slider.querySelectorAll('img');
                const imageCount = images.length / 2; // Учитываем дублированные изображения
                if (imageCount <= 3) {
                    slider.style.justifyContent = 'center'; // Если мало фото, центрируем
                    return; // Не запускаем анимацию
                }

                const imageWidth = 300; // Ширина изображения
                const margin = 20; // Отступ
                const totalWidth = (imageWidth + margin * 2) * imageCount;

                // Устанавливаем ширину слайдера
                slider.style.width = `${totalWidth * 2}px`; // Удваиваем для бесшовности

                // Настраиваем анимацию
                const keyframes = `
                    @keyframes ${animationName} {
                        0% { transform: translateX(0); }
                        100% { transform: translateX(-${totalWidth}px); }
                    }
                `;

                const style = document.createElement('style');
                style.innerHTML = keyframes;
                document.head.appendChild(style);

                slider.style.animation = `${animationName} ${duration}s linear infinite`;
            }

            // Настраиваем слайдеры (30s и 35s - длительность анимации)
            setupSlider('slider', 'slide', 30);
            setupSlider('slider2', 'slide2', 35);
        });
    </script>
@endsection
