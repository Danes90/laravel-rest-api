<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_updated(): void
    {
        $product = Product::factory()->create([
            'name' => 'Old name'
        ]);

        $response = $this->putJson(
            "/api/products/{$product->id}",
            [
                'name' => 'New name',
                'description' => 'Updated description',
                'price' => 500,
                'stock' => 20
            ]
        );

        $response
            ->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'New name'
        ]);
    }
}