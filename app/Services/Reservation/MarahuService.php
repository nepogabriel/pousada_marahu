<?php

namespace App\Services\Reservation;

class MarahuService
{
    public $hotelRate = 0;
    public $value = 0.0;
    public $adults = 0;

    // todo Verificar se é melhor usar o construtor ou parametros nos métodos
    public function __construct($hotelRate, $value, $adults) {
        $this->hotelRate = $hotelRate;
        $this->value = $value;
        $this->adults = $adults;
    }

    // Calculo para 2 diárias - Adulto
    public function calcuteTwoPeopleMarahu($hotelRate, $value)
    {
        $valueTotal = $this->hotelRate * $this->value;

        return response()->json(['Valor total' => $valueTotal], 200);
    }

    // Calculo da suíte
    public function calculateSuiteMarahu($adults) {
        return response()->json(['mensagem' => 'deu certo SUite!']);
    }

    // Calculo do chalé
    public function calculateLodgeMarahu($adults)
    {
        if ($this->$adults >= 6 && $adults <= 10) {
            return response()->json(['mensagem' => 'deu certo!']);
        }

        return response()->json(['error' => 'Escolha entre 6 a 10 pessoas!'], 500);

    }
}
