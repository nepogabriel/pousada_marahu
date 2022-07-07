<?php

namespace App\Services\Reservation;

class MarahuService
{
    //public string $hotelRate; // Verificar se da certo assim
    private int $hotelRate;
    private int $adults;
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
        // VERIFICAR ESSA LÓGICA
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
        /* todo Tirar essas dúvidas:
         * 2 pessoas sempre vão pagar 300 de diárias, ou só na primeira noite/dia
         * O chalé sempre vai ser a diária de 100 reais?
         * Na suíte são até 6 pessoas incluindo crianças?
         * No chalé são até 10 pessoas incluindo crianças?
         * */
        try {
            $subtotal = 2 * 300;
            $subtotal += $this->adults > 2 ? ($this->adults - 2) * 100 : 0;

            if ($this->children != 0) {
                foreach ($this->children as $child) {
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

            if ($this->pets != 0) {
                $subtotal += $this->pets * 50;
            }

            $total = $subtotal * $this->hotelRate;

            return response()->json(['Total' => $total], 200);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Não foi possível calcular a reserva da suíte!'], 500);
        }
    }

    // Calculo do chalé
    public function calculateLodgeMarahu()
    {
        // VERIFICAR ESSA LÓGICA
        // todo Se 2 casais é o valor da suíte (4 pessoas) (Solução: opção para informar o sexo/casal na pág. de acomodação ou reserva, analisar melhor)
        try {
            $subtotal = $this->adults * 100;

            if ($this->children != 0) {
                foreach ($this->children as $child) {
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

            if ($this->pets != 0) {
                $subtotal += $this->pets * 50;
            }

            $total = $subtotal * $this->hotelRate;

            return response()->json(['Total' => $total], 200);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Não foi possível calcular a reserva da chalé!'], 500);
        }
    }
}
