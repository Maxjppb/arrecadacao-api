<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(private User $modelUser) { }

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $users = $this->modelUser->orderBy('id')->paginate(10);

        if (!$users)
        {
            return response()->json([
                'message' => 'Usuários Não Encontrados'
            ],Response::HTTP_NOT_FOUND);
        }

        return response()->json([ 
            'users' => $users
        ], Response::HTTP_OK);       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
       // Inicia a transação
        DB::beginTransaction();
        
        try {
            $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => $request->password,
                        'role' => $request->role,
                        'status' => $request->status
                    ]);

            // Comita os Dados no Banco
            DB::commit();

            return response()->json([ 
                'message' => 'Usuário Cadastrado com sucesso',
                'users' => $user
            ], Response::HTTP_CREATED);      

        } catch (Exception $e) {
            // Operação não foi concluída com êxito
            DB::rollBack();

            // Retorna mensagem de erro
            return response()->json([
                'message' => 'Usuário Não Cadastrado',
                'error' => $e
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : JsonResponse
    {
        $user = $this->modelUser->find($id); 

        if (!$user)
        {
            return response()->json([
                'message' => 'Usuário de id ' . $id . ' Não Encontrado'
            ],Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'user' => $user
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
