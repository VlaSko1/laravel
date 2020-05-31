@extends('layouts.aggregator')
@section('content')
    <section class="main_feedback">
        <h3 class="h3_categories">Редактировать отзыв</h3>
        <form action="{{route('feedback.update', ['feedback' => $feedback])}}" class="feedback_form" method="post">
            @csrf <!--для защиты формы-->
            @method('PUT')
            <label class="feedback_form_label">
                <p class="auth_input_text">Измените имя</p>
                <input type="text" placeholder="Имя пользователя" class="feedback_input"
                       value="{{$feedback->name}}" name="name">
            </label>
            <label class="feedback_form_label">
                <p class="auth_input_text">Измените отзыв</p>
                <textarea type="text" class="feedback_textarea" placeholder="Напишите отзыв о работе сайта"
                          name="feedback">{{ $feedback->feedback }}
                </textarea>
            </label>
            <input type="submit" value="Изменить отзыв" class="feedback_form_submit" name="submin_feedback_on">

        </form>
        <p>@include('aggregator.feedbacks.partials.messages')</p>
    </section>
@endsection
