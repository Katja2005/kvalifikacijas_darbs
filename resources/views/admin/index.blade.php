<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administratora panelis</title>
    @vite('resources/css/app.css')
    
</head>

<x-app-layout>
    
</x-app-layout>

<div class="panel">
    <h1>Administratora panelis</h1>
<a href="{{route('create-room')}}">Izveidot numuru</a>

<a href="{{route('show-room')}}">Numuri</a>

<a href="{{route('reservations')}}">Rezervacijas</a>

<a href="{{route('user-reviews')}}">Atsauksmes</a>


<a href="{{url('/')}}">Galvena lapa</a>
</div>

<body>
    
</body>
</html>