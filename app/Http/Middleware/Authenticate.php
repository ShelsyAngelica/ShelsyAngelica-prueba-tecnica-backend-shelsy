<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        return response()->json(['message' => 'Debes iniciar sesión para acceder'], 401);
    }
}
