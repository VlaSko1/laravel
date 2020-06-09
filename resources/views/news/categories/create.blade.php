@extends('news.layouts.app')
@section('content')
    @include('news.partials.messages')
    <div>
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <p>Наименование: <input type="text" name="title">
                @if($errors->has('title'))
                    <div class="alert">
                        @foreach($errors->get('title') as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
            </p>
            <p>Слаг: <input type="text" name="slug">
                @if($errors->has('slug'))
                    <div class="alert">
                        @foreach($errors->get('slug') as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
            </p>
            <br><input type="submit" value="Ok">
        </form>
    </div>

@stop

