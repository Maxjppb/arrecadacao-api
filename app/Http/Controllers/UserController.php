<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(protected User $modelUser) { }

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $users = $this->modelUser->orderBy('id')->paginate(10);

        return response()->json([ 
            'users' => $users
        ], Response::HTTP_OK);

        if (!$user)
        {
            return response()->json([
                'message' => 'Usuários  Não Encontrados'
            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
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
