@extends('layouts.aggregator')

@section('content')
    <section class="main_order_data">
        <h3 class="h3_categories">Выгрузка данных</h3>
        <form action="{{route('loadData')}}" class="order_form" method="post">
        @csrf <!--для защиты формы-->

            <label class="order_form_label_select">
                <p class="auth_input_text">Выберите желаемые данные для выгрузки</p>
                <select name="orderList" id="" class="order_select">
                    @foreach($resources as $resource)
                        <option value="{{  array_search($resource, $resources) }}">
                            {{ $resource }}
                        </option>
                    @endforeach
                </select>
            </label>

            <input type="submit" value="Сделать выгрузку" class="order_form_submit" name="submin_order_on">

        </form>
        @isset($orderMake)
            <p class="order_make">Ваш заказ сохранен</p>
        @endisset
    </section>
@endsection
