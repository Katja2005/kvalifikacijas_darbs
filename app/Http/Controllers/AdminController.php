<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Review;

class AdminController extends Controller
{

public function index(){

    if(Auth::id())
{
 $role= Auth()->user()->role;


 if($role=='user'){

   $rooms=Room::all();
    return view('main.index', compact('rooms'));
 }

 else if($role=='admin'){
    return view ('admin.index');
 }
 else{
    return redirect()->back();
 }

}
}

public function main(){
   $rooms=Room::all();


   return view ('main.index',compact('rooms'));
}

public function createRoom(){
   return view ('admin.room_create');
}

public function addRoom(Request $request){
  $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'price' => 'required|numeric',
      'type' => 'required|string|in:Standart,Deluxe,Premium',
      'breakfast' => 'required|string|',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
  ]);


   $room= new Room();

   $room->title= $request->title;
   $room->description= $request->description;
   $room->price= $request->price;
   $room->type= $request->type;
   $room->breakfast= $request->breakfast;

   if ($request->hasFile('image')) {
      // Saņem augšupielādēto attēlu
      $image = $request->file('image');

      // Pārsauc attēlu un saglabā to 'public' direktorijā
      $imagePath = $image->store('storage', 'public');  // Saglabā attēlu 'storage/app/public/room'

      // Saglabājiet attēla ceļu datubāzē
      $room->image = $imagePath;
  }

  // Saglabā istabu datubāzē
  $room->save();

return view('admin.index');
}


public function showRoom(){

   $rooms=Room::all();
   return view('admin.room_show',compact('rooms'));
}

public function deleteRoom($id){

$room=Room::find($id);

$room->delete();

return redirect()->route('showRoom');

}

public function editRoom($id){


   $room = Room::find($id);
   return view('admin.room_edit',compact('room'));
}


public function updateRoom( Request $request, $id){
   $room = Room::find($id);

   $request->validate([
      'title'=>'required|string|max:255',
      'description'=>'required|string',
      'price'=>'required|numeric',
      'type'=>'required|string|in:Standart,Deluxe,Premium',
      'breakfast'=>'required|string|',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   ]);

   $room->title= $request->title;
   $room->description= $request->description;
   $room->price= $request->price;
   $room->type= $request->type;
   $room->breakfast= $request->breakfast;

   if ($request->hasFile('image')) {
      // Saņem augšupielādēto attēlu
      $image = $request->file('image');

      // Pārsauc attēlu un saglabā to 'public' direktorijā
      $imagePath = $image->store('storage', 'public');  // Saglabā attēlu 'storage/app/public/room'

      // Saglabājiet attēla ceļu datubāzē
      $room->image = $imagePath;
  }

  // Saglabā istabu datubāzē
  $room->save();
  return redirect()->route('showRoom');
}



public function rooms(){

   $rooms=Room::all();



   return view ('main.rooms_index',compact('rooms'));
}



public function reservations(){

   $reservations=Reservation::all();
   return view('admin.reservations',compact('reservations'));
}

public function updateStatus(Request $request, $id){
$reservation=Reservation::findOrFail($id);

$reservation->status=$request->status;
$reservation->save();
return redirect()->route('reservations')->with('message', 'Rezervacijas statuss ir izmainīts');
}



public function userReviews(){
   $reviews= Review::with('user')->latest()->get();
   return view('admin.reviews',compact('reviews'));
}

}