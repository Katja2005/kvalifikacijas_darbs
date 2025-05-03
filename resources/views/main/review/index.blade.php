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
            color: black;
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
            color: black;
            font-size:1.9em;
        }

        .review-card {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .review-card:last-child {
            border-bottom: none;
        }

        .review-card strong {
            color: black;
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
            margin-left:440px;
            margin-bottom: 30px;
            

        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: black;
        }

        form select, form textarea {
            width: 90%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            
           
        }

        form select:focus, form textarea:focus {
            border-color: #2c3e50;
            outline: none;
        }

        textarea {
            resize: none;
            
        }

       button {
    color: black;
    background-color: white;
    border: 2px solid #2c3e50;
    border-radius: 5px;
    padding: 8px 20px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    

}

button:hover {
    background-color: #384f65;
    color: white; 
}
         
 .login{
    display: flex;
    justify-content: center;
    align-items: center;
 }
  </style>
</head>
<body>
<div style= "position: absolute; top:10px; left:10px;">
<form action="{{url('/')}}" method="get">
    <button type="submit">Atpakaļ</button>
</form>
</div>
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
    <br></br>
    <p>{{$review->created_at->timezone('Europe/Riga')->format('Y-m-d H:i:s')}}</p>
    </div>
    @endforeach
    @endif
    </div>

@auth
<div class="review-form">
<h2>Pievienot atsauksmi</h2>
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
    <textarea name="comment" id="comment" required ></textarea>


    <div style="display: flex; gap: 10px;">
    <button type="submit">Pievienot atsauksmi</button>
    
</form>


</div>
</div>
@else
<div class="login">
<form action="{{ route('login')}}" method="get">
    <button type="submit">Pieslēdzieties,  lai pievienotu atsauksmi</button>
</form>
</div>
@endauth



</body>
</html>