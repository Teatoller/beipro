<?php

namespace App\Http\Controllers;

use App\CurrentPrice;
use Illuminate\Http\Request;

class CurrentPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentprices = CurrentPrice::all();
        return response($currentprices, 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', CurrentPrice::class);
        $data = $this->validateRequest();

        CurrentPrice::create($data);

        return response()->json([
            "Success" => "Price has been added",
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (CurrentPrice::where('id', $id)->exists()) {
            $currentprice = CurrentPrice::where('id', $id)->get();
            return response($currentprice, 200);
        } else {
            return response()->json([
                "message" => "currentprice not found",
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrentPrice $currentPrice, $id)
    {
        $this->authorize('update', $currentPrice);
        $data = $this->validateRequest();

        if (CurrentPrice::where('id', $id)->exists()) {
            $currentprice = CurrentPrice::find($id);
            
            $currentprice->update($data);

            return response()->json([
                "message" => "records updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "current price not found",
            ], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentPrice $currentPrice, $id)
    {
        $this->authorize('delete', $currentPrice);
        if (CurrentPrice::where('id', $id)->exists()) {
            $currentprice = CurrentPrice::find($id);
            $currentprice->delete();
            return response()->json([
                "currentprice" => "records deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "currentprice not found",
            ], 404);
        }
    }

    public function validateRequest()
    {
        return request()->validate([
            'front_office_id' => 'required|numeric',
            'diesel' => 'nullable|numeric|between:0, 9999.99',
            'petrol' => 'nullable|numeric|between:0, 9999.99',
            'kerosene' => 'nullable|numeric|between:0, 9999.99',
            'ido' => 'nullable|numeric|between:0, 9999.99',
            'fo' => 'nullable|numeric|between:0, 9999.99',
            'lpg' => 'nullable|numeric|between:0, 9999.99',
        ]);

    }
}
