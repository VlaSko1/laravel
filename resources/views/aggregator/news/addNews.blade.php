@extends('layouts.aggregator')
@section('content')
    <section class="main_auth">
        <h3 class="h3_categories">Добавление новости</h3>
        <p class="message">@include('aggregator.feedbacks.partials.messages')</p>
        <form action="{{route('news.store')}}" class="add_news_form" method="post">
        @csrf <!--для защиты формы-->
            <label class="add_news_label">
                <p class="add_news_input_text">Введите название новости:</p>
                <textarea placeholder="Название новости" class="add_news_textarea textarea_name" name="name"></textarea>
                <div class="container_news_alert_error">
                @if($errors->has('name'))
                    <div class="add_news_alert_error">
                        @foreach($errors->get('name') as $error)
                            <p class="text_news_error">{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                </div>
            </label>
            <label class="add_news_label">
                <p class="add_news_input_text">Введите краткий текст новости</p>
                <textarea class="add_news_textarea textarea_briefly" placeholder="Краткое описание новости" name="briefly"></textarea>
                <div class="container_news_alert_error">
                    @if($errors->has('briefly'))
                        <div class="add_news_alert_error">
                            @foreach($errors->get('briefly') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>
            <label class="add_news_label">
                <p class="add_news_input_text">Введите полный текст новости</p>
                <textarea class="add_news_textarea textarea_detail" placeholder="Полный текст новости" name="detail"></textarea>
                <div class="container_news_alert_error">
                    @if($errors->has('detail'))
                        <div class="add_news_alert_error">
                            @foreach($errors->get('detail') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>
            <label class="add_news_select">
                <p class="add_news_input_text">Опубликовать новость?</p>
                <select name="published" id="" class="category_select">
                    <option value="1">да</option>
                    <option value="0">нет</option>
                </select>
            </label>
            <label class="add_news_select">
                <p class="add_news_input_text">Выберите категорию новости</p>
                <select name="category_id" id="" class="category_select">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </label>
            <input type="submit" value="Отправить новость" class="add_news_submit" name="sub_news_on">

        </form>

    </section>
@endsection
