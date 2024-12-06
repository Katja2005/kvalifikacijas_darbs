<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manas Rezervacijas</title>
</head>
<style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .box {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: black;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: #888;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table thead {
            background: #2c3e50;
        }
        table th, table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        table th {
            color: white;
            font-size: 14px;
            text-transform: uppercase;
        }
       
        table td img {
            border-radius: 4px;
        }
        .message {
            margin: 20px auto;
            padding: 10px;
            background: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            border-radius: 5px;
            max-width: 600px;
            text-align: center;
        }
        button {
            background: #e74c3c;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        button:hover {
            background: #c0392b;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            text-align: center;
        }
        a:hover {
            color: #2980b9;
        }
</style>
<body>
    <div class="box">
        <h1>Manas Rezervacijas</h1>
        @if($reservations->isEmpty())
        <p>Jūms nav rezervacijas!</p>
        @if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif
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
                <th>Darbība</th>

                </tr>
            </thead>
            <tbody>
@foreach($reservations as $reservation)
        <tr>
<td>{{$reservation->room->title}}</td>
<td>{{$reservation->room->description}}</td>
<td>
@if($reservation->room->image)
<img src="{{ asset('storage/' . $reservation->room->image) }}" alt="Room Image" width="110">
@else
No image
 @endif
</td>
<td>{{$reservation->start_date}}</td>
<td>{{$reservation->end_date}}</td>
<td>{{$reservation->total_price}}€</td>
<td>{{$reservation->status}}</td>
<td>
    <form action="{{route('deleteReservation', $reservation->id)}}" method="post" onsubmit="return confirm('Jūs esat pārliecināti, ka gribāt atcelt šo rezervaciju?');">
        @csrf
        @method('DELETE')
        <button type="submit">Atcelt rezervaciju</button>
    </form>

</td>

        </tr>
        @endforeach
            </tbody>
           
        </table>
        @endif

        <a href="{{url('/')}}">Atpakaļ</a>
    </div>
</body>
</html>