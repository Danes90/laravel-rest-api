<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user
        ];
    }

    public function login(array $data): array
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            throw new \Exception('Invalid credentials');
        }

        if (!Hash::check($data['password'], $user->password)) {
            throw new \Exception('Invalid credentials');
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user
        ];
    }
}