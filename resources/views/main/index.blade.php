<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baltic Breeze Hotel</title>
    @vite('resources/css/app.css')
    <style>
.background {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('{{ asset("images/preview.jpg") }}');
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
    overflow: hidden;
}


    </style>

    
</head>
<body >
<div class="background">
  
    


<h1 class="main-title">Baltic Breeze Hotel</h1>
<p style="font-size: 1.5em; text-align: center; max-width: 600px; ">
            Piedzīvo neaizmirstamus mirkļus mūsu viesnīcā!
        </p>
        <br></br>
            <nav>
           
            <a href="{{ route('rooms') }}" class="nav-link">Numuri</a>
            
            @auth
            @if (Auth::user()->role === 'user')
            <a href="{{ route('my-reservations') }}" class="nav-link">Manas rezervacijas</a>
            @endif
            @endauth
            <a href="{{route('reviews')}}" class="nav-link" >Atsauksmes</a>
            <a href="{{ route('contacts') }}" class="nav-link">Kontakti</a>
            </nav>
         


          
            
            <div class="header-nav">
           
                @auth
                    <x-app-layout>

                    </x-app-layout>
                @else
                    <form action="{{ route('login') }}" method="GET" style="display: inline;">
                    
                    <button type="submit">Pieslēgties</button>
                    
                    </form>
                   
                    <form action="{{ route('register') }}" method="GET" style="display: inline;">
                   
                    <button type="submit">Reģistrēties</button>
                  
                    </form>
                   
                @endauth
                
                </div> 
                </div>
                <footer>
    <p>&copy; 2024 Baltic Breeze Hotel. Visas tiesības aizsargātas.</p>
   
</footer>
                </body>
                </html>
