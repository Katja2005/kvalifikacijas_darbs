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
            background-color: #f9f9f9;
            color: black;
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
        
.total_price{
    font-weight:bold;
    font-size:20px;
}
.text-red{
            color: red;
            font-weight: bold;
            font-size: larger;
        }

        .text-yellow{
            color: #ffcc00;
            font-weight: bold;
            font-size: larger;
        }
.text-green{
    color: green;
    font-weight: bold;
    font-size: larger;
}

       
</style>
<body>
<div style= "position: absolute; top:10px; left:10px;">
<form action="{{url('/')}}" method="get">
            <button type="submit">Atpakaļ</button>
        </form>
</div>
    <div class="box">
        <h1>Manas Rezervacijas</h1>
        @if($reservations->isEmpty())
        <p>Jūms nav rezervacijas!</p>
        @if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif
        @else
        <table class="table">
            <thead>
                <tr>

                <th>Numura detaļas</th>
                <th>Iebraukšanas datums</th>
                <th>Izbraukšanas datums</th>
                <th>Kopejā cena</th>
                <th>Status</th>
                <th>Darbība</th>

                </tr>
            </thead>
            <tbody>
@foreach($reservations as $reservation)
        <tr>

<td>
    <form action="{{route('reservation-details', $reservation->id)}}" method="get">
        <button type="submit">Detaļas</button>
    </form> 
</td>
<td>{{$reservation->start_date}}</td>
<td>{{$reservation->end_date}}</td>
<td class="total_price">{{$reservation->total_price}}€</td>
<td>{{$reservation->status }}</td>
<td>
    @if($reservation->status === 'Apstrāde')
    <form action="{{route('delete-reservation', $reservation->id)}}" method="post" onsubmit="return confirm('Jūs esat pārliecināti, ka gribāt atcelt šo rezervaciju?');">
        @csrf
        @method('DELETE')
        <button type="submit" >Atcelt rezervaciju</button>
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

        
    </div>
</body>
</html>