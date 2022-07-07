<?php

namespace App\Services\Reservation;

class MarahuService
{
    //public string $hotelRate; // Verificar se da certo assim
    private $hotelRate;
    private $adults;
    private $children;
    private $pets;

    // todo Verificar se é melhor usar o construtor ou parametros nos métodos
    public function __construct($hotelRate, $adults, $children, $pets) {
        $this->hotelRate = $hotelRate;
        $this->adults = $adults;
        $this->children = $children;
        $this->pets = $pets;
    }

    // Calculo para 2 diárias - Adulto
    public function calcuteTwoPeopleMarahu()
    {
        try {
            $total = $this->hotelRate * 300;

            return response()->json(['Total' => $total], 200);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Não foi possível calcular a reserva!'], 500);
        }
    }

    // Calculo da suíte
    public function calculateSuiteMarahu()
    {
        // VERIFICAR ESSA LÓGICA
        try {
            $subtotal = 2 * 300;
            $subtotal += $adults > 2 ? ($adults - 2) * 100 : 0;

            if ($children != 0) {
                foreach ($children as $child) {
                    $childAge = $child['childAge'];

                    if($childAge <= 6) {
                        continue;
                    }

                    if($childAge > 6 && $childAge <= 12) {
                        $subtotal += 50;
                    }

                    if($childAge > 12) {
                        $subtotal += 100;
                    }
                }
            }

            if ($pets != 0) {
                foreach ($pets as $pet) {
                    $subtotal += 50;
                }
            }

            $total = $subtotal * $hotelRate;

            return response()->json(['Total' => $total], 200);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Não foi possível calcular a reserva da suíte!'], 500);
        }
    }

    // Calculo do chalé
    public function calculateLodgeMarahu()
    {
        // VERIFICAR ESSA LÓGICA
        try {
            $subtotal = $adults * 100;

            if ($children != 0) {
                foreach ($children as $child) {
                    $childAge = $child['childAge'];

                    if ($childAge <= 6) {
                        continue;
                    }

                    if ($childAge > 6 && $childAge <= 12) {
                        $subtotal += 50;
                    }

                    if ($childAge > 12) {
                        $subtotal += 100;
                    }
                }
            }

            if ($pets != 0) {
                foreach ($pets as $pet) {
                    $subtotal += 50;
                }
            }

            $total = $subtotal * $hotelRate;

            return response()->json(['Total' => $total], 200);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Não foi possível calcular a reserva da chalé!'], 500);
        }
    }
}
