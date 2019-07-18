<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NairobiPrice;

class NairobiPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nairobiprices = NairobiPrice::all();

        return view('nairobiprices.index', compact('nairobiprices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nairobiprices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
            'marketer_name' => 'required',
            'diesel_price' => 'nullable|between:0, 9999.99',
            'petrol_price' => 'nullable|between:0, 9999.99',
            'kerosene_price' => 'nullable|between:0, 9999.99',
            'ido_price' => 'nullable|between:0, 9999.99',
            'fo_price' => 'nullable|between:0, 9999.99',
            'lpg_price' => 'nullable|between:0, 9999.99'
        ]);
        $nairobiprice = new NairobiPrice([
            'marketer_name' => $request->get('marketer_name'),
            'diesel_price' => $request->get('diesel_price'),
            'petrol_price' => $request->get('petrol_price'),
            'kerosene_price' => $request->get('kerosene_price'),
            'ido_price' => $request->get('ido_price'),
            'fo_price' => $request->get('fo_price'),
            'lpg_price' => $request->get('lpg_price')
        ]);
        $nairobiprice->save();

        return redirect('/nairobiprices')->with('success', 'Price has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $nairobiprices = NairobiPrice::all();

        return view('nairobiprices.index', compact('nairobiprices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
