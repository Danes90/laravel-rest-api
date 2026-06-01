<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    public function register(RegisterRequest $request)
    {
        $result = $this->authService->register(
            $request->validated()
        );

        return response()->json($result, 201);
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authService->login(
            $request->validated()
        );

        return response()->json($result);
    }

    public function me(Request $request)
    {
        return response()->json(
            $request->user()
        );
    }
}