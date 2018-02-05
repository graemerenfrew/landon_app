<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // client can have many reservations
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
