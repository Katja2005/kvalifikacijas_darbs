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

public function contacts(){
    return view('main.contacts');
}


}
