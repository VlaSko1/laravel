@extends('layouts.aggregator')
@section('content')
    <section class="main_auth">
        <h3 class="h3_categories">Изменение категории "{{ $category->category }}"</h3>
        <p class="message">@include('aggregator.feedbacks.partials.messages')</p>
        <form action="{{route('categories.update', ['category' => $category])}}" class="create_category_form" method="post">
        @csrf <!--для защиты формы-->
            @method('PUT')
            <label class="add_category_label">
                <p class="add_news_input_text">Введите новое название категории</p>
                <input placeholder="Новое название категории" class="add_category_input" name="category">
                <div class="container_category_alert_error">
                    @if($errors->has('category'))
                        <div class="add_category_alert_error">
                            @foreach($errors->get('category') as $error)
                                <p class="text_news_error">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </label>

            <input type="submit" value="Изменить категорию" class="add_category_submit" name="sub_category_on">

        </form>

    </section>
@endsection
