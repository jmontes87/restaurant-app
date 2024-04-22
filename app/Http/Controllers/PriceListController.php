<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceList;
use App\Models\Food;
use Illuminate\Support\Facades\Validator;
use Dompdf\Dompdf;
use Dompdf\Options;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'percentage_margin' => 'required|numeric|min:0',
        ]);
        if ($validator->fails()) {
            return redirect('/price_list/create')->withErrors($validator)->withInput();
        }
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'percentage_margin' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect('/price_list/'.$id.'/edit')->withErrors($validator)->withInput();
        }

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

    public function exportList($id)
    {
        $price_list = PriceList::find($id);
        $food = Food::all();
        $data = array();
        foreach ($food as $food) {
            $price_sale = $food->price_cost * (1 + ($price_list->percentage_margin / 100));
            $data[] = array(
                'name' => $food->name,
                'description' => $food->description,
                'price_sale' => $price_sale
            );
        }

        $pdf = new Dompdf();
        $pdf->loadHtml(view('price_list.list', compact('data'))->render());

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);

        $pdf->render();

        return $pdf->stream($price_list->name.'.pdf');
    }
}
