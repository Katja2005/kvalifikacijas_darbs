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
            font-weight:bold;
            font-size:25px;
        }
        h2{
            font-weight:bold;
            text-align: left;
            font-size:25px;
        }
        
       .back{
        text-align: center;
            display: block;
       }
        
      

      
    </style>
</head>
<body>

    <div class="container6">
        <h1>Numura Detaļas</h1>

        <div class="room-details">
            <h2>{{ $reservation->room->title }}</h2>
            <img src="{{ asset('storage/' . $reservation->room->image) }}" alt="Room Image">
            <p><strong>Apraksts:</strong> {{ $reservation->room->description }}</p>
            <p><strong>🍴Brokastis:</strong> {{ $reservation->room->breakfast }}</p>
        </div>
        <br></br>

        <a href="{{ route('my-reservations') }}" class="back" >Atpakaļ uz rezervācijām</a>
    </div>

</body>
</html>
