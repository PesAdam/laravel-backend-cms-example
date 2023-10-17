@extends('base')
@section('obsah')

<div class="container">
    <h1 class="text-white headline fs-1">Otazky v testoch</h1>
    {{-- {{dd($cards)}} --}}
    <div class="d-flex flex-wrap">
        @foreach ($tests->pluck('category')->unique() as $category)
          <a href="/tests/{{$category}}"" class="bg-info rounded-3 mr-3 my-3 py-1 px-3 text-white text-decoration-none flex-nowrap fs-4">{{$category}}</a>
        @endforeach
    </div>
    <h3 class="text-white fs-3">Kategórie otázok: </h3>
    
    
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
    
    <form role="form" method="POST" id="form" action="{{ route('tests.save') }}" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label class="text-white">Otazka: </label>
            <input class="form-control" name="question" type="text"/>
        </div>

        <div class="form-group">
            <label class="text-white">Odpovede: </label>

            <input class="form-control odpoved" id="answer0" name="answer_one" type="text" /> <br/>
            <input class="form-control odpoved" id="answer1" name="answer_two" type="text" /> <br/>
            <input class="form-control odpoved" id="answer2" name="answer_three" type="text" /> <br/>
            <input class="form-control odpoved" id="answer4" name="answer_four" type="text" /> <br/>
        </div>

        <div class="form-group">
            <label class="text-white">Kategoria: </label>
            <input class="form-control" name="category" type="text" /> <br/>
        </div>

        <div class="form-group" id="container">
            <label class="text-white">Spravna odpoved: </label>
            {{-- <input type="radio" name="correct_answer" value=""> --}}
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

    <script>
    window.addEventListener("DOMContentLoaded", (event) => {
    let timer;
    const inputFields = document.getElementsByClassName('odpoved');
    let inputValues = [];
    const container = document.getElementById('container');
    inputFields[3].addEventListener('keyup', function(e){
        clearTimeout(timer);
        timer = setTimeout(() => {
            const boxes = document.querySelectorAll('.correct');
            boxes.forEach(box => {
                box.remove();
            });
            inputValues = [];
            for (let i = 0; i < inputFields.length; i++) {
                //inputValues = [];
                inputValues.push(inputFields[i].value);
                let radio = document.createElement('input');
                let label = document.createElement('label');
                let description = document.createTextNode(inputValues[i]);
                radio.type = 'radio';
                label.htmlFor = inputValues[i];    
                radio.value = inputValues[i];
                radio.className = 'correct';
                label.className = 'correct';
                radio.setAttribute("name", "correct_answer");
                container.appendChild(radio);   
                label.appendChild(description);
                container.appendChild(label);
                console.log(inputValues[i]);
                console.log(inputFields[i].value);
                
            }
            console.log(inputValues);
        }, 1000);
    });
});

    </script>
@endsection