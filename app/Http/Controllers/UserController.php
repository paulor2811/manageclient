<?php

namespace App\Http\Controllers;

 use App\Models\ReadUser;
 use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() { 
        // Recupera todos os usuários do banco de dados 
        $users = ReadUser::all(); 
        return response()->json($users);
    }
    public function store(Request $request) { 
        // Validação dos dados 
        $request->validate([
             'nome' => 'required|string|max:50', 
             'cep' => 'required|string|max:10', 
             'endereco' => 'required|string|max:50', 
             'bairro' => 'required|string|max:50', 
             'cidade' => 'required|string|max:50', 
             'uf' => 'required|string|max:2', 
             'telefone' => 'required|string|max:20', 
             'email' => 'required|string|email|max:50', 
            ]); 
            // Criação do usuário 
            $user = ReadUser::create($request->all()); 
            return response()->json($user, 201); }
}
