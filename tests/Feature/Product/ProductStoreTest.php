<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created(): void
    {
        $response = $this->postJson('/api/products', [
            'name' => 'iPhone 16',
            'description' => 'Apple phone',
            'price' => 999.99,
            'stock' => 10
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Product created'
            ]);

        $this->assertDatabaseHas('products', [
            'name' => 'iPhone 16'
        ]);
    }
}