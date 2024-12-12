<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Recupera todos os usuários do banco de dados
        $users = User::all();
        return response()->json($users);
    }

    public function searchByName(Request $request) 
    { 
        $request->validate([ 
            'nome' => 'required|string' 
        ]); 
        
        // Buscar pelo nome 
        $users = User::where('nome', 'LIKE', '%' . $request->nome . '%')->get(); 
        return response()->json($users); 
    } 
    
    public function searchByPhone(Request $request) 
    { 
        $request->validate([ 
            'telefone' => 'required|string' 
        ]); 
        
        // Buscar pelo telefone 
        $users = User::where('telefone', 'LIKE', '%' . $request->telefone . '%')->get(); 
        return response()->json($users); }

    public function store(Request $request)
    {
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
        $user = User::create($request->all());

        return response()->json($user, 201);
    }
    public function update(Request $request, $id) { 
        // Validação dos dados 
        $request->validate([ 'nome' => 'sometimes|required|string|max:50', 
        'cep' => 'sometimes|required|string|max:10', 
        'endereco' => 'sometimes|required|string|max:50', 
        'bairro' => 'sometimes|required|string|max:50', 
        'cidade' => 'sometimes|required|string|max:50', 
        'uf' => 'sometimes|required|string|max:2', 
        'telefone' => 'sometimes|required|string|max:20', 
        'email' => 'sometimes|required|string|email|max:50', 
    ]); 
    
    // Encontra o usuário pelo ID e atualiza os dados 
    $user = User::findOrFail($id); $user->update($request->all()); 
    return response()->json($user, 200);
    }   
}