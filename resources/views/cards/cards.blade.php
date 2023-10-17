@extends('base')
@section('obsah')

{{-- {{dd($cards)}} --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <h1 class="text-white headline fs-1">Názov karty:</h1>

    <div class="d-flex">
        @foreach ($cards as $card)
            <a href="{{route('cards.showOne',$card->id)}}" class="bg-info rounded-3 mr-3 my-3 py-1 px-3 text-white text-decoration-none flex-nowrap fs-4">{{$card->card_name}}</a>
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

    <x-tiny-config />

    <form role="form" method="POST" action="{{ route('cards.create') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="text-white">Nadpis</label>
            <input class="form-control" name="card_name" type="text"/>
        </div>

        <div class="form-group">
            <label class="text-white">Text</label>
            {{-- <input class="form-control" name="card_text" type="text"/> --}}
            <textarea id="myeditorinstance" name="card_text"></textarea>
        </div>
        
        <div class="form-group mb-0">
            <label class="text-white">Logo</label>
            <input class="form-control" name="card_image" type="file" value="" /> <br/>
        </div>

        <div class="d-flex">
                <div class="colorSel form-group mr-3">
                    <label class="text-white">Farba </label>
                    <input class="form-control" type="color" name="card_color" value={{$card->card_color}} /> 
                </div>
        
                <div class="colorSel form-group">
                    <label class="text-white">Farba pozadia</label><br/>
                    <input class="form-control" type="color" name="card_background_color" value={{$card->card_background_color}}  /> 
                </div>
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




@endsection