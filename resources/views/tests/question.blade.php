@extends('base')
@section('obsah')
    <div class="container">
        <h1 class="text-white headline fs-1">Otazky v testoch</h1> <br/> 
        @foreach($cards as $card )
            <h3 class="fs-4">{{$card->question}}</h3>
        @endforeach
        <a href="{{route('dashboard')}}" class="botBtn btn btn-primary">Späť</a>
    </div>
    

@endsection