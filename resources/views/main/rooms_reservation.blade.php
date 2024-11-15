
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="css/app.css">
    <style>


    </style>
</head>
<body>
    <h1>Make reservattion</h1>
    @if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif

    <form action="{{route('makeReservation',$room->id)}}" method="post">
        @csrf
        
   
</body>
</html>
<div class="reservation">
    <div>       
<label for="name">Name</label>
<input type="name" name="name" @if(Auth::id()) value="{{Auth::user()->name}}" @endif required>
</div> 
<div>       
<label for="surname">Surname</label>
<input type="surname" name="surname" @if(Auth::id()) value="{{Auth::user()->surname}}" @endif required>
</div> 
<div>       
<label for="email">Email</label>
<input type="email" name="email" @if(Auth::id()) value="{{Auth::user()->email}}" @endif required>
</div> 
<div>       
<label for="phone">Phone</label>
<input type="phone" name="phone" @if(Auth::id()) value="{{Auth::user()->phone}}" @endif required>
</div> 
<div>       
<label for="start_date">Start Date</label>
<input type="date" name="start_date" id="start_date">
</div> 
<div>       
<label for="end_date">End Date</label>
<input type="date" name="end_date" id="end_date">
</div>
<button type="submit">Book</button>
</div> 
</form>
<a href="{{route('rooms')}}">Back to rooms</a>
<script>

const today = new Date().toISOString().split('T')[0];

//nevar izveleties pagajušas dienas un gadus, min-šodienas
 const startDate = document.getElementById('start_date');
 const endDate = document.getElementById('end_date');

startDate.min=today;
endDate.min=today;
startDate.addEventListener('change', () => endDate.min = startDate.value);





</script>