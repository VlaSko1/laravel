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
    @if($char === 2)
        {{$article}}
    @elseif($char === 3)
        {{ $date }}
    @else
        Hello
    @endif

</div>
</body>
</html>
