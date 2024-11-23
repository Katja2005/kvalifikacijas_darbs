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
            
            $start=Carbon::parse($request->start_date);
            $end=Carbon::parse($request->end_date);
            
            //ja cilvēks rezervē noteiktos datumos, tad cits cilvēks nevares tados datumos
            $reserved = Reservation::where('room_id', $id)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_date', [$start, $end])
                      ->orWhereBetween('end_date', [$start, $end]) 
                      ->orWhere(function ($query) use ($start, $end) {
                          $query->where('start_date', '<=', $start)
                                ->where('end_date', '>=', $end); 
                      });
            })->exists();
            
            
            if($reserved){
                return redirect()->back()->with('message','Šis numurs nav pieejams,mēģiniet citās datumos  ');
            }
            
            
            
            //aprēķina kopēju cenu pēc nakšu skaita . Cena par vienu nakti * naktis
            $nights=$start->diffInDays($end);
            $reservation->total_price = $nights * $room->price;
            
            
            $reservation->save();
            return redirect()->back()->with('message','Rezervacija ir veiksmīga, kopējā cena: €' .$reservation->total_price );
            
            }


            public function myReservations(){

                $reservation = Reservation::where ('email', Auth::user()->email)->get();
            
                return view('main.my_reservations',compact('reservation'));
            }
            
            
            
            
            public function deleteReservation($id){
                $reservation = Reservation::findOrFail($id);
                $reservation->delete();
            
                return redirect()->back()->with('message','Rezervacija ir atcelta!');
            }
            
            
}
