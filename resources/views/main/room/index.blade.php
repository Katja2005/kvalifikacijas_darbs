<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numuri</title>
    @vite('resources/css/app.css')
    
</head>
<style>
    body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

a{
    color:blue;
    font-weight:bold;
}

h3{
    font-weight:bold;
    color:black;
}



</style>
<body>
<div class="logo">
    <a href="{{url('/')}}">
  <img src="{{ asset('images/preview (2).webp') }}" alt="Logo">
  </a>
    <h1 class="room-title">Mūsu numuri</h1>
  

    <div class="room-container">
        @foreach($rooms as $room)

    <div class="room-card">
        <div class="room-info">
    <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image">
    <h3>{{ $room->title }}</h3>
      <h4 class="description">{{ $room->description }}</h4>        
    <br></br>
    <h5>Numura tips: {{ $room->type }}</h5>
    <h5>🍴Brokastis: {{ $room->breakfast == 'Iekļauts' ? 'Iekļauts' : 'Nav iekļauts' }}</h5>
    <h3>Cena: {{ $room->price}}€</h3>
    
   @auth
    <form action="{{route('book-room', $room->id)}}" method="get">
       
        <button type="submit">Rezervēt </button>
    </form>
    @else
   <form action="{{route('login')}}" method="get">
    <button type="submit">Rezervēt</button>
    <p class='alert'>Lai rezervētu numuru, lūdzu, <a href="{{route('login')}}">pieslēdzieties savam kontam</a> vai <a href="{{route('register')}}">reģistrējieties</a></p>
   </form>
    @endauth
    </div>
    </div>
    @endforeach
    </div> 

</body>
</html>