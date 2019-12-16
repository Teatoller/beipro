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
        $request->validate([
            'diesel' => 'nullable|between:0, 9999.99',
            'petrol' => 'nullable|between:0, 9999.99',
            'kerosene' => 'nullable|between:0, 9999.99',
            'ido' => 'nullable|between:0, 9999.99',
            'fo' => 'nullable|between:0, 9999.99',
            'lpg' => 'nullable|between:0, 9999.99',
        ]);

        $currentprice = new CurrentPrice([
            'diesel' => $request->get('diesel'),
            'petrol' => $request->get('petrol'),
            'kerosene' => $request->get('kerosene'),
            'ido' => $request->get('ido'),
            'fo' => $request->get('fo'),
            'lpg' => $request->get('lpg'),
        ]);

        $currentprice->save();

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
    public function update(Request $request, $id)
    {
        $request->validate([
            'diesel' => 'nullable|between:0, 9999.99',
            'petrol' => 'nullable|between:0, 9999.99',
            'kerosene' => 'nullable|between:0, 9999.99',
            'ido' => 'nullable|between:0, 9999.99',
            'fo' => 'nullable|between:0, 9999.99',
            'lpg' => 'nullable|between:0, 9999.99',
        ]);

        if (CurrentPrice::where('id', $id)->exists()) {
            $nairobiprice = CurrentPrice::find($id);
            $nairobiprice->diesel = $request->get('diesel');
            $nairobiprice->petrol = $request->get('petrol');
            $nairobiprice->kerosene = $request->get('kerosene');
            $nairobiprice->ido = $request->get('ido');
            $nairobiprice->fo = $request->get('fo');
            $nairobiprice->lpg = $request->get('lpg');

            $nairobiprice->save();
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
    public function destroy($id)
    {
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
}
