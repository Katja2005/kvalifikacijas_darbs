<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'room_id',
        'name',
        'surname',
        'email',
        'phone',
        'status',
        'start_date',
        'end_date',
        'total_price',
    ]; 
}
