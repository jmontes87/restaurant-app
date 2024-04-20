<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Food;
use App\Http\Controllers\FoodController;
use Illuminate\Http\Request;
use Tests\TestCase;

class FoodControllerTest extends TestCase
{
    use RefreshDatabase;


    public function testIndex()
    {
        $foods = Food::factory()->count(3)->create();

        $response = $this->get('/food');

        $response->assertViewIs('food.index')
                 ->assertViewHas('foods', $foods);
    }

    public function testCreate()
    {
        $response = $this->get('/food/create');

        $response->assertViewIs('food.create_update');
    }

    public function testStore()
    {
        $food = Food::factory()->make();
        $response = $this->post('/food', $food->toArray());
        $this->assertDatabaseHas('food', ['name' => $food->name]);
        $response->assertRedirect('/food');
    }

    public function testEdit()
    {
        $food = Food::factory()->create();
        $response = $this->get("/food/{$food->id}/edit");
        $response->assertViewIs('food.create_update')
                 ->assertViewHas('food', $food);
    }

    public function testUpdate()
    {
        $food = Food::factory()->create();
    
        $updatedData = [
            'name' => 'Salsa mixta',
            'description' => 'Sin conservantes ni colorantes',
            'price_cost' => 3350.50
        ];
    
        $response = $this->put("/food/{$food->id}", $updatedData);
    
        $this->assertDatabaseHas('food', $updatedData);
    
        $response->assertRedirect('/food');
    }
}
