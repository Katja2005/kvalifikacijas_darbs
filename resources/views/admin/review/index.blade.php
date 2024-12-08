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
            font-size:25px;
        }
    </style>
</head>

<body>
@if(session()->has('message'))
   <div class="message">{{session()->get('message')}}</div> 
    @endif
<div class="container3">
    <h1>Lietotāju atsauksmes</h1>
    
    <table class="table2">
<thead>
    <tr>
        <th>Lietotāja vārds un uzvārds</th>
        <th>Vērtejums</th>
        <th>Komentārs</th>
        <th>Darbības</th>
    </tr>
    @foreach($reviews as $review)

    <tr>
<td>{{$review->user->name}} {{$review->user->surname}}</td>
<td>{{$review->rating}}⭐</td>
<td>{{$review->comment}}</td>
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

<a href="{{route('main')}}">Atpakaļ</a>
</div>
</body>
</html>