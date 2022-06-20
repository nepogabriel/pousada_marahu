<?php

namespace App\Http\Controllers\Api;

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
        try {
            // Instanciando model
            $accommodation = new Accommodation();

            $accommodation->name = $request->name;
            $accommodation->value = $request->value;
            $accommodation->double_bed = $request->double_bed;
            $accommodation->single_bed = $request->single_bed;
            $accommodation->air_conditioning = $request->air_conditioning;
            $accommodation->tv = $request->tv;

            $accommodation->save();

            return response()->json(['message' => 'Acomodação cadastrada!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar a acomodação!'], 500);
        }
    }

    public function info($id) {
        $accommodation = Accommodation::findOrFail($id);

        return response()->json($accommodation);
    }

    public function update(Request $request) {
        // Alterando somente os dados que vieram na requisição
        Accommodation::findOrFail($request->id)->update($request->all());

        return response()->json(['message' => 'Acomodação editada!'], 200);
    }

    public function destroy($id) {

        Accommodation::findOrFail($id)->delete();

        return response()->json(['message' => 'Acomodação deletada!'], 200);
    }
}
