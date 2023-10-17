@extends('welcome')

@section('content')
            
<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
        
<div class="mainBox">
  <input type="checkbox" id="check">
  <div class="btnOne">
    <label for="check">
      <i class="fas fa-bars"></i>
    </label>
  </div>
  <div class="sidebarMenu">
    <div class="logo">
      <a href="/admin/public">AdminByNight</a>
        </div>
      <div class="btnTwo">
        <label for="check">
          <i class="fas fa-times"></i>
        </label>
      </div>
    <div class="Menu">
      <ul class=" px-0">
        {{-- <li class="list">
          <a href="/" class="bigBtn">
          <i class="fas fa-qrcode"></i>
            Menu --}}
          </a>
        </li>
        <a href="{{route('cards.show')}}">
          <li>
            <i class="fas fa-window-restore"></i>
            Učebné karty
          </li>
        </a>
        <a href="{{route('tests.show')}}">
          <li>
            <i class="fas fa-question-circle "></i>
            Otazky v testoch
          </li>
        </a>
        <a href="{{route('projects.show')}}">
          <li>
            <i class="fas fa-calendar-week"></i>
            Projekty
          </li>
        </a>
        <a target="_blank" href="https://twistersbynight.spsit.sk/">
          <li>
            <i class="fas fa-book"></i>
            TwistersByNight
          </li>
        </a>
        <a href="{{route('register')}}">
          <li>
            <i class="fas fa-user-plus"></i>
            Pridať používatela
          </li>
        </a>
        <form class="w-100" method="POST" action="{{ route('logout') }}">
          @csrf


          <a class="w-100" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
            <li>
              <div class="d-inline-flex align-items-center">
                <i class="fas fa-door-open"></i>
                Odhlásiť
              </div>
            </li>  
          </a>
        </form>
         

        
        {{-- <li>
        <i class="far fa-comments"></i>
          <a href="#">Feedback</a>
        </li>  --}}
      </ul>
    </div>
    
  </div>


  <div class="content">
      @yield('obsah')
  </div>

@endsection