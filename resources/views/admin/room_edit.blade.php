<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    
</head>
<body>
    <h1>Rediģēt numuru</h1>
    <form action="{{ route('updateRoom', $room->id) }}" method="POST" enctype="multipart/form-data" >
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
                    <option value="Iekļauts" {{ $room->breakfast == 'included' ? 'selected' : '' }}>Iekļauts</option>
                    <option value="Nav iekļauts" {{ $room->breakfast == 'non-included' ? 'selected' : '' }}>Nav iekļauts</option>
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

    <a href="{{ route('showRoom') }}">Atpakaļ pie numuriem</a>
</body>
</html>