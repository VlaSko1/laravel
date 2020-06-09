@extends('layouts.aggregator')
@section('content')
    <section class="main_order_data">
        <h3 class="h3_categories">Закажите выгрузку</h3>
        <form action="{{route('order.store')}}" class="order_form" method="post">
        @csrf <!--для защиты формы-->
            <label class="order_form_label">
                <p class="auth_input_text">Введите имя</p>
                <input type="text" placeholder="Имя заказчика" class="order_input" value="{{old('name')}}" name="name">
            </label>
            <label class="order_form_label">
                <p class="auth_input_text">Номер телефона</p>
                <input type="number" placeholder="Номер телефона" class="order_input" value="{{old('phone')}}" name="phone">
            </label>
            <label class="order_form_label">
                <p class="auth_input_text">Укажите свой Email</p>
                <input type="email" placeholder="Введите адресс электронной почты" class="order_input" value="{{old('email')}}" name="email">
            </label>
            <label class="order_form_label_select">
                <p class="auth_input_text">Выберите категорию новости</p>
                <select name="category" id="" class="category_select">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </label>

            <input type="submit" value="Отправить заявку" class="order_form_submit" name="submin_order_on">

        </form>
        @isset($orderMake)
            <p class="order_make">Ваш заказ сохранен</p>
        @endisset
    </section>
@endsection
