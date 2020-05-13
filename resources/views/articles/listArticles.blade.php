<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список статей</title>
</head>
<body>
    <div style="margin-left: 15px;">
        @foreach($articles as $key => $value)
            <p><a href="{{ route('article', ['id' => $key]) }}">{{$key}} - {{$value}}</a></p>
        @endforeach
    </div>
    <br>
    <div>
        <form method="post" action="{{ route('articles') }}">
            @csrf <!--для защиты формы-->
            <input type="text" name="article">
            <button type="submit">Ok</button>
        </form>

    </div>
</body>
</html>
