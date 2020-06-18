@extends('layouts.aggregator')
@section('content')
    <section class="main_categories">
        <h3 class="h3_categories">Новости из раздела "{{$category->category}}"</h3>
        <p class="message">@include('aggregator.feedbacks.partials.messages')</p>
        <div class="main_categories_news_list">
            @foreach($news as $item)
                <a href="{{route('news.show', ['news' => $item, 'category' => $category])}}"
                       class="category_news">{{$item->name}} <span>(подробнее...)</span></a>
                <p class="briefly_news">{{$item->briefly}}</p>
                @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
                    <a href="{{route('news.edit', ['news' => $item])}}" class="edit_news">Изменить новость</a>
                    <form action="{{route('news.destroy', ['news' => $item, 'category' => $category])}}"
                          id="delete_{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input  type="submit" class="delete_news" value="Удалить новость" form="delete_{{$item->id}}">
                    </form>
                @endif
                <br><hr>
            @endforeach
        </div>
    </section>
@endsection
