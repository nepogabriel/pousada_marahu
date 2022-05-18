<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
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
        $user->password = $request->password;
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

//    public function update(Request $request, $id)
//    {
//        //
//    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return response()->json(['mensage' => 'Usuário deletado!']);
    }
}
