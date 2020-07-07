@extends('layouts.aggregator')

@section('content')
    <section class="main_order_data">
        <h3 class="h3_categories">Центральный банк РФ установил следующие курсы валют сегодня</h3>
        <table class="valute_table">
            <tr>
                <th class="valute_table_th">Цифр.код</th>
                <th class="valute_table_th">Букв.код</th>
                <th class="valute_table_th">Единиц</th>
                <th class="valute_table_th">Валюта</th>
                <th class="valute_table_th">Курс</th>
            </tr>

            @foreach($data as $currency)
                <tr>
                    <td>{{$currency['NumCode']}}</td>
                    <td>{{$currency['CharCode']}}</td>
                    <td>{{$currency['Nominal']}}</td>
                    <td>{{$currency['Name']}}</td>
                    <td>{{$currency['Value']}}</td>
                </tr>
            @endforeach

        </table>
    </section>


@endsection
