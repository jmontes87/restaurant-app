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

    public function testEdit()
    {
        $food = Food::factory()->create();
        $response = $this->get("/food/{$food->id}/edit");
        $response->assertViewIs('food.create_update')
                 ->assertViewHas('food', $food);
    }
}
