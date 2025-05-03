<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacijas</title>
    @vite('resources/css/app.css')
    <style>
        h1{
            text-align:center;
            font-size: 2.5em;
        }
    </style>
</head>
<body>
<div style= "position: absolute; top:10px; left:10px;">
<form action="{{route('main')}}" method="get">
    <button type="submit">Atpakaļ</button>
    </form> 
</div>
    
    @if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif
    <div class="container3">
     <h1>Lietotāju rezervācijas</h1>
<table class="table">
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
<th>Darbība</th>

</tr>


@foreach($reservations as $reservation)
<tr class="{{ $reservation->status === 'Atcelta' ? 'cancelled-row' : '' }}">

<td><form action="{{route('update-status', $reservation->id)}}" method="post" >
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
<td>
@if ($reservation->status === 'Atcelta')
                        
<form action="{{ route('delete-reservationn', $reservation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('Vai tiešām vēlies dzēst šo rezervāciju?')">Dzēst</button>
                        </form>
                        @endif
</td>


</tr>

@endforeach



</thead>




</table>



</div>


</body>
</html>