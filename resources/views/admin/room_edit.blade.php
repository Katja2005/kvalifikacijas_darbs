<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>Update room</h1>
    <form action="{{ route('updateRoom', $room->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

            <div class="container">
            <div>
                <label for="title">Room title</label>
                <input type="text" name="title" id="title" value="{{$room->title}}">
            </div>

            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description">{{$room->description}}</textarea>      
            </div>

            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{$room->price}}" >     
            </div>

            <div>
                <label for="type">Room type</label>
                <select name="type" id="type" required>
                    <option value="standard" {{ $room->type == 'standard' ? 'selected' : '' }}>Standard</option>
                    <option value="deluxe" {{ $room->type == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                    <option value="premium" {{ $room->type == 'premium' ? 'selected' : '' }}>Premium</option>
                </select>
            </div>

            <div>
                <label for="breakfast">Breakfast</label>
                <select name="breakfast" id="breakfast" required>
                    <option value="included" {{ $room->breakfast == 'included' ? 'selected' : '' }}>Included</option>
                    <option value="non-included" {{ $room->breakfast == 'non-included' ? 'selected' : '' }}>Non-include</option>
                </select>
            </div>

            <div>
                <label for="image">Upload image</label>
                <input type="file" name="image" id="image" accept="image/*" >
                @if($room->image)
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $room->image) }}" width="100">
        @endif
            </div>
            <button type="submit">Save Changes</button>
            </form>

    <a href="{{ route('showRoom') }}">Back to Rooms</a>
</body>
</html>