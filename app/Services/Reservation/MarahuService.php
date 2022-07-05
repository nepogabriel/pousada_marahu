<?php

namespace App\Services\Reservation;

class MarahuService
{
    //public string $hotelRate; // Verificar se da certo assim
    public $hotelRate;
    public $value;
    public $adults;

    // todo Verificar se é melhor usar o construtor ou parametros nos métodos
//    public function __construct($hotelRate, $value, $adults) {
//        $this->hotelRate = $hotelRate;
//        $this->value = $value;
//        $this->adults = $adults;
//    }

    // Calculo para 2 diárias - Adulto
    public function calcuteTwoPeopleMarahu(string $hotelRate, float $value)
    {
        $total = $hotelRate * $value;

        return response()->json(['Total' => $total], 200);
    }

    // Calculo da suíte
    public function calculateSuiteMarahu(int $hotelRate, int $adults, $children, $pets)
    {
        if ($adults <= 6) {
            $subtotal = $adults * 100;
        }

        if ($children != 0) {
            foreach ($children as $child) {
                $childAge = $child['childAge'];

                if($childAge <= 6) {
                    continue;
                }

                if($childAge > 6 && $childAge <= 12) {
                    $subtotal += 50;
                }
            }
        }

        if ($pets != 0) {
            $subtotal += $pets * 50;
        }

        $total = $subtotal * $hotelRate;

        return response()->json(['Total' => $total], 200);
    }

    // Calculo do chalé
    public function calculateLodgeMarahu(int $adults)
    {
        if ($adults >= 6 && $adults <= 10) {
            return response()->json(['mensagem' => 'deu certo!']);
        }

        return response()->json(['error' => 'Escolha entre 6 a 10 pessoas!'], 500);

    }
}
