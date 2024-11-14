<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room create</title>
    <style>
       
    </style>
</head>
<body>
    <h1>Create Room</h1>

   
    <form action="{{ route('addRoom') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div>
                <label for="title">Room title</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required></textarea>      
            </div>

            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" required>     
            </div>

            <div>
                <label for="type">Room type</label>
                <select name="type" id="type" required>
                    <option value="standard">Standard</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="premium">Premium</option>
                </select>
            </div>

            <div>
                <label for="breakfast">Breakfast</label>
                <select name="breakfast" id="breakfast" required>
                    <option value="included">Included</option>
                    <option value="non-included">Non-included</option>
                </select>
            </div>

            <div>
                <label for="image">Upload image</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>

            <div>
                <input class="btn" type="submit" value="Add Room">
            </div>
        </div>
    </form>
</body>
</html>
