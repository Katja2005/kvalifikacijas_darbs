<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsauksmes</title>
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
    <h1>Lietotāju atsauksmes</h1>
    
    <table class="table">
<thead>
    <tr>
        <th>Lietotāja vārds un uzvārds</th>
        <th>Vērtejums</th>
        <th>Komentārs</th>
        <th>Izveidots</th>
        <th>Darbības</th>
    </tr>
    @foreach($reviews as $review)

    <tr>
<td>{{$review->user->name}} {{$review->user->surname}}</td>
<td>{{$review->rating}}⭐</td>
<td>{{$review->comment}}</td>
<td> {{ $review->created_at->timezone('Europe/Riga')->format('Y-m-d H:i:s') }}</td>
<td>
<form action="{{route('delete-review', $review->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit">Dzēst komentāru</button>
     </form>
</td>

    </tr>
     
@endforeach
</thead>



    </table>

</div>
</body>
</html>