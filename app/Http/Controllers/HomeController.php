<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


public function bookRoom($id){
    if(!auth()->check()){
        return redirect()->route('login')->with('error', 'Lai veiktu rezervaciju,lūdzu,reģistrejies vai autorizejies');
    }
$room=Room::find($id);

return view('main.rooms_reservation',compact('room'));
    }



public function makeReservation(Request $request , $id){


$reservation = new Reservation;
$reservation->room_id=$id;
$reservation->name = $request->name;
$reservation->surname = $request->surname;
$reservation->email = $request->email;
$reservation->phone = $request->phone;
$reservation->start_date = $request->start_date;
$reservation->end_date = $request->end_date;


$room = Room::findOrFail($id);
$startDate= $request->start_date;
$endDate = $request->end_date;

$reserved = Reservation::where('room_id', $id)
->where('start_date','<=',$endDate)
->where('end_date','<=',$startDate)->exists();


if($reserved){
    return redirect()->back()->with('message','Šis numurs nav pieejams,mēģiniet citās datumos  ');
}
else{
    $reservation->start_date = $request->start_date;
$reservation->end_date = $request->end_date;

}


//aprēķina kopēju cenu pēc nakšu skaita . Cena par vienu nakti * naktis
$start=Carbon::parse($request->start_date);
$end=Carbon::parse($request->end_date);
$nights=$start->diffInDays($end);

$reservation->total_price = $nights * $room->price;


$reservation->save();
return redirect()->back()->with('message','Rezervacija ir veiksmīga, kopējā cena: €' .$reservation->total_price );

}


public function contacts(){
    return view('main.contacts');
}


public function myReservations(){

    $reservation = Reservation::where ('email', Auth::user()->email)->get();

    return view('main.my_reservations',compact('reservation'));
}
}
