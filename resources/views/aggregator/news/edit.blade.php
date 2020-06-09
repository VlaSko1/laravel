@extends('layouts.aggregator')
@section('content')
    <section class="main_auth">
        <h3 class="h3_categories">Изменение новости</h3>
        <form action="{{route('news.update', ['news' => $news])}}" class="add_news_form" method="post">
        @csrf <!--для защиты формы-->
            @method('PUT')
            <label class="add_news_label">
                <p class="add_news_input_text">Введите новое название новости:</p>
                <textarea placeholder="Новое название новости" class="add_news_textarea textarea_name" name="name">{{ $news->name }}</textarea>
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
                <p class="add_news_input_text">Введите новый краткий текст новости</p>
                <textarea class="add_news_textarea textarea_briefly" placeholder="Новое краткое описание новости" name="briefly">{{ $news->briefly }}</textarea>
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
                <p class="add_news_input_text">Введите новый полный текст новости</p>
                <textarea class="add_news_textarea textarea_detail" placeholder="Новый полный текст новости" name="detail">{{ $news->detail }}</textarea>
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
                        <option value="{{$category->id}}"
                            @if($category->id == $news->category_id) selected @endif>
                            {{$category->category}}
                        </option>
                    @endforeach
                </select>
            </label>
            <input type="submit" value="Изменить новость" class="add_news_submit" name="sub_news_on">

        </form>

    </section>
@endsection
