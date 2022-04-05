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
}
