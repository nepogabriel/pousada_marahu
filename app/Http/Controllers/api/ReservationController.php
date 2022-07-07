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
        $today = date('Y-m-d');
        $checkIn = $request->checkIn;

        // Data de saída
        $checkOut = $request->checkOut;

        if(($checkIn >= $today) && ($checkOut > $today) && ($checkIn < $checkOut)) {
            // todo Verificar se é melhor usar o construtor ou parametros nos métodos
            $reservation = new MarahuService($request->hotelRate, $request->adults, $request->children, $request->pets);

            switch ($reservation) {
                // Calculo para 2 diárias - Adulto
                case $request->adults <= 2:
                    $result = $reservation->calcuteTwoPeopleMarahu();
                    break;

                //Calculo suíte
                case $request->adults > 2 && $request->adults <= 6:
                    $result = $reservation->calculateSuiteMarahu();
                    break;

                // Calculo do chalé
                case $request->adults >= 6 && $request->adults <= 10:
                    $result = $reservation->calculateLodgeMarahu();
                    break;

                default:
                    $result = response()->json(['error' => 'Não foi possível calcular a reserva!'], 500);
            }

            return $result;

            // todo Lógica do restante das diárias
        }

        return response()->json(['message' => 'Desculpe! Escolha uma data válida!'], 500);
    }
}
