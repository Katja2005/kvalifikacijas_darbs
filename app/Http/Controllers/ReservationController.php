<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Carbon\Carbon;


class ReservationController extends Controller
{
    
    public function bookRoom($id){
        if(!auth()->check()){
            return redirect()->route('login')->with('error', 'Lai veiktu rezervaciju,lūdzu,reģistrejies vai autorizejies');
        }
    $room=Room::find($id);

    $reservations = Reservation::where('room_id', $room->id)
    ->where('status', '!=', 'Atcelta')
    ->get();

    
    return view('main.reservation.create',compact('room', 'reservations'));
        }


        public function makeReservation(Request $request , $id){
$data = $request->validate([
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
]);

         $room = Room::findOrFail($id);
            
         $start = Carbon::createFromFormat('d.m.Y', $request->start_date);
         $end = Carbon::createFromFormat('d.m.Y', $request->end_date);
     
            
            
    $reserved = Reservation::where('room_id', $id)
    ->where(function ($query) use ($start, $end) {
        $query->where('start_date', '<', $end)
              ->where('end_date', '>', $start);
    })
    ->exists();
            
            
            if($reserved){
                return redirect()->back()->with('message','Šis numurs nav pieejams,mēģiniet citās datumos  ');
            }
            
            
            
            //aprēķina kopēju cenu pēc nakšu skaita . Cena par vienu nakti * naktis
            $nights=$start->diffInDays($end);

            $data['room_id'] = $id;
            $data['total_price'] = $nights * $room->price;
            $data['user_id'] = auth()->id();
            
            $data['start_date'] = $start->toDateString(); // Y-m-d
            $data['end_date'] = $end->toDateString();

        Reservation::create($data);
    
            return redirect()->back()->with('message','Rezervacija ir veiksmīga, kopējā cena: €' .$data['total_price'] );
            
            }


            public function myReservations(){

                $reservations = Auth::user()->reservations;
            
                return view('user.reservations.index',compact('reservations'));
            }
            
            
            public function details($id){
                $reservation = Reservation::findOrFail($id);
                return view('user.reservations.show',compact('reservation'));
            }
            
            public function deleteReservation($id){
                $reservation = Reservation::findOrFail($id);
                $reservation->delete();
            
                return redirect()->back()->with('message','Rezervacija ir atcelta!');
            }
            
            
}
