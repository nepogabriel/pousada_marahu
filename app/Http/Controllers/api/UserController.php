<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

//    public function create()
//    {
//        //
//    }

    public function store(Request $request)
    {
        // User::create($request->all());

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->cpf = $request->cpf;
        $user->phone = $request->phone;

        $user->save();

//        if( $user->save() )
//            return 'Usuário cadastrado com sucesso!';
//        else
//            return 'Não foi possível cadastrar o usuário!';

        return 'Usuário cadastrado com sucesso!';
    }

//    public function show($id)
//    {
//        //
//    }

//    public function edit($id)
//    {
//        //
//    }

    public function update(Request $request)
    {
        // Alterando somente os dados que vieram na requisição
        User::findOrFail($request->id)->update($request->all());

        return response()->json(['message' => 'Usuário editado!'], 200);
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();

            return response()->json(['mensage' => 'Usuário deletado!'], 200);
        } catch (Exception $ex) {
            return response()->json(['error' => true, 'message' => $ex->getMessage()], $ex->getCode());
        }

    }
}
