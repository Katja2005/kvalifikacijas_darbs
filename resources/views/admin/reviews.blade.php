<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsauksmes</title>
</head>
<body>
    <h1>Lietotāju atsauksmes</h1>

    @foreach($reviews as $review)
 <p>Lietotāja vārds:{{$review->user->name}}</p>
 <p>Lietotāja uzvārds:{{$review->user->surname}}</p>
 <p>Vērtejums:{{$review->rating}}</p>
 <p>Komentārs:{{$review->comment}}</p>
@endforeach


<a href="{{route('main')}}">Atpakaļ</a>
</body>
</html>