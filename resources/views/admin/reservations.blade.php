<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacijas</title>
    @vite('resources/css/app.css')
    
</head>
<body>
    
    @if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif
    <div class="container3">
<table class="table2">
<thead>
<tr>
<th>Rezervacijas status</th>
<th>Numura ID</th>
<th>Lietotāja vārds</th>
<th>Uzvārds</th>
<th>Epasts</th>
<th>Telefona numurs</th>
<th>Iebraukšanas datums</th>
<th>Izbraukšanas datums</th>
<th>Kopejā cena</th>

</tr>


@foreach($reservations as $reservation)
<tr>

<td><form action="{{route('updateStatus', $reservation->id)}}" method="post" >
    @csrf
    @method('PUT')

    <select name="status" id="status">
        <option value="Apstrāde" {{$reservation->status == 'Apstrāde' ? 'selected' : ''}}>Apstrāde</option>
        <option value="Apstiprināta"{{$reservation->status == 'Apstiprināta' ? 'selected' : ''}}>Apstiprināta</option>
        <option value="Atcelta" {{$reservation->status == 'Atcelta' ? 'selected' : ''}}>Atcelta</option>
    </select>
    <br></br>
    <button type="submit" >Saglabāt</button>
</form>
</td>
<td>{{ $reservation->room_id }}</td>
<td>{{ $reservation->user->name }}</td>
<td>{{ $reservation->user->surname }}</td>
<td>{{ $reservation->user->email }}</td>
<td>{{ $reservation->user->phone }}</td>
<td>{{$reservation->start_date}}</td>
<td>{{$reservation->end_date}}</td>
<td>{{$reservation->total_price}} €</td>



</tr>

@endforeach



</thead>




</table>

<a href="{{route('main')}}" class="back">Atpakaļ</a>

</div>


</body>
</html>