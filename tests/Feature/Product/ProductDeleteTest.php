<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_deleted(): void
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson(
            "/api/products/{$product->id}"
        );

        $response
            ->assertStatus(200);

        $this->assertDatabaseMissing('products', [
            'id' => $product->id
        ]);
    }
}