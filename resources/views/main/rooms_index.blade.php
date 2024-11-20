<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numuri</title>
    @vite('resources/css/app.css')
    
</head>
<body>
<div class="logo">
    <a href="{{url('/')}}">
  <img src="{{ asset('storage/room/preview (2).webp') }}" alt="Logo">
  </a>
    <h1 class="room-title">Mūsu numuri</h1>
  

    <div class="room-container">
        @foreach($room as $room)

    <div class="room-card">
        <div class="room-info">
    <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image">
    <h3>{{ $room->title }}</h3>
    <p><strong>{{ $room->description }}</strong></p>
    <p><strong>Numura tips: {{ $room->type }}</strong></p>
    <p><strong>Cena: {{ $room->price}}€</strong></p>
    <p><strong>Brokastis: {{ $room->breakfast == 'included' ? 'Iekļauts' : 'Nav iekļauts' }}</strong></p>
    
    @if(auth()->check())
    <form action="{{route('bookRoom', $room->id)}}" method="get">
        @csrf
        <button type="submit">Rezervēt </button>
    </form>
    @else
   <form action="{{route('login')}}" method="get">
    <button type="submit">Rezervēt</button>
    <p class='alert'>Lai rezervet numuru, lūdzu <a href="{{route('login')}}">ieiet</a> vai <a href="{{route('register')}}">reģistrejieties</a></p>
   </form>
    @endif
    </div>
    </div>
    @endforeach
    </div>
    
</body>
</html>