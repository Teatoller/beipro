<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return response($companies, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'logo'=> 'nullable|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'country' => 'required|string',
            'established' => 'required|string',
        ]);

        // $name = $request->name;
        // $logo = $request->logo;
        // $description = $request->description;
        // $location = $request->location;
        // $country = $request->country;
        // $established = $request->established;

        // $company = new Company();
        // $company->name = $name;
        // $company->logo = $logo;
        // $company->description = $description;
        // $company->location = $location;
        // $company->country = $country;
        // $company->established = $established;

        // $company->save();
        Company::create($data);

        return response()->json([
            "message" => "Company created succesfully",
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
        if (Company::where('id', $id)->exists()) {
            $company = Company::where('id', $id)->get();
            return response($company, 200);
        } else {
            return response()->json([
                "message" => "company not found",
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
            'name' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'country' => 'required|string',
            'established' => 'required|string',
        ]);

        if (Company::where('id', $id)->exists()) {
            $name = $request->name;
            $logo = $request->logo;
            $description = $request->description;
            $location = $request->location;
            $country = $request->country;
            $established = $request->established;

            $company = Company::find($id);
            $company->name = is_null($name) ? $company->name : $name;
            $company->logo = is_null($logo) ? $company->logo : $logo;
            $company->description = is_null($description) ? $company->description : $description;
            $company->location = is_null($location) ? $company->location : $location;
            $company->country = is_null($country) ? $company->country : $country;
            $company->established = is_null($established) ? $company->established : $established;

            $company->save();
            return response()->json([
                "message" => "record updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "company not found",
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
        if (Company::where('id', $id)->exists()) {
            $company = Company::find($id);
            $company->delete();
            return response()->json([
                "message" => "company deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "company not found",
            ], 404);
        }
    }
}
