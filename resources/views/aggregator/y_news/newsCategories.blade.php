@extends('layouts.aggregator')

@section('content')
    <section class="main_categories">
        <h3 class="h3_categories">Яндекс новости</h3>
       
        <div class="main_categories_list">
            @foreach($resources as $resource)
                
                <div class="category_container">
                <a href="{{route('oneCategoryNews', ['id' => $resource->id])}}" class="category">
                    {{$resource->category_parsing2}}

                </a>
                
                </div>
            @endforeach
            
        </div>
    </section>  
@endsection