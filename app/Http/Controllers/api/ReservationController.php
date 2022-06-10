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
        //$currentDate = Carbon::now();

        // Data de entrada
//        $entry_date_format = Carbon::createFromFormat('Y-m-d', $request->entry_date);
//        $entry_date = $entry_date_format->format('Y-m-d');

        $entry_date = $request->start_date;


        // Data de saída
//        $exit_date_format = Carbon::createFromFormat('Y-m-d', $request->exit_date);
//        $exit_date = $exit_date_format->format('Y-m-d');

        $exit_date = $request->end_date;

        if($entry_date >= $currentDate && $exit_date > $currentDate && $entry_date < $exit_date) {

            if ($request->adults == 2) {
                $diaria = 5;
                $value = 300;

                $valueTotal = $diaria * $value;

                return response()->json(['Valor total' => $valueTotal], 200);
            }

            // Lógica do restante das diárias
        }

        return response()->json(['message' => 'Desculpe! Escolha uma data válida!'], 500);
    }
}
