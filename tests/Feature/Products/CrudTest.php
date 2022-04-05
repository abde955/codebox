<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_list_product_appear_in_home()

    {
        $this->withExceptionHandling();

        Product::all();

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('home');
        
    
    }

    public function test_a_product_can_be_deleted()

    {
        $this->withExceptionHandling();

        $product = Product::factory()->create();
        $this->assertCount(1, Product::all());
        
        $this->delete(route('delete', $product->id));
        $this->assertCount(0, Product::all());
    }
}
