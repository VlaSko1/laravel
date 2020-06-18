@extends('layouts.aggregator')
@section('content')
    <section class="main_auth">
        <h3 class="h3_categories">Список пользователей для редактирования</h3>
        <table class="feedback_table">
            <tr>
                <th class="profile_name">Имя</th>
                <th class="profile_mail">E-mail</th>
                <th class="profile_is_admin">Администратор</th>
                <th class="profile_edit">Редактировать</th>
                <th class="profile_delete">Удалить профиль</th>
            </tr>

            @foreach($users as $user)
                <tr id="user-{{$user->id}}">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? "Да" : "Нет" }}</td>
                    <td><a href="{{ route('adminProfileEdit', ['id' => $user->id]) }}">Edit</a></td>
                    <td><form action="{{route('adminProfileDelete', ['user' => $user])}}"
                              id="delete_{{$user->id}}" method="post">
                            @csrf
                            <input  type="submit" class="delete_news" value="Delete" form="delete_{{$user->id}}">
                            <input type="text" name="id" hidden value="{{$user->id}}">
                        </form>
                    </td>
                </tr>
                </tr>
            @endforeach
        </table>
        <p class="feedback_message_paragraph">@include('aggregator.feedbacks.partials.messages')</p>

    </section>
@endsection
