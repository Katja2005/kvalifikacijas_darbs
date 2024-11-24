<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsauksmes</title>
    @vite('resources/css/app.css')
</head>
<style>
     body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 28px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight:bold;
        }
</style>

<body>
<div class="container4">
    <h1>Lietotāju atsauksmes</h1>
    @foreach($reviews as $review)
   <div class="review">
    <header>
<div class="user-name">{{$review->user->name}} {{$review->user->surname}}</div>
<div class="rating">Vērtejums:{{$review->rating}} <span>&#9733;</span></div>
    </header>
    <div class="comment">
        
 <p><strong>Komentārs:</strong>{{$review->comment}}</p>
    </div>



    <form action="{{route('deleteReview', $review->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit">Dzēst komentāru</button>
     </form>
 </div>
 
@endforeach



<a href="{{route('main')}}">Atpakaļ</a>
</div>
</body>
</html>