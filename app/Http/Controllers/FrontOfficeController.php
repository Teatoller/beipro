<?php

namespace App\Http\Controllers;

use App\Admin;
use App\FrontOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $user = Auth::user();
        $admins = Admin::where('email', $user->email)->get();
        $companyId = $admins[0]['company_id'];
        $frontOffices = FrontOffice::where('company_id', $companyId)->get();
        return response($frontOffices, 200);
    }

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
        $this->authorize('create', FrontOffice::class);
        $data = $this->validateRequest();

        FrontOffice::create($data);

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
    public function update(FrontOffice $frontOffice, $id)
    {
        $this->authorize('update', $frontOffice);
        $data = $this->validateRequest();

        if (FrontOffice::where('id', $id)->exists()) {
            $name = $frontOffice->name;
            $code = $frontOffice->code;
            $location = $frontOffice->location;

            $frontoffice = FrontOffice::find($id);
            $frontoffice->name = is_null($name) ? $frontoffice->name : $name;
            $frontoffice->code = is_null($code) ? $frontoffice->code : $code;
            $frontoffice->location = is_null($location) ? $frontoffice->location : $location;

            $frontoffice->update($data);

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
    public function destroy(FrontOffice $frontOffice, $id)
    {
        $this->authorize('delete', $frontOffice);
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

    public function validateRequest()
    {
        return request()->validate([
            'company_id' => 'required',
            'name' => 'required|string',
            'code' => 'required|string',
            'location' => 'required|string',
        ]);
    }
}
