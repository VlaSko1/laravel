@extends('layouts.aggregator')
@section('content')
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
@endsection
