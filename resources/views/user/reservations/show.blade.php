<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numura Detaļas</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
      
        h1 {
            text-align: center;
            color: black;
          
            font-size:2.5em;
        }
        h2{
           
            text-align: left;
            font-size:25px;
            font-weight:bold;
        }
    
        
      

      
    </style>
</head>
<body>
<div style= "position: absolute; top:10px; left:10px;">
<form action="{{ route('my-reservations') }}" method="get">
            <button type="submit">Atpakaļ uz rezervācijām</button>
        </form>
        
    </div>
    <div class="container6">
        <h1>Numura Detaļas</h1>

        <div class="room-details">
            <h2>{{ $reservation->room->title }}</h2>
            <img src="{{ asset('storage/' . $reservation->room->image) }}" alt="Room Image" >
            <p> {{ $reservation->room->description }}</p>
            <p><strong>Numura tips:</strong> {{ $reservation->room->type }}</p>
            <p><strong>🍴Brokastis:</strong> {{ $reservation->room->breakfast }}</p>

        </div>
     


      
    </div>

</body>
</html>
