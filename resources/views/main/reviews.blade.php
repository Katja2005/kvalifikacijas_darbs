<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsauksmes</title>
</head>
<body>
    <h1>Atsauksmes</h1>
    @if($reviews->isEmpty())
    <p>Pagaidam nav atsauksmes!</p>
    @else
    @foreach($reviews as $review)
    <div>
    <strong>{{ $review->user->name }}</strong> (Vērtējums: {{ $review->rating }})
    <p>{{$review->comment}}</p>
    </div>
    @endforeach
    @endif

@auth
<h2>Pievienot atsaukskmi</h2>
<form action="{{route('createReview')}}" method="post">
    @csrf
    <label for="rating">Vērtējums:</label>
    <select name="rating" id="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <label for="comment">Komentārs:</label>
    <textarea name="comment" id="comment"></textarea>

    <button type="submit">Pievienot atsauksmi</button>
</form>
@else
<p><a href="{{ route('login')}}">Pierakstities</a>, lai pievienotu atsauskmi</p>
@endauth

<a href="{{ url('/')}}">Atpakaļ</a>
</body>
</html>