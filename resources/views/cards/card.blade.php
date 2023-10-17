@extends('base')
@section('obsah')

{{-- {{dd($cards)}} --}}

<div class="container">

    <h2 class="text-white headline fs-1">Edit kartičky</h2>
    <br>
    
    <h3 class="text-white fs-3">{{$card->card_name}}</h3>
    
        <br>
        <img src="../../../../images/{{$card->card_image}}">
        <br>
        <form role="form" method="POST" action="{{url("/card/".$card->id) }}" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label class="text-white">Nadpis</label>
                <input class="form-control" name="card_name" type="text" value={{$card->card_name}}>
            </div>
    
            <div class="form-group">
                <label class="text-white">Text</label>
                {{-- <input class="form-control" name="card_text" type="text"/> --}}
                <textarea id="myeditorinstance" name="card_text">{{$card->card_text}}</textarea>
            </div>
            
    
            <div class="form-group">
                <label class="text-white">Logo</label>
                <input class="form-control" name="card_image" type="file" /> <small>{{$card->card_image}}</small> <br/>
            </div>
            <div class="d-flex">
                <div class="colorSel form-group mr-3">
                    <label class="text-white">Farba </label>
                    <input class="form-control" type="color" name="card_color" value={{$card->card_color}} /> 
                </div>
        
                <div class="colorSel form-group">
                    <label class="text-white">Farba pozadia</label><br/>
                    <input class="form-control" type="color" name="card_background_color" value={{$card->card_background_color}} /> 
                </div>
            </div>
            
    
        
        <div class="d-flex w-75 mr-0">
            <span class="input-group-btn">
                <button class="btn btn-warning botBtn" id="btn-chat">
                    Nahrať
                </button>
            </span>
            
            <a href="{{route('dashboard')}}" class="botBtn btn btn-primary text-white">back</a>
        </div>
    </form>
    
    <form action='{{url('/delete/card/'.$card->id)}}' method="post">
        @method('delete')
        @csrf
        <button class="btn btn-danger botBtn">
            delete
        </button>
    </form>
    
    
    
    
    <x-tiny-config />
</div>

@endsection