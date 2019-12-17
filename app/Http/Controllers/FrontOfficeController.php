<?php

namespace App\Http\Controllers;

use App\FrontOffice;
use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontOffices = FrontOffice::all();
        return response($frontOffices, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $code = $request->code;
        $location = $request->location;

        $frontoffice = new FrontOffice;
        $frontoffice->name = $name;
        $frontoffice->code = $code;
        $frontoffice->location = $location;

        $company_id = $request->input('company_id');
        $frontoffice->company_id = $company_id;

        $frontoffice->save();

        return response()->json([
            "message" => "Front Office record created succesfully",
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
        if (FrontOffice::where('id', $id)->exists()) {
            $frontoffice = FrontOffice::where('id', $id)->get();
            return response($frontoffice, 200);
        } else {
            return response()->json([
                "message" => "frontoffice not found",
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
        if (FrontOffice::where('id', $id)->exists()) {
            $name = $request->name;
            $code = $request->code;
            $location = $request->location;

            $frontoffice = FrontOffice::find($id);
            $frontoffice->name = is_null($name) ? $frontoffice->name : $name;
            $frontoffice->code = is_null($code) ? $frontoffice->code : $code;
            $frontoffice->location = is_null($location) ? $frontoffice->location : $location;

            $frontoffice->save();

            return response()->json([
                "message" => "records updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "frontoffice not found",
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
        if (FrontOffice::where('id', $id)->exists()) {
            $frontoffice = FrontOffice::find($id);
            $frontoffice->delete();
            return response()->json([
                "message" => "frontoffice deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "frontoffice not found",
            ], 404);
        }
    }
}
