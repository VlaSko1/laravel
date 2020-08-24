@extends('layouts.aggregator')
@section('content')
@if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
    <section class="main_auth">
        <h3 class="h3_categories">Редактировать ресурс</h3>
        <p class="message">@include('aggregator.feedbacks.partials.messages')</p>
        <form action="{{route('resource.update', ['resource' => $resource])}}" class="add_news_form" method="post">
            @csrf <!--для защиты формы-->
            @method('PUT')
            <label class="add_news_label">
                <p class="add_news_input_text">Измените ссылку на ресурс при необходимости:</p>
                <textarea placeholder="Ссылка на новость rss" class="add_news_textarea textarea_name" name="link">{{$resource->link}}</textarea>
                <div class="container_news_alert_error">
                @if($errors->has('link'))
                    <div class="add_news_alert_error">
                        @foreach($errors->get('link') as $error)
                            <p class="text_news_error">{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                </div>
            </label>
            <label class="add_news_label">
                <p class="add_news_input_text">Измените краткое описание ресурса при необходимости</p>
                <textarea class="add_news_textarea textarea_briefly" placeholder="Краткое описание ресурса" name="slug">{{$resource->slug}}</textarea>
                <div class="container_news_alert_error">
                    @if($errors->has('slug'))
                        <div class="add_news_alert_error">
                            @foreach($errors->get('slug') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>
            <label class="add_news_label">
                <p class="add_news_input_text">Введите новое название категории при необходимости</p>
                <input class="add_news_input" value="{{$category_parsing}}" placeholder="Название категории новости" name="category_parsing">
                <div class="container_news_alert_error">
                    @if($errors->has('category_parsing'))
                        <div class="add_news_alert_error">
                            @foreach($errors->get('category_parsing') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>
            <label class="add_news_select">
                <p class="add_news_input_text">Введите название ресурса</p>
                <input class="add_news_input" placeholder="Название ресурса" name="source" value="{{$source}}">
                <div class="container_news_alert_error">
                    @if($errors->has('source'))
                        <div class="add_news_alert_error">
                            @foreach($errors->get('source') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>
            <input type="submit" value="Изменить ресурс" class="add_news_submit" name="sub_news_on">

        </form>

    </section>
@endif
@endsection