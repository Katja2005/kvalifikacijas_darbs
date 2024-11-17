<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izveidot numuru</title>
    <link rel="stylesheet" href="css/app.css">
    <style>
       
    </style>
</head>
<body>
    <div class="container3">
        <div class="form">
    <h1>Izveidot numuru</h1>

   
    <form action="{{ route('addRoom') }}" method="POST" enctype="multipart/form-data">
        @csrf
      
            <div>
                <label for="title">Nosaukums</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div>
                <label for="description">Apraksts</label>
                <textarea name="description" id="description" required></textarea>      
            </div>

            <div>
                <label for="price">Cena par vienu nakti</label>
                <input type="number" name="price" id="price" required>     
            </div>

            <div>
                <label for="type">Numura tips</label>
                <select name="type" id="type" required>
                    <option value="Standart">Standart</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>

            <div>
                <label for="breakfast">Brokastis</label>
                <select name="breakfast" id="breakfast" required>
                    <option value="included">Iekļauts</option>
                    <option value="non-included">Nav iekļauts</option>
                </select>
            </div>

            <div>
                <label for="image">Augšupielādēt bildi</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>

            <div>
                <input class="back-btn" type="submit" value="Add Room">
                <a href="{{route('main')}}" class="back-btn">Atpakaļ</a>

            </div>
        </div>
    </form>
    </div>
    </div>


</body>
</html>
