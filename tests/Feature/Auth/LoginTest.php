<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /*public function test_user_can_login()
    {
        User::create([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => Hash::make('password123')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'john@example.com',
            'password' => 'password123'
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
                'user'
            ]);
    }*/
}