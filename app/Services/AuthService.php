<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;

class AuthService
{
    protected $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    //metodo para iniciar sesion mediante el repository 
    public function login(array $data)
    {
        $user = $this->repository->attemptLogin($data);

        if (!$user) {
            return [
                'success' => false,
                'message' => 'Credenciales incorrectas'
            ];
        }

        $token = $this->repository->createToken($user);

        return [
            'success' => true,
            'message' => 'Login correcto',
            'user' => $user,
            'token' => $token
        ];
    }

    //metodo para cerrar sesion mediante el repository
    public function logout(User $user)
    {
        $this->repository->logout($user);
        return ['message' => 'Logout exitoso'];
    }

   
}