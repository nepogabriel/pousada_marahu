<?php

namespace App\Services\Reservation;

class MarahuService
{
    // Calculo para 2 diárias - Adulto
    public function calcuteTwoPeopleMarahu($hotelRate, $value)
    {
        $valueTotal = $hotelRate * $value;

        return response()->json(['Valor total' => $valueTotal], 200);
    }

    // Calculo da suíte
    public function calculateSuiteMarahu($adults) {
        return response()->json(['mensagem' => 'deu certo SUite!']);
    }

    // Calculo do chalé
    public function calculateLodgeMarahu($adults)
    {
        if ($adults >= 6 && $adults <= 10) {
            return response()->json(['mensagem' => 'deu certo!']);
        }

        return response()->json(['error' => 'Escolha entre 6 a 10 pessoas!'], 500);

    }
}
