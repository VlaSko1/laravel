<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aggregator news</title>

    <style>
        *{
            transition: all 0.3s;
        }
        body, html {
            height: 100%;
            margin: 0;
            min-width: 950px;

        }
        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
            max-width: 1920px;
            margin: 0 auto;
            background-color: #D3D3D3;
        }

        .top {
            flex-grow: 1;
        }
        header {
            height: 250px;
            background-color: #D9D9D9;
        }
        .container {
            margin: 0 auto;
            width: 80%;
        }
        .logo__name{
            display: flex;
            height: 250px;

        }
        .logo {
            height: 250px;
            width: 250px;

        }
        .logo__img {
            max-height: 250px;
            max-width: 250px;
            outline: none;
        }
        h1 {
            margin: 0;
        }
        .right__logo {
            width: 100%;
        }
        .site_name{
            display: flex;
            flex-direction: column;

            align-items: center;
            width: 100%;
        }
        .name_site{
            margin-top: 3%;
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
            letter-spacing: 0.5px;
            color: #2F4F4F;
        }
        .name_explanation {
            margin-top: 2%;
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
            letter-spacing: 0.3px;
            color: #2F4F4F;
            font-size: 26px;
        }
        .menu{
            margin-top: 55px;
        }
        .menu__main {
            padding: 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
            list-style: none;
        }
        .link_nav {
            display: block;
            text-decoration: none;
            font-size: 20px;
            text-transform: uppercase;
            color: #2F4F4F;
            padding: 5px;

        }
        .link_nav:hover{
            color: blue;
        }
        .link_nav:active{
            color:red;
        }
        main {
            box-sizing: border-box;
            padding: 30px 0 30px 0;
        }
        .h3_text{
            text-align: center;
            color: #2F4F4F;
            font-size: 22px;
            text-transform: uppercase;
        }
        .main_text_introduction{
            text-align: justify;
            font-family: "Times New Roman", Times, Serif;
            font-size: 18px;
            text-indent: 50px;

        }
        footer{
            height: 250px;
            background-color: darkgray;
            box-sizing: border-box;
            padding-top: 40px;
        }
        .footer_year{
            font-size: 20px;
            color: #2F4F4F;
            text-align: center;
            margin-top: 90px;
        }
        .footer_class{
            max-width: 1000px;
            margin: 0 auto;
        }
        @media screen and (max-width: 1550px) {
            .container{
                width: 95%;
            }
        }

        @media screen and (max-width: 1300px) {
            .container{
                width: 95%;
            }
            body {
                font-size: 16px;
            }
            .name_site{
                font-size: 1.3rem;
             }
            .name_explanation {

                font-size: 1.1rem;
            }
            .link_nav {
                font-size: 0.9rem;
            }
            .footer_year {
                font-size: 0.9rem;
            }

        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="top">
        <header>
            <div class="container">
                <div class="logo__name">
                    <div class="logo"><a href="{{route('index')}}"><img class="logo__img" src="/images/news.svg" alt="logo"></a></div>
                    <div class="right__logo">
                        <div class="site_name">
                            <h1 class="name_site">Новостной агрегатор</h1>
                            <h1 class="name_explanation">Лучшее место где вы сможете найти самые свежие новости </h1>
                        </div>
                        <nav class="menu">
                            <ul class="menu__main">
                                <li><a href="{{route('index')}}" class="link_nav">Главная</a></li>
                                <li><a href="{{route('categories')}}" class="link_nav">Категории новостей</a></li>
                                <li><a href="{{route('auth')}}" class="link_nav">Авторизация</a></li>
                                <li><a href="{{route('addNews')}}" class="link_nav">Добавить новость</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <section class="main_text">
                    <h3 class="h3_text">Введение</h3>
                    <p class="main_text_introduction">
                        Приветствуем вас, уважаемый посетитель! На нашем сайте вы всегда найдете самые свежие
                        новости мира, по любой интересующей вас теме. Мы предлагаем вашему вниманию проверенные новости
                        из самых авторитетных источников. Теперь Вам не нужно бороздить интернет в поисках
                        желаемой информации, вся она собрана здесь. Добро пожаловать в мир актуальных новостей!
                    </p>
                </section>
            </div>
        </main>
    </div>
    <footer>
        <nav class="menu footer_class">
            <ul class="menu__main">
                <li><a href="{{route('index')}}" class="link_nav">Главная</a></li>
                <li><a href="{{route('categories')}}" class="link_nav">Категории новостей</a></li>
                <li><a href="{{route('auth')}}" class="link_nav">Авторизация</a></li>
                <li><a href="{{route('addNews')}}" class="link_nav">Добавить новость</a></li>
            </ul>
        </nav>
        <p class="footer_year">1996 - @php echo date('Y') @endphp годы</p>

    </footer>
</div>
</body>
</html>
