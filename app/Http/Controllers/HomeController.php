<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class HomeController extends Controller
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

     public function rooms(Request $request){

        //$rooms=Room::all();
     $query = Room::query();
     if ($request->has('breakfast') && $request->breakfast != '') {
      $query->where('breakfast', $request->breakfast);
  }
  if ($request->filled('sort_price')) {
   $query->orderBy('price', $request->sort_price); 
}




  $rooms = $query->get();
     
        return view ('main.room.index',compact('rooms'));
     }

public function contacts(){
    return view('main.contacts');
}


}
