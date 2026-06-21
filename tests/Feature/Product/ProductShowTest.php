<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_viewed(): void
    {
        $product = Product::factory()->create();

        $response = $this->getJson(
            "/api/products/{$product->id}"
        );

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => $product->name
            ]);
    }
}