<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsauksmes</title>
  <style>
      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333;
            line-height: 1.6;
           
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #444;
        }

        .review-card {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .review-card:last-child {
            border-bottom: none;
        }

        .review-card strong {
            color: #333;
            font-size: 1.1rem;
        }

        .rating1 {
            font-size: 1rem;
            color: #f39c12;
        }

        .no-reviews {
            text-align: center;
            color: #888;
            font-size: 1.1rem;
        }

        /* Forma */
        .review-form {
            margin-top: 30px;
            padding: 20px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 35%;
            margin-left:500px;

        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #444;
        }

        form select, form textarea, form button {
            width: 90%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
           
        }

        form select:focus, form textarea:focus {
            border-color: #1a73e8;
            outline: none;
        }

        textarea {
            resize: none;
        }

        button {
            background-color:#2c3e50;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
       
        }

        button:hover {
            background-color: #2c3e50;
        }

        .auth-link, .back-link {
            text-align: center;
            display: block;
           
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size:20px;
        }

        .auth-link:hover, .back-link:hover {
            text-decoration: underline;
        }
 
  </style>
</head>
<body>
    <div class="container">
    <h1>Atsauksmes</h1>
    @if($reviews->isEmpty())
    <p class="no-reviews">Pagaidam nav atsauksmes!</p>
    @else
    @foreach($reviews as $review)
    <div class="review-card">
    <p><strong>{{ $review->user->name }}</strong></p>
    <div class="rating1">Vērtējums: {{ $review->rating }}⭐</div>
    <p>{{$review->comment}}</p>
    </div>
    @endforeach
    @endif
    </div>

@auth
<div class="review-form">
<h2>Pievienot atsaukskmi</h2>
<form action="{{route('create-review')}}" method="post">
    @csrf
    <label for="rating">Vērtējums:</label>
    <select name="rating" id="rating">
        <option value="1">1⭐</option>
        <option value="2">2⭐</option>
        <option value="3">3⭐</option>
        <option value="4">4⭐</option>
        <option value="5">5⭐</option>
    </select>

    <label for="comment">Komentārs:</label>
    <textarea name="comment" id="comment"  placeholder="Ierakstiet savu atsauksmi šeit..."></textarea>

    <button type="submit">Pievienot atsauksmi</button>
    <a href="{{ url('/')}}" class="back-link">Atpakaļ</a>
</form>
</div>
@else
<p class="auth-link"><a href="{{ route('login')}}">Pieslēdzieties, </a> lai pievienotu atsauksmi.</p>
@endauth



</body>
</html>