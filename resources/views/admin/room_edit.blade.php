<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    @vite('resources/css/app.css')
    <style>
         h1{
        font-size:30px;
        font-weight:bold;
       }
       img {
            margin-top: 10px;
            border-radius: 5px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container3">
        <div class="form">
<h1>Rediģēt numuru</h1>
    <form action="{{ route('update-room', $room->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

            <div class="container">
            <div>
                <label for="title">Numura nosaukums</label>
                <input type="text" name="title" id="title" value="{{$room->title}}">
            </div>

            <div>
                <label for="description">Apraksts</label>
                <textarea name="description" id="description">{{$room->description}}</textarea>      
            </div>

            <div>
                <label for="price">Cena</label>
                <input type="number" name="price" id="price" value="{{$room->price}}" >     
            </div>

            <div>
                <label for="type">Numura tips</label>
                <select name="type" id="type" required>
                    <option value="Standart" {{ $room->type == 'Standart' ? 'selected' : '' }}>Standart</option>
                    <option value="Deluxe" {{ $room->type == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                    <option value="Premium" {{ $room->type == 'Premium' ? 'selected' : '' }}>Premium</option>
                </select>
            </div>

            <div>
                <label for="breakfast">Brokastis</label>
                <select name="breakfast" id="breakfast" required>
                    <option value="Iekļauts" {{ $room->breakfast == 'Iekļauts' ? 'selected' : '' }}>Iekļauts</option>
                    <option value="Nav iekļauts" {{ $room->breakfast == 'Nav iekļauts' ? 'selected' : '' }}>Nav iekļauts</option>
                </select>
            </div>

            <div>
                <label for="image">Augšupielādēt bildi</label>
                <input type="file" name="image" id="image" accept="image/*" >
                @if($room->image)
            <p>Tagadēja bilde:</p>
            <img src="{{ asset('storage/' . $room->image) }}" width="100">
        @endif
            </div>
            <button type="submit">Saglabāt izmaiņas</button>
            </form>

    <a href="{{ route('show-room') }}">Atpakaļ pie numuriem</a>
    </div>
    </div>
</body>
</html>