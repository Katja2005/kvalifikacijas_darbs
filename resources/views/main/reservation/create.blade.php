
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
 body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center; /* Center the text */
        }

        h1 {
            font-size: 2.5em;
            color: black;
            margin-bottom: 40px; 
            margin-top:40px;
        }

        

    </style>
</head>
<body>
<div style= "position: absolute; top:10px; left:10px;">
<form action="{{route('rooms')}}" method="get">
    <button type="submit">Atpakaļ pie numuriem</button>
</form>
    </div>
    <h1>Izveidot rezervaciju</h1>


    <div class="reservation">
    @if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif

    <form action="{{route('make-reservation',$room->id)}}" method="post">
        @csrf
    
    
<label for="name">Vārds:</label>
<input type="name" name="name" @if(Auth::id()) value="{{Auth::user()->name}}" @endif required>
      
<label for="surname">Uzvārds:</label>
<input type="surname" name="surname" @if(Auth::id()) value="{{Auth::user()->surname}}" @endif required>

      
<label for="email">Epasts:</label>
<input type="email" name="email" @if(Auth::id()) value="{{Auth::user()->email}}" @endif required>
       
<label for="phone">Telefona numurs:</label>
<input type="phone" name="phone" @if(Auth::id()) value="{{Auth::user()->phone}}" @endif required>
      
<label for="start_date">Iebraukšanas datums:</label>
<input type="date" name="start_date" id="start_date">
       
<label for="end_date">Izbraukšanas datums:</label>
<input type="date" name="end_date" id="end_date">

<button type="submit">Rezervēt</button>

</form>
<div class="reserved-dates">
@forelse($reservations as $reservation)
        @if($reservation->status !== 'Atcelta' && $reservation->start_date && $reservation->end_date)
            <p><strong>Šis numurs jau ir aizņemts šajās datumos:</strong></p>
            <ul>
                <li> No {{ $reservation->start_date }} līdz {{ $reservation->end_date }}</li>
            </ul>
        @endif
    @empty
        <p><strong>Šis numurs ir brīvs rezervācijām.</strong></p>
    @endforelse
</div>

</body>