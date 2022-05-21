<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function setUpReservation(Request $request)
    {
        $reservation = [
            'id_user' => $request->id_user,
            'id_accommodation' => $request->id_accommodation,
            'entry_date' => date('Y-m-d', strtotime($request->entry_date)),
            'exit_date' => date('Y-m-d', strtotime($request->exit_date)),
            'value' => $request->value,

        ];

        $teste = $reservation['entry_date']->diffInHours($reservation['exit_date']);

        return response()->json($teste);
    }
}
