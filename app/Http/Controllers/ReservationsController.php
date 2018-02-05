<?php

namespace App\Http\Controllers;
use App\Client as Client;
use App\Room as Room;
use App\Reservation as Reservation;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    //
    public function bookRoom($client_id, $room_id, $date_in, $date_out)
    {
        //create the instances
        $reservation = new Reservation();
        $client_instance = new Client();
        $room_instance = new Room();

        $client = $client_instance->find($client_id);
        $room = $room_instance->find($room_id);
        $reservation->date_in = $date_in;
        $reservation->date_out = $date_out;

        //tell the reseration to associate the room and the client 
        $reservation->room()->associate($room);
        $reservation->client()->associate($client);

        //save the reservation
        if ($room_instance->isRoomBooked($room_id, $date_in, $date_out))
        {
            abort(405, 'Trying to book an already booked room.');
        }
        $reservation->save();

        return redirect()->route('clients');
        //return view('reservations/bookRoom');
    }
}
