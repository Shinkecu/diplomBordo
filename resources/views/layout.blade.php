<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Подключение Bootstrap CSS через asset() -->
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

    <!-- Подключение основного CSS -->
    <link href="/css/main.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-dark">
        <div class="header-container">
            <div class="left-links">
                <ul class="nav-links">
                    <li id="first-left"><a href="{{ route('home') }}">О&nbsp;нас</a></li>
                    <li><a href="#services">Услуги</a></li>
                    <li id="last-left"><a href="#masters">Мастера</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="{{ route('home') }}" style="text-decoration: none;"> <!-- Добавляем ссылку -->
                    <span class="logo-main">BORDO</span>
                    <div class="logo-sub">
                        <span class="text">BEAUTY STUDIO</span>
                    </div>
                </a>
            </div>
            <div class="right-links">
                <ul class="nav-links">
                    <li id="first-right"><a href="#reviews">Отзывы</a></li>
                    <li><a href="#contacts">Контакты</a></li>
                    <li id="last-right"><a href="#">Вход</a></li>
                </ul>
            </div>

            <!-- Бургер-меню -->

            <div class="burger-menu" id="mobileMenu">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <span class="logo-main">BORDO</span>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="nav-links navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li><a href="{{ route('home') }}">О&nbsp;нас</a></li>
                        <li><a href="#services">Услуги</a></li>
                        <li><a href="#masters">Мастера</a></li>
                        <li><a href="#reviews">Отзывы</a></li>
                        <li><a href="#contacts">Контакты</a></li>
                        <li><a href="">Вход</a></li>
                      </ul>
                    </div>
                  </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>


    <footer>
        <div class="footer-links-container">
        <ul class="footer-links">
            <li><a href="{{ route('home') }}">О&nbsp;нас</a></li>
            <li><a href="#services">Услуги</a></li>
            <li><a href="#masters">Мастера</a></li>
            <li><a href="#reviews">Отзывы</a></li>
            <li><a href="#contacts">Контакты</a></li>
            <li><a href="">Вход</a></li>
          </ul>
        </div>
        <h3 class="footer-rights-info">Bordo. Салон красоты в Москве. Все права защищены. 2025 г</h3>
        <p class="footer-offer-info">Информация на данном интернет-сайте носит исключительно ознакомительный характер и ни при каких условиях не является публичной офертой. Цены на сайте носят ознакомительный характер и не являются публичным предложением.</p>
        <a class="legal-information" href="#">Правовая информация</a>
    </footer>



    <!-- Подключаем Bootstrap JS через asset() -->

        @auth
    <form action="{{ route('admin.logout') }}" method="POST" class="logout-button">
        @csrf
        <a href="{{ route('orders.index') }}" class="btn btn-primary">Управление</br>заказами</a>
        <button style="font-family: 'playfair'" type="submit" class="btn btn-danger">Выйти из панели</br>администратора</button>
    </form>

    @endauth
    <style>
        .logout-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000; /* Чтобы кнопка была поверх других элементов */
        }
    </style>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
