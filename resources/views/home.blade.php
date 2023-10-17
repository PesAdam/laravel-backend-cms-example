@extends('base')
@section('obsah')

<div class="container">     
    <h1 class="text-center text-light mt-5 fs-1">Admin By Night</h1>
        <div class="mt-5 col-12 d-flex flex-row flex-wrap justify-content-between align-self-center">
            <div class="card text-white bg-dark mb-3 " style="max-width: 36rem; min-height: 8rem">
                <a href="{{route('cards.show')}}">
                    <div class="card-body">
                        <h5 class="card-title text-light text-center fs-5">Učebné karty</h5>
                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                    </div>
                </a>
            </div>
        
          <div class="card text-white bg-dark mb-3 " style="max-width: 36rem; min-height: 8rem;">
            <a href="{{route('tests.show')}}" style="text-dark">
                <div class="card-body">
                    <h5 class="card-title text-light card-title text-light text-center fs-5">Otazky v testoch</h5>
                </div>
            </a>
          </div>
          
          <div class="card text-white bg-dark mb-3 " style="max-width: 36rem; min-height: 8rem;">
            <a href="{{route('projects.show')}}" style="text-dark">
                <div class="card-body">
                    <h5 class="card-title text-light card-title text-light text-center fs-5">Projekty</h5>
                </div>
            </a>
          </div>

          <div class="card  text-white bg-dark mb-3 " style="max-width: 36rem; min-height: 8rem;">
            <a href="{{route('register')}}" style="text-dark">
                <div class="card-body">
                    <h5 class="card-title text-light card-title text-light text-center fs-5">Registrácia</h5>
                </div>
            </a>
          </div>

          {{-- <div class="card text-white bg-dark mb-3" style="max-width: 18rem; min-height: 8rem;">
            <a href="{{route('projects.show')}}" style="text-dark">
                <div class="card-header"></div>
                <div class="card-body">
                    <h5 class="card-title text-light">Projekty</h5>
                </div>
            </a>
          </div>

          <div class="card text-white bg-dark mb-3" style="max-width: 18rem; min-height: 8rem;">
            <a href="{{route('projects.show')}}" style="text-dark">
                <div class="card-header"></div>
                <div class="card-body">
                    <h5 class="card-title text-light">Projekty</h5>
                </div>
            </a>
          </div> --}}
        
        </div>
    </div>

@endsection