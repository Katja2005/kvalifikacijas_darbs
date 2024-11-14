<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">



    
</head>
<body >

  <div class="logo">
    <a href="{{url('/')}}">
  <img src="{{ asset('storage/room/preview (2).webp') }}" alt="Logo">
  </a>
    </div>
    

<header>

    
<h1 class="main-title">Baltic Breeze Hotel</h1>
        
            <nav class="center-nav">
           
            <a href="{{ route('rooms') }}" class="nav-link">Rooms</a>
            </nav>
            
            <div class="header-nav">
            @if (Route::has('login'))
                @auth
                    <x-app-layout>

                    </x-app-layout>
                @else
                    <form action="{{ url('login') }}" method="get" style="display: inline;">
                    @csrf
                    <button type="submit">Login</button>
                    
                    </form>
                    @if (Route::has('register'))
                    <form action="{{ url('register') }}" method="get" style="display: inline;">
                    @csrf
                    <button type="submit">Register</button>
                  
                    </form>
                    @endif
                @endauth
               @endif 
                </div>
                </header> 
                </body>
                </html>
