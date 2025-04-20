@extends('layout')
@section('content')
    <link href="/css/home.css" rel="stylesheet">
    <div class="container_home">
        <div class="leaf left"></div>
        <div class="leaf right"></div>
        <div class="container">
        <h1>Салон красоты в Москве у метро Отрадное.</h1>
        <p class="description">
            Салон красоты «Бордо» рад открыть свои двери перед ценителями прекрасного!
            Мы работаем для того, чтобы делать мир красивее, а вас, наши дорогие посетители, еще и счастливее.
        </p>
        <div class="map-container">
            <img src="/images/location.png" alt="Карта салона красоты" class="map">
            <a style="text-decoration: none; color:white;" href="https://yandex.ru/maps/-/CHaIVFis"><button
                    class="location-button">МЕСТОПОЛОЖЕНИЕ</button></a>
        </div>
        </div>
    </div>
    <div class="advantages">
        <h1 id="advantages">ПРЕИМУЩЕСТВА</h1>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-2 mb-4">
                    <div class="advantages_card">
                        <p>Сотрудники с большим опытом и результатами</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2 mb-4">
                    <div class="advantages_card">
                        <p>Комфортная и уютная атмосфера</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2 mb-4">
                    <div class="advantages_card">
                        <p>Вернем деньги, если не устроит результат</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2 mb-4">
                    <div class="advantages_card">
                        <p>Совмещение отдыха и преображения</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2 mb-4">
                    <div class="advantages_card">
                        <p>Качественные и премиальные материалы для работы</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2 mb-4">
                    <div class="advantages_card">
                        <p>Индивидуальный подход к каждому клиенту</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services container">
        <h1 id="services">УСЛУГИ</h1>
        @auth
            <a class="adminButton" href="{{ route('categories.index') }}"><button class="btn btn-danger">Изменить список категорий</button></a>
            <a class="adminButton" href="{{ route('services.index') }}"><button class="btn btn-danger">Изменить список услуг</button></a>
        @endauth
        <div class="services_container">
            @foreach ($categories as $category)
                <div class="service">
                    <button class="service-button">{{ $category->name }}<p class="service-arrow">&#5167;</p></button>
                    <div class="service-list">
                        @foreach ($category->services as $service)
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

    @auth
        <div class="text-center mb-5">
            <a href="{{ route('images.index') }}" class="btn btn-danger">Изменить список изображений</a>
        </div>
    @endauth


    <h1 class="slider-container-name">РАБОТЫ НАШИХ МАСТЕРОВ</h1>
    <div class="slider-container container">
        <h1 class="slider-names">Маникюра:</h1>
        <div class="slider">
            @foreach ($manicureImages as $image)
                <img src="/{{$image->path}}" alt="{{ $image->description }}">
            @endforeach
            <!-- Дублируем изображения для бесшовного скролла -->
            @if(count($manicureImages) > 0)
                @foreach ($manicureImages as $image)
                    <img src="/{{$image->path}}" alt="{{ $image->description }}">
                @endforeach
            @endif
        </div>

        <h1 class="slider-names">Парикмахеров:</h1>
        <div class="slider2">
            @foreach ($hairdresserImages as $image)
                <img src="/{{$image->path}}" alt="{{ $image->description }}">
            @endforeach
            <!-- Дублируем изображения для бесшовного скролла -->
            @if(count($hairdresserImages) > 0)
                @foreach ($hairdresserImages as $image)
                    <img src="/{{$image->path}}" alt="{{ $image->description }}">
                @endforeach
            @endif
        </div>
    </div>



    <h1 id="reviews" class="review-container-name">ОТЗЫВЫ КЛИЕНТОВ</h1>

    @auth
        <div class="text-center mb-5">
            <a class="btn btn-danger" href="{{ route('reviews.index') }}">Изменить отзывы</a>
        </div>
    @endauth

    <div class="container">
        <div class="reviews-scroll-container">
            <div class="reviews-scroll">
                @foreach($reviews as $review)
                    <div class="review-card">
                        <div class="card h-100 shadow review">
                            <div class="p-2"> <!-- Добавлен отступ вокруг изображения -->
                                <img src="{{ asset($review->image) }}" class="card-img-top" alt="Отзыв {{ $review->id }}">
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title">{{ $review->name }}</h3>
                                <p class="card-text">{{ $review->content }}</p>
                                <div class="date">{{ $review->created_at->format('d m y') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <h1 id="masters" class="text-center mt-5 mb-4 masters-container-name">МАСТЕРА</h1>

    @auth
        <div class="text-center mb-5">
            <a href="{{ route('masters.index') }}" class="btn btn-danger">Изменить список мастеров</a>
        </div>
    @endauth

    <div class="container">
        <div class="masters-scroll-container">
            <div class="masters-scroll">
                @foreach ($masters as $master)
                    <div class="master-card">
                        <div class="card h-100 shadow">
                            <img src="/{{$master->image}}" class="card-img-top" alt="{{ $master->name }}" style="height: 300px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3 class="card-title">{{ $master->name }}</h3>
                                <p class="card-text text-muted">{{ $master->position }}</p>
                                <a href="{{ route('master.info', ['master_id' => $master->id]) }}" class="btn btn-green">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <h1 class="question-container-name">ВОПРОС-ОТВЕТ</h1>
    <div class="question-container container">
        <div class="question-card">
            <div class="question">
                Какие способы оплаты доступны?
            </div>
            <div class="answer">
                Мы принимаем как наличные, так и безналичные платежи (банковские карты, переводы). Также действуют бонусные программы для постоянных клиентов.
            </div>
        </div>
        <div class="question-card">
            <div class="question">
                Можно ли прийти без предварительной записи?
            </div>
            <div class="answer">
                Мы рекомендуем записываться заранее, чтобы избежать очередей. Однако, если мастер свободен, мы постараемся принять вас в порядке живой очереди.
            </div>
        </div>
        <div class="question-card">
            <div class="question">
                Нужно ли брать с собой что-то для процедуры?
            </div>
            <div class="answer">
                Нет, все необходимое для процедур предоставляется салоном. Однако, если у вас есть любимые лаки или инструменты, вы можете принести их с собой.
            </div>
        </div>
        <div class="question-card">
            <div class="question">
                Сколько времени занимает процедура маникюра/педикюра?
            </div>
            <div class="answer">
                В среднем процедура маникюра занимает 1–1,5 часа, педикюра — 1,5–2 часа. Точное время зависит от выбранной услуги (классический, аппаратный, spa-уход).
            </div>
        </div>
    </div>

    <div class="contacts-section">
        <h1 id="contacts" class="contacts-container-name">КОНТАКТЫ</h1>
        <div class="contacts-info">
            <div class="contact-item">
                <a href="tel:+79267558183" class="contact-link">
                    <img src="/images/phone-icon.png" alt="Телефон" class="contact-icon">
                    +7 (926) 755-81-83
                </a>
            </div>
            <div class="contact-item">
                <a href="https://wa.me/79267558183" target="_blank" class="contact-link">
                    <img src="/images/whatsapp-icon.png" alt="WhatsApp" class="contact-icon">
                    Написать в WhatsApp
                </a>
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
