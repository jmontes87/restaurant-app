<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Redirect;
use Session;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        return view('food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('food.create_update');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Food::create($request->all());
        Session::flash('message' , 'Food create success!');
        return Redirect::to('/food');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food = Food::find($id);
        return view('food.create_update', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    	$food = Food::find($id);
    	$food->fill($request->all());
    	$food->save();

    	Session::flash('message' , 'Food update success!');
    	return Redirect::to('/food');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
