
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="container2">
<table class="table">
<thead>
<tr>
<th>Actions</th>
<th>Room title</th>
<th>Description</th>
<th>Price</th>
<th>Room type</th>
<th>Breakfast</th>
<th>Image</th>
</tr>


@foreach($room as $room)
<tr>

<td>
<form action="{{ route('deleteRoom', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the selected rooms?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete">Delete</button>
            </form>
            
<br></br>
             
            <form action="{{ route('editRoom', $room->id) }}" method="GET" >
            <button type="submit" class="delete">Edit</button>
            </form>
            <!---<a href="{{ route('editRoom', $room->id) }} " >Edit</a>-->
</td>
<td>{{ $room->title }}</td>
<td>{{ $room->description }}</td>
<td>€{{ $room->price }}</td>
<td>{{ $room->type }}</td>
<td>{{ $room->breakfast }}</td>
<td>
@if($room->image)
<img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="100">
@else
No image
 @endif
</td>
</tr>

@endforeach



</thead>




</table>

<a href="{{route('main')}}" class="back">Back</a>

</div>


    
</body>
</html>





