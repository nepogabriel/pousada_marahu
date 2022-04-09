<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Escort;
use Illuminate\Http\Request;

class EscortController extends Controller
{
    public function store(Request $request) {
        try {
            $escort = new Escort();

            $escort->id_user = $request->id;
            $escort->name = $request->name;
            $escort->email = $request->email;
            $escort->cpf = $request->cpf;
            $escort->phone = $request->phone;

            $escort->save();

            return response()->json(['message' => 'Acompanhante cadastrado!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar acompanhante!'], 500);
        }
    }
}
