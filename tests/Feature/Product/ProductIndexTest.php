<?php
namespace Tests\Feature\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_listed(): void
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }
}