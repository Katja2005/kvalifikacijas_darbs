<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Reservation;

class AdminController extends Controller
{

public function index(){

    if(Auth::id())
{
 $role= Auth()->user()->role;


 if($role=='user'){

   $room=Room::all();
    return view('main.index', compact('room'));
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
   $room=Room::all();


   return view ('main.index',compact('room'));
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
      'breakfast' => 'required|string|in:included,non-included',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
      $imagePath = $image->store('images', 'public');  // Saglabā attēlu 'storage/app/public/room'

      // Saglabājiet attēla ceļu datubāzē
      $room->image = $imagePath;
  }

  // Saglabā istabu datubāzē
  $room->save();

return view('admin.index');
}


public function showRoom(){

   $room=Room::all();
   return view('admin.room_show',compact('room'));
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
      'breakfast'=>'required|string|in:included,non-included',
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
      $imagePath = $image->store('images', 'public');  // Saglabā attēlu 'storage/app/public/room'

      // Saglabājiet attēla ceļu datubāzē
      $room->image = $imagePath;
  }

  // Saglabā istabu datubāzē
  $room->save();
  return redirect()->route('showRoom');
}



public function rooms(){

   $room=Room::all();



   return view ('main.rooms_index',compact('room'));
}



public function reservations(){

   $reservation=Reservation::all();
   return view('admin.reservations',compact('reservation'));
}

public function updateStatus(Request $request, $id){
$reservation=Reservation::findOrFail($id);

$reservation->status=$request->status;
$reservation->save();
return redirect()->route('reservations')->with('message', 'Rezervacijas statuss ir izmainīts');
}


}