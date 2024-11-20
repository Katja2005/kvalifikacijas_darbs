<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manas Rezervacijas</title>
</head>
<body>
    <div class="box">
        <h1>Manas Rezervacijas</h1>
        @if($reservation->isEmpty())
        <p>Jūms nav rezervacijas!</p>
        @else
        <table>
            <thead>
                <tr>

                <th>Numura nosaukums</th>
                <th>Apraksts</th>
                <th>Bilde</th>
                <th>Iebraukšanas datums</th>
                <th>Izbraukšsanas datums</th>
                <th>Kopejā cena</th>
                <th>Status</th>

                </tr>
            </thead>
            <tbody>
@foreach($reservation as $reservation)
        <tr>
<td>{{$reservation->room->title}}</td>
<td>{{$reservation->room->description}}</td>
<td>
@if($reservation->room->image)
<img src="{{ asset('storage/' . $reservation->room->image) }}" alt="Room Image" width="100">
@else
No image
 @endif
</td>
<td>{{$reservation->start_date}}</td>
<td>{{$reservation->end_date}}</td>
<td>{{$reservation->total_price}}€</td>
<td>{{$reservation->status}}</td>

        </tr>
        @endforeach
            </tbody>
           
        </table>
        @endif
    </div>
</body>
</html>