@extends('layouts.aggregator')
@section('content')
    <section class="main_categories">
        <h3 class="h3_categories">Выберете категорию новостей</h3>
        <p class="message">@include('aggregator.feedbacks.partials.messages')</p>
        <div class="main_categories_list">
            @foreach($categories as $category)
                <div class="category_container">
                <a href="{{route('categories.show', ['category' => $category])}}" class="category">
                    {{$category->category}}

                </a>
                @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
                    <form action="{{route('categories.destroy', ['category' => $category])}}" method="post" id="delete_category_{{$category->id}}" class="form_category_destroy">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="{{route('categories.edit', ['category' => $category])}}" class="category_edit">Edit</a>
                    <button class="category_delete" form="delete_category_{{$category->id}}">Delete</button>
                @endif
                </div>
            @endforeach
            @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
            <a href="{{route('categories.create')}}" class="category">
                Добавить категорию
            </a>
            @endif
        </div>
    </section>
@endsection
