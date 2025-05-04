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


public function createRoom(){
   return view ('admin.room.create');
}

public function addRoom(Request $request){
  $data = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'price' => 'required|numeric',
      'type' => 'required|string|in:Standart,Deluxe,Premium',
      'breakfast' => 'required|string|',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
  ]);


   if ($request->hasFile('image')) {
      // Saņem augšupielādēto attēlu
      $image = $request->file('image');

      // Pārsauc attēlu un saglabā to 'public' direktorijā
      $data['image'] = $image->store('storage', 'public');  // Saglabā attēlu 'storage/app/public/room'

  }
Room::create($data);

return redirect()->route('create-room')->with('message', 'Numurs ir izveidots veiksmīgi!');
}


public function showRoom(){

   $rooms=Room::all();
   return view('admin.room.show',compact('rooms'));
}

public function deleteRoom($id){

$room=Room::find($id);

$room->delete();

return redirect()->route('show-room');

}

public function editRoom($id){


   $room = Room::find($id);
   return view('admin.room.edit',compact('room'));
}








public function updateRoom( Request $request, $id){
   $room = Room::find($id);

   $data = $request->validate([
      'title'=>'required|string|max:255',
      'description'=>'required|string',
      'price'=>'required|numeric',
      'type'=>'required|string|in:Standart,Deluxe,Premium',
      'breakfast'=>'required|string|in:Iekļauts,Nav iekļauts',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   ]);

   if ($request->hasFile('image')) {
      // Saņem augšupielādēto attēlu
      $image = $request->file('image');

      // Pārsauc attēlu un saglabā to 'public' direktorijā
      $data['image'] = $image->store('storage', 'public');  // Saglabā attēlu 'storage/app/public/room'

   }
$room->update($data);
  return redirect()->route('show-room');
}







public function reservations(Request $request){

   $query = Reservation::with('user');

    if ($request->has('status') && $request->status != '') {
     
        $query->where('status', $request->status);
    }

    $reservations = $query->get();

   return view('admin.reservation.index',compact('reservations'));
}

public function updateStatus(Request $request, $id){
$reservation=Reservation::findOrFail($id);
 $data = $request->validate([
   'status' => 'required|string|in:Apstrāde,Apstiprināta,Atcelta',
 ]);

 if ($data['status'] === 'Atcelta') {
  
   $reservation->update([
       'status' => 'Atcelta',
       'start_date' => null,
       'end_date' => null,
   ]);
} else {
   
   $reservation->update($data);
}
return redirect()->route('reservations')->with('message', 'Rezervacijas statuss ir izmainīts');
}

public function deleteReservationn($id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->delete();

    return redirect()->back()->with('message', 'Rezervācija dzēsta veiksmīgi.');
}

public function userReviews(){
   $reviews= Review::with('user')->latest()->get();
   return view('admin.review.index',compact('reviews'));
}



public function deleteReview($id){
   $review = Review::find($id);
   $review->delete();
   return redirect()->route('user-reviews')->with('message', 'Komentārs ir veiksmīgi dzēsts');

}

}