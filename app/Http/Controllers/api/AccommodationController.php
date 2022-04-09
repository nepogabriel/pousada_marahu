<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index() {
        $accommodations = Accommodation::all();

        return response()->json($accommodations, 200);
    }

    // Criando acomodação
    public function store(Request $request) {
        // Instanciando model
        $accommodation = new Accommodation();

        $accommodation->name = $request->name;
        $accommodation->value = $request->value;
        $accommodation->double_bed = $request->double_bed;
        $accommodation->single_bed = $request->single_bed;
        $accommodation->air_conditioning = $request->air_conditioning;
        $accommodation->tv = $request->tv;

        $accommodation->save();

        return response()->json('Acomodação cadastrada com sucesso!', 200);
    }
}
