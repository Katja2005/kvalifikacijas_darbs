<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numuri</title>
    @vite('resources/css/app.css')
    
</head>
<style>


a{
    color:#2c3e50;
    font-weight:bold;
    
}

h3{
    font-weight:bold;
    color:black;
}



</style>
<body>


        <div style= "position: absolute; top:10px; left:10px;">
        <form action="{{url('/')}}" method="get">
        <button type="submit">Atpakaļ</button>
    </form>
        </div>

    <h1 class="room-title">Mūsu numuri</h1>
  

    <div class="room-container">
        @foreach($rooms as $room)

    <div class="room-card">
        <div class="room-info">
    <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image">
    <h3>{{ $room->title }}</h3>
      <h4 class="description">{{ $room->description }}</h4>        
    <br></br>
    <h5><strong>Numura tips: </strong> {{ $room->type }}</h5>
    <h5><strong>🍴Brokastis: </strong> {{ $room->breakfast == 'Iekļauts' ? 'Iekļauts' : 'Nav iekļauts' }}</h5>
    <h3>Cena: {{ $room->price}}€</h3>
    
   @auth
    <form action="{{route('book-room', $room->id)}}" method="get">
       
        <button type="submit">Rezervēt </button>
    </form>
    @else
   <form action="{{route('login')}}" method="get">
    <button type="submit">Rezervēt</button>
    <p>Lai rezervētu numuru, lūdzu, <a href="{{route('login')}}">pieslēdzieties savam kontam</a> vai <a href="{{route('register')}}">reģistrējieties</a></p>
   </form>
    @endauth
    </div>
    </div>
    @endforeach
    </div> 


 
    
</body>
</html>