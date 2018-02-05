<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // a reservation must belong to a client - how do we find it?
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo('App\Room','room_id', 'id'); 
        //compares room_id column of the reservation to the id of the room to find the relationship
    }
}
