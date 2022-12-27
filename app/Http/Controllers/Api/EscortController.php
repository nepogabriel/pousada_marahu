<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Escort;
use Illuminate\Http\Request;

class EscortController extends Controller
{

    // Listando todos
    public function index($id) {
        $escorts = Escort::all()->where('id_user', $id);

        return response()->json($escorts, 200);
    }

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

    // Listar específico
    public function info($id_user, $id_escort) {
        $escort = Escort::findOrFail($id_escort);

        return response()->json($escort);
    }

    public function update(Request $request) {
        // Alterando somente os dados que vieram na requisição
        Escort::findOrFail($request->id_escort)->update($request->all());

        return response()->json(['message' => 'Acompanhante editado!'], 200);
    }

    public function destroy($id_user, $id_escort) {
        Escort::findOrFail($id_escort)->delete();

        return response()->json(['message' => 'Acompanhanet deletado!'], 200);
    }
}
