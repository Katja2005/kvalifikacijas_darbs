<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baltic Breeze Hotel</title>
    @vite('resources/css/app.css')
    <style>
.background {
    background-image: url('{{ asset("images/preview.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    position: relative;
    flex-direction: column;
}


    </style>

    
</head>
<body >
<div class="background">
  <div class="logo">
    <a href="{{url('/')}}">
  <img src="{{ asset('images/preview (2).webp') }}" alt="Logo">
  </a>
    </div>
    

<header>

    <div class="header-content">
<h1 class="main-title">Baltic Breeze Hotel</h1>
        
            <nav class="center-nav">
           
            <a href="{{ route('rooms') }}" class="nav-link">Numuri</a>
            <a href="{{ route('contacts') }}" class="nav-link">Kontakti</a>
            @auth
            <a href="{{ route('myReservations') }}" class="nav-link">Manas rezervacijas</a>
            @endauth
            <a href="{{route('reviews')}}" class="nav-link" >Atsauksmes</a>
            </nav>
            </div>
            </div>

          
            
            <div class="header-nav">
            @if (Route::has('login'))
                @auth
                    <x-app-layout>

                    </x-app-layout>
                @else
                    <form action="{{ url('login') }}" method="get" style="display: inline;">
                    @csrf
                    <button type="submit">Ieiet</button>
                    
                    </form>
                    @if (Route::has('register'))
                    <form action="{{ url('register') }}" method="get" style="display: inline;">
                    @csrf
                    <button type="submit">Reģistrēties</button>
                  
                    </form>
                    @endif
                @endauth
               @endif 
                </div>
                </header> 
                </div>
                </body>
                </html>
