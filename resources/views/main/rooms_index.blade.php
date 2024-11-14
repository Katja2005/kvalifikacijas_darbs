<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our rooms</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="logo">
    <a href="{{url('/')}}">
  <img src="{{ asset('storage/room/preview (2).webp') }}" alt="Logo">
  </a>
    <h1 class="room-title">Our Rooms</h1>

    <div class="room-container">
        @foreach($room as $room)

    <div class="room-card">
        <div class="room-info">
    <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image">
    <h3>{{ $room->title }}</h3>
    <p><strong>{{ $room->description }}</strong></p>
    <p><strong>Type: {{ $room->type }}</strong></p>
    <p><strong>Price: €{{ $room->price}} </strong></p>
    <p><strong>Breakfast: {{ $room->breakfast?  'Included' : 'Not Included' }}</strong></p>
    <form action="{{route('bookRoom', $room->id)}}" method="get">
        @csrf
        <button type="submit">Book Room</button>
    </form>
    </div>
    </div>
    @endforeach
    </div>
    
</body>
</html>