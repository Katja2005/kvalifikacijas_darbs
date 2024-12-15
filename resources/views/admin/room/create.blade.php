<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izveidot numuru</title>
    @vite('resources/css/app.css')
   <style>
  
        h1 {
            font-size: 2.5em;
            color: black;
            margin-bottom: 40px; 
            margin-top:40px;
            text-align:center;
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
    <h1>Izveidot numuru</h1>
<div class="container3">
        <div class="form">
    

   
    <form action="{{ route('add-room') }}" method="POST" enctype="multipart/form-data">
        @csrf
      
            <div>
                <label for="title">Nosaukums:</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div>
                <label for="description">Apraksts:</label>
                <textarea name="description" id="description" required></textarea>      
            </div>

            <div>
                <label for="price">Cena par vienu nakti:</label>
                <input type="number" name="price" id="price" required>     
            </div>

            <div>
                <label for="type">Numura tips:</label>
                <select name="type" id="type" required>
                    <option value="Standart">Standart</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>

            <div>
                <label for="breakfast">Brokastis:</label>
                <select name="breakfast" id="breakfast" required>
                    <option value="Iekļauts">Iekļauts</option>
                    <option value="Nav iekļauts">Nav iekļauts</option>
                </select>
            </div>

            <div>
                <label for="image">Augšupielādēt bildi:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
           <div style = "display: flex; gap: 10px;">
          <button type="submit">Izveidot numuru</button>     
        
    </form>
        
    </div>
    </div>
    </div>


</body>
</html>
