<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function store(Request $request)
    {
        try {
            $app = new App();

            $app->nome = $request->nome;
            $app->descricao = $request->descricao;
            $app->valor = $request->valor;
            $app->acoes = $request->acoes;
            $app->referencias = $request->referencias;

            $app->save();

            return response()->json(['message' => 'Projeto cadastrado!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar projeto!'], 500);
        }
    }
}
