<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manas Rezervacijas</title>
    @vite('resources/css/app.css')
</head>
<style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            color: #333;
        }
        .box {
            max-width: 1100px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: black;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }
        table thead {
            background: #2c3e50;
            color: white;
        }
        table th, table td {
            text-align: left;
            padding: 15px;
            font-size: 16px;
            color: #555;
           
        }
        table th {
            letter-spacing: 1px;
            text-transform: uppercase;
            color: white;
        }
        table td {
            color:black;
        }

        table td img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            
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
        .delete {
            background: #e74c3c;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
       .delete:hover {
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
        .title{
            font-weight:bold;
        }
.total_price{
    font-weight:bold;
    font-size:20px;
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
                <th>Detaļas</th>
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
<td class="title">{{$reservation->room->title}}</td>
<td>
    <form action="{{route('reservation-details', $reservation->id)}}" method="get">
        <button type="submit">Detaļas</button>
    </form> 
</td>
<td>{{$reservation->start_date}}</td>
<td>{{$reservation->end_date}}</td>
<td class="total_price">{{$reservation->total_price}}€</td>
<td class= "@if($reservation->status === 'Apstrāde')text-yellow
            @elseif($reservation->status === 'Apstiprināta')text-green
            @elseif($reservation->status === 'Atcelta')text-red
            @else
            ---
            @endif">
{{$reservation->status }}</td>
<td>
    @if($reservation->status === 'Apstrāde')
    <form action="{{route('delete-reservation', $reservation->id)}}" method="post" onsubmit="return confirm('Jūs esat pārliecināti, ka gribāt atcelt šo rezervaciju?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete">Atcelt rezervaciju</button>
    </form>
    @else
    Nav darbību
    @endif

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