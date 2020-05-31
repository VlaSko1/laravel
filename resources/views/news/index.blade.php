@extends('news.layouts.app')
@section('content')
    @include('news.partials.messages')
    <br><a href="{{route('news.index')}}">List news<br>
        <br><a href="{{route('news.create')}}">Add news</a><br>
        <table width="100%">
            <thead>

            </thead>
            <tbody>
            @foreach($news as $n)
                <tr>
                    <td>{{ $n->id }}</td>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->slug }}</td>
                    <td>{{ $n->status }}</td>
                    <th><a href="{{ route('news.edit', ['news' => $n]) }}">edit</a> |
                        <a href="{{ route('news.destroy',
                            ['news' => $n]) }}">delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    {{ $news->links() }}
@stop


