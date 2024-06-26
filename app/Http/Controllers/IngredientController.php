<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredient.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingredient.create_update');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price_cost' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect('/ingredient/create')->withErrors($validator)->withInput();
        }

        Ingredient::create($request->all());
        Session::flash('message' , 'Ingredient create success!');
        return Redirect::to('/ingredient');
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
        $ingredient = Ingredient::find($id);
        return view('ingredient.create_update', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price_cost' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect('/ingredient/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        
    	$ingredient = Ingredient::find($id);
    	$ingredient->fill($request->all());
    	$ingredient->save();

    	Session::flash('message' , 'Ingredient update success!');
    	return Redirect::to('/ingredient');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
