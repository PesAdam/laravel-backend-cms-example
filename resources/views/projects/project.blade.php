@extends('base')
@section('obsah')

<div class="container">
    <h2 class="text-white headline fs-1">Edit projektu</h2>
    <br>
    <h3 class="text-white fs-3">{{$card->project_name}}</h3>

    <br/>

    <img src="../../../../images/{{$card->project_image}}" />
    <br/>

    <form role="form" method="POST" action="{{url("/project/".$card->id)}}" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="" class="text-white">Nazov</label>
            <input type="text" class="form-control" name="project_name" value="{{$card->project_name}}">
        </div>

        <div class="form-group">
            <label for="" class="text-white">Link</label>
            <input type="text" class="form-control" name="project_link" value="{{$card->project_link}}">
        </div>
        
        <div class="form-group">
            <label for="" class="text-white">Kategoria</label>
            <input type="text" class="form-control" name="project_category" value="{{$card->project_category}}">
        </div>
        
        
        <div class="form-group">
            <label for="" class="text-white">Hodnotenie</label>
            <input type="text" class="form-control" name="project_rating" value="{{$card->project_rating}}">
        </div>

        <div class="form-group">
            <label for="" class="text-white">Text</label>
            <textarea id="myeditorinstance" name="project_text">{{$card->project_text}}</textarea>
        </div>


        <div class="form-group">
            <label class="text-white">Fotka</label><br/>
            <input class="form-control" name="project_image" type="file" value="" /> <br/> 
            <small>{{$card->project_image}}</small>
        </div>


        <div class="d-flex">
            <span class="input-group-btn">
                <button class="botBtn  btn btn-warning " id="btn-chat">
                    Nahrať
                </button>
            </span>
            <a href="{{route('dashboard')}}" class="botBtn btn btn-primary text-white">Späť</a>
        </div>
    </form>
    <form action='{{url('/delete/project/'.$card->id)}}' method="post">
        @method('delete')
        @csrf
        <button class="botBtn  btn btn-danger ">
            Vymazať
        </button>
    </form>
</div>





<x-tiny-config/>

@endsection