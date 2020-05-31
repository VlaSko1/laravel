@extends('layouts.aggregator')
@section('content')
    <section class="main_feedback">
        <h3 class="h3_categories">Обратная связь</h3>
        <table class="feedback_table">
            <tr>
                <th class="border_name">Имя</th>
                <th class="border_feedback">Отзыв</th>
                <th class="border_edit">Изменить</th>
                <th class="border_delete">Удалить</th>
            </tr>

            @foreach($feedbacks as $feedback)
                <tr id="item-{{$feedback->id}}">
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->feedback }}</td>
                    <td><a href="{{ route('feedback.edit', ['feedback' => $feedback]) }}">Edit</a></td>
                    <td><a href="{{ route('feedback.destroy', ['feedback' => $feedback]) }}">Delete</a></td>
                </tr>
                </tr>
            @endforeach
        </table>
        <p class="feedback_message_paragraph">@include('aggregator.feedbacks.partials.messages')</p>
        <form action="{{route('feedback.store')}}" class="feedback_form" method="post">
        @csrf <!--для защиты формы-->
            <label class="feedback_form_label">
                <p class="auth_input_text">Введите своё имя</p>
                <input type="text" placeholder="Имя пользователя" class="feedback_input" value="{{old('name')}}" name="name">
            </label>
            <label class="feedback_form_label">
                <p class="auth_input_text">Введите отзыв</p>
                <textarea type="text" class="feedback_textarea" placeholder="Напишите отзыв о работе сайта" name="feedback">{{ old('feedback') }}</textarea>
            </label>
            <input type="submit" value="Отправить комментарий" class="feedback_form_submit" name="submin_feedback_on">

        </form>
    </section>

@endsection
