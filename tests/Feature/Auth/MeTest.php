<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MeTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_get_profile()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/me');

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                'email' => $user->email
            ]);
    }
}