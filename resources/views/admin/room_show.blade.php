
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numuri</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container2">
<table class="table">
<thead>
<tr>
<th>Darbības</th>
<th>Numura nosaukums</th>
<th>Apraksts</th>
<th>Cena par vienu nakti</th>
<th>Numura tips</th>
<th>Brokastis</th>
<th>Bilde</th>
</tr>


@foreach($room as $room)
<tr>

<td>
<form action="{{ route('deleteRoom', $room->id) }}" method="POST" onsubmit="return confirm('Jūs esat pārliecināti, ka gribāt noņemt šo numuru?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete">Noņemt</button>
            </form>
            
<br></br>
             
            <form action="{{ route('editRoom', $room->id) }}" method="GET" >
            <button type="submit" class="delete">Rediģēt</button>
            </form>
            
</td>
<td>{{ $room->title }}</td>
<td>{{ $room->description }}</td>
<td>{{ $room->price }}€</td>
<td>{{ $room->type }}</td>
<td>{{ $room->breakfast }}</td>
<td>
@if($room->image)
<img src="{{ asset('images/' . $room->image) }}" alt="Room Image" width="100">
@else
No image
 @endif
</td>
</tr>

@endforeach



</thead>




</table>

<a href="{{route('main')}}" class="back">Atpakaļ</a>

</div>


    
</body>
</html>





