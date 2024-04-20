<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Ingredient;
use App\Http\Controllers\IngredientController;
use Illuminate\Http\Request;
use Tests\TestCase;

class IngredientControllerTest extends TestCase
{

    use RefreshDatabase;


    public function testIndex()
    {
        $ingredients = Ingredient::factory()->count(3)->create();

        $response = $this->get('/ingredient');

        $response->assertViewIs('ingredient.index')
                 ->assertViewHas('ingredients', $ingredients);
    }

    public function testCreate()
    {
        $response = $this->get('/ingredient/create');

        $response->assertViewIs('ingredient.create_update');
    }

    public function testStore()
    {
        $ingredient = Ingredient::factory()->make();
        $response = $this->post('/ingredient', $ingredient->toArray());
        $this->assertDatabaseHas('ingredient', ['name' => $ingredient->name]);
        $response->assertRedirect('/ingredient');
    }

    public function testEdit()
    {

        $ingredient = Ingredient::factory()->create();

        $response = $this->get("/ingredient/{$ingredient->id}/edit");

        $response->assertViewIs('ingredient.create_update')
                 ->assertViewHas('ingredient', $ingredient);
    }

    public function testUpdate()
    {
        $ingredient = Ingredient::factory()->create();
    
        $updatedData = [
            'name' => 'Salsa mixta',
            'description' => 'Sin conservantes ni colorantes',
            'price_cost' => 3350.50
        ];
    
        $response = $this->put("/ingredient/{$ingredient->id}", $updatedData);
    
        $this->assertDatabaseHas('ingredient', $updatedData);
    
        $response->assertRedirect('/ingredient');
    }
}

