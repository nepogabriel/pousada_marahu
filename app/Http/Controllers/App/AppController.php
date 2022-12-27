<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index()
    {
        try {
            $app = App::all();

            return response()->json($app, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao listar os projetos!'], 500);
        }
    }

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

    public function info($id) {
        try {
            $app = App::findOrFail($id);

            return response()->json($app);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao carregar as informações do projeto!'], 500);
        }

    }
}
