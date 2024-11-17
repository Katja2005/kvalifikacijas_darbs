
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija</title>
    <link rel="stylesheet" href="css/app.css">
    <style>


    </style>
</head>
<body>
    <h1>Izveidot rezervaciju</h1>
    @if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif

    <form action="{{route('makeReservation',$room->id)}}" method="post">
        @csrf
        
   
</body>
</html>
<div class="reservation">
    <div>       
<label for="name">Vārds:</label>
<input type="name" name="name" @if(Auth::id()) value="{{Auth::user()->name}}" @endif required>
</div> 
<div>       
<label for="surname">Uzvārds:</label>
<input type="surname" name="surname" @if(Auth::id()) value="{{Auth::user()->surname}}" @endif required>
</div> 
<div>       
<label for="email">Epasts:</label>
<input type="email" name="email" @if(Auth::id()) value="{{Auth::user()->email}}" @endif required>
</div> 
<div>       
<label for="phone">Telefona numurs:</label>
<input type="phone" name="phone" @if(Auth::id()) value="{{Auth::user()->phone}}" @endif required>
</div> 
<div>       
<label for="start_date">Iebraukšanas datums:</label>
<input type="date" name="start_date" id="start_date">
</div> 
<div>       
<label for="end_date">Izbraukšanas datums:</label>
<input type="date" name="end_date" id="end_date">
</div>
<button type="submit">Rezervēt</button>
</div> 
</form>
<a href="{{route('rooms')}}">Atpakaļ pie numuriem</a>
<script>

const today = new Date().toISOString().split('T')[0];

//nevar izveleties pagajušas dienas un gadus, min-šodienas
 const startDate = document.getElementById('start_date');
 const endDate = document.getElementById('end_date');

startDate.min=today;
endDate.min=today;
startDate.addEventListener('change', () => endDate.min = startDate.value);





</script>