@extends('base')
@section('obsah')


<div class="container">
    <h1 class="text-white headline fs-1">Projects</h1>
    <div class="d-flex flex-wrap">
        @foreach ($cards as $card)
            <a href="{{route('projects.showOne',$card->id)}}" class="bg-info rounded-3 mr-3 my-3 py-1 px-3 text-white text-decoration-none flex-nowrap fs-4">{{$card->project_name}}</a>
        @endforeach
    </div>


    @if(Session::has('message'))
        <div class="alert {{Session::get('alert-class')}}">
            {{ Session::get('message')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form role="form" method="POST" action="{{route('projects.save')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="" class="text-white">Nazov</label>
        <input type="text" class="form-control" name="project_name">
    </div>

    <div class="form-group">
        <label for="" class="text-white">Link</label>
        <input type="text" class="form-control" name="project_link">
    </div>

    <div class="form-group">
        <label for="" class="text-white">Kategoria</label>
        <input type="text" class="form-control" name="project_category">
    </div>


    <div class="form-group">
        <label for="" class="text-white">Hodnotenie</label>
        <input type="text" class="form-control" name="project_rating">
    </div>

    <div class="form-group">
        <label for="" class="text-white">Text</label>
        <textarea id="myeditorinstance" name="project_text"></textarea>
    </div>


    <div class="form-group mb-0">
        <label class="text-white">Fotka</label><br/>
        <input class="form-control" name="project_image" type="file" value="" /> <br/> 
    </div>


    <div class="d-flex">
        <span class="input-group-btn ">
            <button class="botBtn btn btn-warning" id="btn-chat">
                Nahrať
            </button>
        </span>
        <a href="{{route('dashboard')}}" class="botBtn btn btn-primary">Späť</a>
    </div>


    </form>
</div>


<x-tiny-config />

@endsection