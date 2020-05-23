@extends('layouts.aggregator')
@section('content')
    <section class="main_feedback">
        <h3 class="h3_categories">Обратная связь</h3>
        <form action="{{route('addFeedback')}}" class="feedback_form" method="post">
        @csrf <!--для защиты формы-->
            <label class="feedback_form_label">
                <p class="auth_input_text">Введите своё имя</p>
                <input type="text" placeholder="Имя пользователя" class="feedback_input" value="{{old('name')}}" name="name">
            </label>
            <label class="feedback_form_label">
                <p class="auth_input_text">Введите комментарий</p>
                <textarea type="text" class="feedback_textarea" placeholder="Напишите отзыв о работе сайта" name="feedback">{{ old('feedback') }}</textarea>
            </label>
            <input type="submit" value="Отправить комментарий" class="feedback_form_submit" name="submin_feedback_on">

        </form>
        @isset($feedbackAdd)
            <p class="feedback_add">Отзыв сохранен</p>
        @endisset
    </section>
@endsection
