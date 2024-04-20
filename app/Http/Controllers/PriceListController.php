<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceList;
use Redirect;
use Session;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $price_lists = PriceList::all();
        return view('price_list.index', compact('price_lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('price_list.create_update');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PriceList::create($request->all());
        Session::flash('message' , 'Price list create success!');
        return Redirect::to('/price_list');
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
        $price_list = PriceList::find($id);
        return view('price_list.create_update', compact('price_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    	$price_list = PriceList::find($id);
    	$price_list->fill($request->all());
    	$price_list->save();

    	Session::flash('message' , 'Price list update success!');
    	return Redirect::to('/price_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
