@extends('layouts.aggregator')
@section('content')
    <div class="container">
        <section class="main_categories">
            <h3 class="h3_categories">Выберете категорию новостей</h3>
            <div class="main_categories_list">
                @foreach($categories as $key => $value)
                    <a href="{{route('category', ['id' => $key])}}" class="category">{{$value}}</a>
                @endforeach
            </div>
        </section>
    </div>
@endsection
