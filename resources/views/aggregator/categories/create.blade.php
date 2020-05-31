@extends('layouts.aggregator')
@section('content')
    <section class="main_auth">
        <h3 class="h3_categories">Добавление категории новостей</h3>
        <p class="message">@include('aggregator.feedbacks.partials.messages')</p>
        <form action="{{route('categories.store')}}" class="create_category_form" method="post">
        @csrf <!--для защиты формы-->
            <label class="add_category_label">
                <p class="add_news_input_text">Введите название новой категории</p>
                <input placeholder="Название категории" class="add_category_input" name="category">
            </label>

            <input type="submit" value="Создать категорию" class="add_category_submit" name="sub_category_on">

        </form>

    </section>
@endsection
