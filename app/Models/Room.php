<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'type',
        'breakfast',
    ]; 
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
