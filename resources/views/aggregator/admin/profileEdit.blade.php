@extends('layouts.aggregator')
@section('content')
    <section class="main_auth">
        <h3 class="h3_categories">Изменение профиля</h3>
        <p class="message">@include('aggregator.feedbacks.partials.messages')</p>
        <form action="{{route('adminProfileUpdate')}}" class="create_category_form" method="post">
        @csrf <!--для защиты формы-->

            <label class="add_category_label">
                <p class="add_news_input_text">Введите имя пользователя</p>
                <input placeholder="Новое имя пользователя" class="add_category_input" name="name" value="{{$user->name}}">
                <div class="container_category_alert_error">
                    @if($errors->has('user'))
                        <div class="add_category_alert_error">
                            @foreach($errors->get('name') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>
            <label class="add_category_label">
                <p class="add_news_input_text">Введите Email</p>
                <input placeholder="Новый E-mail пользователя" class="add_category_input" name="email" value="{{$user->email}}">
                <div class="container_category_alert_error">
                    @if($errors->has('email'))
                        <div class="add_category_alert_error">
                            @foreach($errors->get('email') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>
            <label class="add_category_label">
                <p class="add_news_input_text">Сделать пользователя администратором</p>
                <select name="is_admin" id="">
                    <option value="1" @if((bool)$user->is_admin) selected @endif>Да</option>
                    <option value="0" @if(!(bool)$user->is_admin) selected @endif>Нет</option>
                </select>
                <div class="container_category_alert_error">
                    @if($errors->has('is_admin'))
                        <div class="add_category_alert_error">
                            @foreach($errors->get('is_admin') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>
            <input type="text" name="id" hidden value="{{$user->id}}">
            <input type="submit" value="Изменить профиль" class="add_category_submit" name="sub_category_on">

        </form>

    </section>
@endsection
