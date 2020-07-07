<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aggregator news</title>

    <link rel="stylesheet" href="/css/aggregator/style.css">
</head>
<body>
<div class="wrapper">
    <div class="top">
        <header>
            <div class="container">
                <div class="logo__name">
                    <div class="logo">
                        <a href="{{route('index')}}"><img class="logo__img" src="/images/news.svg" alt="logo"></a>
                        @if(empty(auth()->user()->name))
                            <a href="{{route('login')}}" class="logo_login auth_logo">Login</a>
                            <a href="{{route('register')}}" class="logo_register auth_logo">Register</a>
                        @else
                            <span>{{auth()->user()->name}}</span>
                            <a href="/aggregator/logout" class="logo_logout auth_logo">Logout</a>
                        @endif
                    </div>
                    <div class="right__logo">
                        <div class="site_name">
                            <h1 class="name_site">Новостной агрегатор</h1>
                            <h1 class="name_explanation">Лучшее место где вы сможете найти самые свежие новости </h1>
                        </div>
                        <nav class="menu">
                            <ul class="menu__main">
                                <li class="main_menu_list"><a href="{{route('index')}}" class="link_nav">Главная</a></li>
                                <li class="main_menu_list"><a href="{{route('categories.index')}}" class="link_nav">Категории новостей</a></li>
                                @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
                                <li class="main_menu_list"><a href="{{route('news.create')}}" class="link_nav">Добавить новость</a></li>
                                @endif
                                <li class="main_menu_list"><a href="{{route('order.index')}}" class="link_nav">Выгрузка данных</a></li>
                                <li class="main_menu_list"><a href="{{route('feedback.index')}}" class="link_nav">Обратная связь</a></li>
                                <li class="main_menu_list"><a href="{{route('yScience')}}" class="link_nav">Яндекс Наука</a></li>
                                @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
                                    <li class="main_menu_list"><a href="{{route('adminProfileIndex')}}" class="link_nav">Редактор профилей</a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    <footer>
        <nav class="menu footer_class">
            <ul class="menu__main">
                <li class="main_menu_list"><a href="{{route('index')}}" class="link_nav">Главная</a></li>
                <li class="main_menu_list"><a href="{{route('categories.index')}}" class="link_nav">Категории новостей</a></li>
                @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
                    <li class="main_menu_list"><a href="{{route('news.create')}}" class="link_nav">Добавить новость</a></li>
                @endif
                <li class="main_menu_list"><a href="{{route('order.index')}}" class="link_nav">Выгрузка данных</a></li>
                <li class="main_menu_list"><a href="{{route('feedback.index')}}" class="link_nav">Обратная связь</a></li>
                <li class="main_menu_list"><a href="{{route('yScience')}}" class="link_nav">Яндекс Наука</a></li>
                @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
                    <li class="main_menu_list"><a href="{{route('adminProfileIndex')}}" class="link_nav">Редактор профилей</a></li>
                @endif
            </ul>
        </nav>
        <p class="footer_year">1996 - @php echo date('Y') @endphp годы</p>

    </footer>
</div>
</body>
</html>
