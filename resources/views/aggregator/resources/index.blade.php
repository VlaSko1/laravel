@extends('layouts.aggregator')
@section('content')
@if(isset(auth()->user()->is_admin) && auth()->user()->is_admin === 1)
    <section class="main_feedback">
        <h3 class="h3_categories">Ресурсы для выгрузки данных</h3>
        <table class="resource_table">
            <tr>
                <th class="resource_link">Ссылка</th>
                <th class="resource_slug">Описание</th>
                <th class="resource_category">Категория</th>
                <th class="resource_source">Источник</th>
                <th class="resource_edit">Изменить</th>
                <th class="resource_delete">Удалить</th>
            </tr>
            
            @if(!empty($resources))
            @foreach($resources as $resource)
                <tr id="item-{{$resource->id}}">
                    <td>{{ $resource->link }}</td>
                    <td>{{ $resource->slug }}</td>
                    <td>{{ $resource->category_parsing }}</td>
                    <td>{{ $resource->source }}</td>
                    <td><a href="{{ route('resource.edit', ['resource' => $resource]) }}">Edit</a></td>
                    <td><form action="{{route('resource.destroy', ['resource' => $resource])}}"
                              id="delete_{{$resource->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input  type="submit" class="delete_news" value="Delete" form="delete_{{$resource->id}}">
                        </form>
                    </td>
                </tr>
                </tr>
            @endforeach
            @endif
        </table>
        <p class="feedback_message_paragraph">@include('aggregator.feedbacks.partials.messages')</p>
        <form action="{{route('resource.create')}}" class="feedback_form" method="get">
        @csrf <!--для защиты формы-->
           
            <input type="submit" value="Добавить ресурс" class="feedback_form_submit" name="submin_feedback_on">

        </form>
    </section>
@endif
@endsection