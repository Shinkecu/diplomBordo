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
        <div class="advantages_container">
            <div class="advantages_card">
                <p>Сторудники с большим опытом и результатами</p>
            </div>
            <div class="advantages_card">
                <p>Комфортная и уютная атмосфера</p>
            </div>
            <div class="advantages_card">
                <p>Вернем деньги если не устроит результат</p>
            </div>
            <div class="advantages_card">
                <p>Совмещение отдыха и преображения</p>
            </div>
            <div class="advantages_card">
                <p>Качественные и премиальные материалы для работы</p>
            </div>
        </div>
    </div>

    <div class="services">
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
    <div class="slider-container">
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
        <a class="adminButton" href="{{route('reviews.index')}}"><button class="btn btn-danger">Изменить отзывы</button></a>
    @endauth

    <div class="review-container">
        @foreach($reviews as $review)
            <div class="review">
                <img src="{{ asset($review->image) }}" alt="Отзыв {{ $review->id }}">
                <h3>{{ $review->name }}</h3>
                <p>{{ $review->content }}</p>
                <div class="date">{{ $review->created_at->format('d m y')  }}</div>
            </div>
        @endforeach
    </div>


    <h1 id="masters" class="masters-container-name">МАСТЕРА</h1>
    @auth
    <a class="adminButton" href="{{ route('edit.masters') }}">
        <button class="btn btn-danger">Изменить список мастеров</button>
    </a>

    @endauth
    <div class="masters-container">
        @foreach ($masters as $master)
            <div class="masters-card">
                <img src="{{ asset($master->image) }}" alt="{{ $master->name }}">
                <div class="masters-content">
                    <h3>{{ $master->name }}</h3>
                    <p>{{ $master->position }}</p>
                    <a href="{{ route('master.info', ['master_id' => $master->id]) }}"><button
                            class="masters-btn">Подробнее</button></a>
                </div>
            </div>
        @endforeach
    </div>
    <h1 class="question-container-name">ВОПРОС-ОТВЕТ</h1>
    <div class="question-container">
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
