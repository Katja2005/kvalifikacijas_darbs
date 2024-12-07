
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija</title>
    @vite('resources/css/app.css')
    <style>
 body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
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
            margin-bottom: 40px; /* Add some space between h1 and the form */
        }

        

    </style>
</head>
<body>
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
<a href="{{route('rooms')}}">Atpakaļ pie numuriem</a>
</div>
<script>

const today = new Date().toISOString().split('T')[0];

//nevar izveleties pagajušas dienas un gadus, min-šodienas
 const startDate = document.getElementById('start_date');
 const endDate = document.getElementById('end_date');

startDate.min=today;
endDate.min=today;
startDate.addEventListener('change', () => endDate.min = startDate.value);





</script>   
</body>