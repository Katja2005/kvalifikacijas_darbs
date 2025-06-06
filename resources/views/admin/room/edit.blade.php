<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediģēt numuru</title>
    @vite('resources/css/app.css')
    <style>
       
       img {
            margin-top: 10px;
            border-radius: 5px;
            display: block;
        }

        p{
            font-size:20px;
        }

        h1{
            font-size: 2.5em;
            color: black;
            margin-bottom: 40px; 
            margin-top:40px;
            text-align:center;
        }
    </style>
</head>
<body>
<div style= "position: absolute; top:10px; left:10px;">
<form action="{{route('show-room')}}" method="get">
    <button type="submit">Atpakaļ </button>
    </form> 
</div>
<h1>Rediģēt numuru</h1>
    <div class="container3">
        <div class="form">

    <form action="{{ route('update-room', $room->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

            <div class="container">
            <div>
                <label for="title">Numura nosaukums:</label>
                <input type="text" name="title" id="title" value="{{$room->title}}">
            </div>

            <div>
                <label for="description">Apraksts:</label>
                <textarea name="description" id="description">{{$room->description}}</textarea>      
            </div>

            <div>
                <label for="price">Cena:</label>
                <input type="number" name="price" id="price" value="{{$room->price}}" >     
            </div>

            <div>
                <label for="type">Numura tips:</label>
                <select name="type" id="type" required>
                    <option value="Standart" {{ $room->type == 'Standart' ? 'selected' : '' }}>Standart</option>
                    <option value="Deluxe" {{ $room->type == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                    <option value="Premium" {{ $room->type == 'Premium' ? 'selected' : '' }}>Premium</option>
                </select>
            </div>

            <div>
                <label for="breakfast">Brokastis:</label>
                <select name="breakfast" id="breakfast" required>
                    <option value="Iekļauts" {{ $room->breakfast == 'Iekļauts' ? 'selected' : '' }}>Iekļauts</option>
                    <option value="Nav iekļauts" {{ $room->breakfast == 'Nav iekļauts' ? 'selected' : '' }}>Nav iekļauts</option>
                </select>
            </div>

            <div>
                <label for="image">Augšupielādēt bildi:</label>
                <input type="file" name="image" id="image" accept="image/*" >
                @if($room->image)
            <p style= "font-weight:bold;">Tagadēja bilde:</p>
            <img src="{{ asset('storage/' . $room->image) }}" width="200">
        @endif
            </div>
            
            
            <div style = "display: flex; gap: 10px; margin-top:20px" >
            <button type="submit">Saglabāt izmaiņas</button>
            </form>



            </div>
    </div>
    </div>
</body>
</html>