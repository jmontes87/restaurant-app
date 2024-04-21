<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Validator;
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
        $ingredients = Ingredient::all();
        return view('food.create_update', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/food/create')->withErrors($validator)->withInput();
        }

        $food = Food::create($request->except('ingredients'));

        if ($request->has('ingredients')) {
            $ingredients = $request->input('ingredients');
            $syncData = [];
            foreach ($ingredients as $ingredientId) {
                $syncData[$ingredientId] = ['created_at' => now(), 'updated_at' => now()];
            }
            $food->ingredients()->sync($syncData);
        }

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
        $ingredients = Ingredient::all();
        return view('food.create_update', compact('food', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/food/'.$id.'/edit')->withErrors($validator)->withInput();
        }

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
