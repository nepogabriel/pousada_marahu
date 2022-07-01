<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function calculateReservation(Request $request)
    {
        // Data atual
        $currentDate = date('Y-m-d');
        $entry_date = $request->start_date;

        // Data de saída
        $exit_date = $request->end_date;

        if(($entry_date >= $currentDate) && ($exit_date > $currentDate) && ($entry_date < $exit_date)) {

            // Calculo para 2 diárias - Adulto
            if ($request->adults == 2) {
                $result = $this->calcuteTwoPeopleMarahu($request->hotelRate, $request->value);
            }

            // todo Lógica do restante das diárias

            return $result;
        }

        return response()->json(['message' => 'Desculpe! Escolha uma data válida!'], 500);
    }

    private function calcuteTwoPeopleMarahu($hotelRate, $value) {
        $valueTotal = $hotelRate * $value;

        return response()->json(['Valor total' => $valueTotal], 200);
    }
}
