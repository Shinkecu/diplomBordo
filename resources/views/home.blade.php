@extends('layout')
@section('content')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <div class="container_home">
        <div class="leaf left"></div>
        <div class="leaf right"></div>
        <h1>Салоны красоты Москвы у метро Отрадное.</h1>
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

    <h1 class="slider-container-name">РАБОТЫ НАШИХ МАСТЕРОВ</h1>
    <div class="slider-container container">
        <h1 class="slider-names">Маникюра:</h1>
        <div class="slider">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image.png" alt="Работа 5">
        </div>
        <h1 class="slider-names">Парикмахеров:</h1>
        <div class="slider2">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-1.png" alt="Работа 1">
            <img src="images/image-2.png" alt="Работа 2">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-3.png" alt="Работа 3">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image-4.png" alt="Работа 4">
            <img src="images/image.png" alt="Работа 5">
            <img src="images/image.png" alt="Работа 5">
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

    <h1 id="masters" class="text-center mt-5 mb-4">МАСТЕРА</h1>

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
                            <img src="{{ asset($master->image) }}" class="card-img-top" alt="{{ $master->name }}" style="height: 300px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3 class="card-title">{{ $master->name }}</h3>
                                <p class="card-text text-muted">{{ $master->position }}</p>
                                <a href="{{ route('master.info', ['master_id' => $master->id]) }}" class="btn btn-success">Подробнее</a>
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
                Возможно ли утреннеое обслуживание вне режима работы?
            </div>
            <div class="answer">
                Необходимо связаться с администратором салона для уточнения времени и предварительной записи.
            </div>
        </div>
        <div class="question-card">
            <div class="question">
                Возможно ли утреннеое обслуживание вне режима работы?
            </div>
            <div class="answer">
                Необходимо связаться с администратором салона для уточнения времени и предварительной записи.
            </div>
        </div>
        <div class="question-card">
            <div class="question">
                Возможно ли утреннеое обслуживание вне режима работы?
            </div>
            <div class="answer">
                Необходимо связаться с администратором салона для уточнения времени и предварительной записи.
            </div>
        </div>
        <div class="question-card">
            <div class="question">
                Возможно ли утреннеое обслуживание вне режима работы?
            </div>
            <div class="answer">
                Необходимо связаться с администратором салона для уточнения времени и предварительной записи.
            </div>
        </div>
    </div>
    <h1 id="contacts" class="contacts-container-name">Контакты</h1>

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
