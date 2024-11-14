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
        'start_date',
        'end_date',
    ]; 
}
