@extends('layouts.aggregator')
@section('content')
    <section class="main_auth">
        <h3 class="h3_categories">Авторизация</h3>
        <form action="{{route('checkAuth')}}" class="auth_form" method="post">
            @csrf <!--для защиты формы-->
            <label >
                <p class="auth_input_text">Введите логин:</p>
                <input type="text" placeholder="Логин" class="auth_input" name="login">
            </label>
            <label >
                <p class="auth_input_text">Введите пароль:</p>
                <input type="password" class="auth_input" placeholder="Пароль" name="password">
            </label>
            <label class="auth_label_checkbox"><span class="auth_input_text">Запомнить меня</span><input type="checkbox" class="auth_input_checkbox" name="save"></label>
            <input type="submit" value="Отправить" class="auth_form_submit" name="submin_on">

        </form>

    </section>
@endsection
