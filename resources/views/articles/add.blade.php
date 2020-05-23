<form method="post" action="{{ route('articles') }}">
    @csrf <!--для защиты формы-->
    <p>
        <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Заголовок">
    </p>
    <p>
        <input type="date" class="form-control" name="created_at" placeholder="Дата добавления">
    </p>
    <p>
        <textarea name="text" class="form-control" id="" cols="30" rows="10">{!! old('text') !!}</textarea>
    </p>

    <button  class="btn btn-danger" type="submit">Add</button>
</form>
