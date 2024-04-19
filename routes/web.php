<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PriceListController;

Route::get('/', function () {
    return view('index');
});

Route::resource('food', FoodController::class);
Route::resource('ingredient', IngredientController::class);
Route::resource('price_list', PriceListController::class);