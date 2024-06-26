<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\PriceList;
use App\Http\Controllers\PriceListController;
use Illuminate\Http\Request;
use Tests\TestCase;

class PriceListControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $price_lists = PriceList::factory()->count(3)->create();

        $response = $this->get('/price_list');

        $response->assertViewIs('price_list.index')
                 ->assertViewHas('price_lists', $price_lists);
    }

    public function testCreate()
    {
        $response = $this->get('/price_list/create');

        $response->assertViewIs('price_list.create_update');
    }

    public function testEdit()
    {
        $price_list = PriceList::factory()->create();
        $response = $this->get("/price_list/{$price_list->id}/edit");
        $response->assertViewIs('price_list.create_update')
                 ->assertViewHas('price_list', $price_list);
    }

}
