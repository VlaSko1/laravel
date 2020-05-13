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
        .h3_text, .h3_categories{
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


        .main_categories_list{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            align-content: center;
            height: 300px;

        }
        .category {
            display: flex;
            height: 100px;
            width: 100px;
            justify-content: center;
            align-items: center;
            background: linear-gradient(#DCDCDC, #A9A9A9);
            text-decoration: none;
            color: #2F4F4F;
            font-size: 18px;
            border: 1px solid white;
            border-radius: 20px;

        }
        .category:hover{
            box-shadow: 0 0 5px 1px black;
        }
        .category:active{
            border: 1px solid darkgray;
            box-shadow: 0 0 8px 2px black;
        }

        .category_news{
            font-family: "Times New Roman", Times, Serif;
            text-decoration: none;
            font-size: 26px;
            font-style: italic;
            display: block;
            color: black;
            text-align: center;
            outline: none;
        }
        .category_news span {
            font-size: 16px;
        }
        .briefly_news {
            margin: 8px 0 20px 0;
            font-family: "Times New Roman", Times, Serif;
            text-decoration: none;
            font-size: 18px;
            text-indent: 50px;
        }
        .detail_news{
            margin-top: 8px;
            font-family: "Times New Roman", Times, Serif;
            text-decoration: none;
            font-size: 18px;
            text-indent: 50px;
            text-align: justify;
        }
        .return_category{
            display: block;
            height: 50px;
            width: 500px;
            line-height: 50px;
            text-align: center;
            border: 1px solid white;
            border-radius: 20px;
            margin: 0 auto;
            text-decoration: none;
            text-transform: uppercase;
            color: #2F4F4F;
            font-size: 18px;
            background: linear-gradient(#DCDCDC, #A9A9A9);
        }
        .return_category:hover{
            box-shadow: 0 0 5px 1px black;
        }
        .return_category:active{
            box-shadow: 0 0 8px 2px black;
            border: 1px solid darkgray;
        }

        .category_news:hover{
            text-shadow: 0 0 1px white, 0 4px 5px #464451;
        }
        .category_news:active{
            text-shadow: 0 1px 4px #2F4F4F;
        }
        .auth_form{
            width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .auth_input{
            width: 300px;
            height: 30px;
            outline: none;
            box-sizing: border-box;
            padding: 0 15px 0 15px;
            font-size: 18px;
        }
        .auth_input_text, .add_news_input_text{
            font-size: 18px;
            font-family: "Times New Roman", Times, Serif;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .auth_input_checkbox{
            width: 20px;
            height: 20px;
            outline: none;
            margin: 0;
            position: absolute;
            left: 131px;
            top: 1px;
            cursor: pointer;
        }
        .auth_label_checkbox{
            width: 300px;
            position: relative;
            cursor: pointer;
            margin-top: 10px;
        }
        .auth_form_submit{
            width: 100px;
            height: 30px;
            margin-top: 15px;
            font-size: 16px;
            cursor: pointer;
        }

        .add_news_form{
            width: 700px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .add_news_label, .add_news_select {
            width: 700px;
        }
        .add_news_textarea{
            width: 700px;
            outline: none;
            font-size: 16px;
            font-family: "Times New Roman", Times, Serif;
            padding: 5px 10px;
            resize: none;
            box-sizing: border-box;
        }

        .textarea_name{
            height: 30px;
        }
        .textarea_briefly{
            height: 50px;
        }
        .textarea_detail{
            height: 150px;
        }
        .category_select{
            width: 150px;
            height: 40px;
            font-family: "Times New Roman", Times, Serif;
            padding: 5px 5px;
            box-sizing: border-box;
            font-size: 16px;
            outline: none;
        }
        .add_news_submit{
            width: 200px;
            height: 30px;
            margin-top: 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            outline: none;
            font-family: "Times New Roman", Times, Serif;
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
                                <li><a href="{{route('adminIndexAdd')}}" class="link_nav">Добавить новость</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <section class="main_auth">
                    <h3 class="h3_categories">Добавление новости</h3>
                    <form action="{{route('addNews')}}" class="add_news_form" method="post">
                    @csrf <!--для защиты формы-->
                        <label class="add_news_label">
                            <p class="add_news_input_text">Введите название новости:</p>
                            <textarea placeholder="Название новости" class="add_news_textarea textarea_name" name="name_news"></textarea>
                        </label>
                        <label class="add_news_label">
                            <p class="add_news_input_text">Введите краткий текст новости</p>
                            <textarea class="add_news_textarea textarea_briefly" placeholder="Краткое описание новости" name="briefly"></textarea>
                        </label>
                        <label class="add_news_label">
                            <p class="add_news_input_text">Введите полный текст новости</p>
                            <textarea class="add_news_textarea textarea_detail" placeholder="Полный текст новости" name="detail"></textarea>
                        </label>
                        <label class="add_news_select">
                            <p class="add_news_input_text">Выберите категорию новости</p>
                            <select name="category" id="" class="category_select">
                                @foreach($categories as $category)
                                    <option value="{{$category}}">{{$category}}</option>
                                @endforeach
                            </select>
                        </label>
                        <input type="submit" value="Отправить новость" class="add_news_submit" name="sub_news_on">

                    </form>

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
                <li><a href="#" class="link_nav">Добавить новость</a></li>
            </ul>
        </nav>
        <p class="footer_year">1996 - @php echo date('Y') @endphp годы</p>

    </footer>
</div>
</body>
</html>
