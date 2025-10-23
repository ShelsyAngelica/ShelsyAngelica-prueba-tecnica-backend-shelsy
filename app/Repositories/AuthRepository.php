<?php

namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthRepository
{
    public function attemptLogin(array $credentials)
    {
        if (!FacadesAuth::attempt($credentials)) {
            return null;
        }

        return FacadesAuth::user();
    }

    public function createToken(User $user)
    {
        return $user->createToken('api_token')->plainTextToken;
    }

    public function logout($user)
    {
        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
        }
    }

}