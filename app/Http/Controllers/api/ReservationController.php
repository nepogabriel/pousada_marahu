<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\Reservation\MarahuService;
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

            // todo Verificar se é melhor usar o construtor ou parametros nos métodos
            $reservation = new MarahuService($request->hotelRate, $request->value, $request->adults);

            switch ($reservation) {
                // Calculo para 2 diárias - Adulto
                case $request->adults == 2 && $request->type == 'suite':
                    return $reservation->calcuteTwoPeopleMarahu();
                    break;

                case $request->adults > 2 && $request->type == 'suite':
                    return $reservation->calculateSuiteMarahu();

                // Calculo do chalé
                case $request->type == 'chale':
                    return $reservation->calculateLodgeMarahu();
                    break;
                default:
                    return response()->json(['error' => 'Não foi possível calcular a reserva!'], 500);
            }

            // todo Lógica do restante das diárias
        }

        return response()->json(['message' => 'Desculpe! Escolha uma data válida!'], 500);
    }
}
