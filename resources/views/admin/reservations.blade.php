<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
</head>
<body>
    <h1>Users reservations</h1>
    @if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif
    <div class="container3">
<table class="table2">
<thead>
<tr>
<th>Reservation status</th>
<th>Room ID</th>
<th>User name</th>
<th>Surname</th>
<th>Email</th>
<th>Phone</th>
<th>Start date</th>
<th>End date</th>
<th>Total price</th>

</tr>


@foreach($reservation as $reservation)
<tr>

<td><form action="{{route('updateStatus', $reservation->id)}}" method="post" >
    @csrf
    @method('PUT')

    <select name="status" id="status">
        <option value="pending" {{$reservation->status == 'pending' ? 'selected' : ''}}>Pending</option>
        <option value="confirmed"{{$reservation->status == 'confirmed' ? 'selected' : ''}}>Confirmed</option>
        <option value="cancel" {{$reservation->status == 'cancel' ? 'selected' : ''}}>Cancel</option>
    </select>
    <button type="submit">Save</button>
</form>
</td>
<td>{{ $reservation->room_id }}</td>
<td>{{ $reservation->name }}</td>
<td>{{ $reservation->surname }}</td>
<td>{{ $reservation->email }}</td>
<td>{{ $reservation->phone }}</td>
<td>{{$reservation->start_date}}</td>
<td>{{$reservation->end_date}}</td>
<td>{{$reservation->total_price}} €</td>



</tr>

@endforeach



</thead>




</table>

<a href="{{route('main')}}" class="back">Back</a>

</div>


</body>
</html>