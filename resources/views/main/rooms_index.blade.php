<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numuri</title>
    <link rel="stylesheet" href="css/app.css">
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
    <form action="{{route('bookRoom', $room->id)}}" method="get">
        @csrf
        <button type="submit">Rezervēt </button>
    </form>
    </div>
    </div>
    @endforeach
    </div>
    
</body>
</html>