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

    public function testEdit()
    {

        $ingredient = Ingredient::factory()->create();

        $response = $this->get("/ingredient/{$ingredient->id}/edit");

        $response->assertViewIs('ingredient.create_update')
                 ->assertViewHas('ingredient', $ingredient);
    }
}

