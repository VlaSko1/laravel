@extends('layouts.app')

@section('content')
    <div class="col-2" style="margin-left: 10px;">
            @foreach($uploads as $upload)
                <p><a href="{{ \Storage::disk('uploads')->url($upload->pathFile) }}">{{ $upload->title }}</a>
                    <span>    </span><a href="/uploads/{{$upload->pathFile}}" target="_blank">Открыть файл</a>
                </p>
            @endforeach

        <br>
        <hr>
        <br>
        <h2>Загрузить файл</h2>
        <form action="{{ route('upload_save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p>Заголовок: <input type="text" name="title" class="form-control"></p>
            <p>File: <input type="file" name="file"></p>
            <br>
            <button class="btn-danger">Save</button>

        </form>
                <p><textarea id="text" name="text"></textarea></p>
    </div>

@endsection
@push('js')
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('text')
    </script>



@endpush


