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
    ->whereNotNull('start_date')
    ->whereNotNull('end_date')
    ->get();

    
    return view('main.reservation.create',compact('room', 'reservations'));
        }


        public function makeReservation(Request $request , $id){
$data = $request->validate([
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
]);

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

            $data['room_id'] = $id;
            $data['total_price'] = $nights * $room->price;
            $data['user_id'] = auth()->id();
            


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
