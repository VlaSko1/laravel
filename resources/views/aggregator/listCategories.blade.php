@extends('layouts.aggregator')
@section('content')
    <section class="main_categories">
        <h3 class="h3_categories">Выберете категорию новостей</h3>
        <div class="main_categories_list">
            @foreach($categories as $key => $value)
                <a href="{{route('category', ['id' => $value->id])}}" class="category">
                    {{$value->category}}
                </a>
            @endforeach
        </div>
    </section>
@endsection
