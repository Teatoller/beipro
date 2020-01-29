<?php

namespace App\Http\Controllers;

use App\CompanyAdmin;
use Illuminate\Http\Request;

class CompanyAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyadmins = CompanyAdmin::all();
        return response($companyadmins, 200);
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
            'front_office_id' => 'required',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'staff_id' => 'required|string',
            'email' => 'required|string|email',
            'role' => 'required|string',
            'location_code' => 'required|string',
        ]);

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $staff_id = $request->staff_id;
        $email = $request->email;
        $role = $request->role;
        $location_code = $request->location_code;

        $companyadmin = new CompanyAdmin;
        $companyadmin->firstname = $firstname;
        $companyadmin->lastname = $lastname;
        $companyadmin->staff_id = $staff_id;
        $companyadmin->email = $email;
        $companyadmin->role = $role;

        $companyadmin->location_code = $location_code;

        $admin_id = $request->input('admin_id');
        $front_office_id = $request->input('front_office_id');
        $companyadmin->admin_id = $admin_id;
        $companyadmin->front_office_id = $front_office_id;

        $companyadmin->save();

        return response()->json([
            "message" => "Company Admin created succesfully",
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
        if (CompanyAdmin::where('id', $id)->exists()) {
            $companyadmin = CompanyAdmin::where('id', $id)->get();
            return response($companyadmin, 200);
        } else {
            return response()->json([
                "message" => "Company Admin not found",
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
            'front_office_id' => 'required',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'staff_id' => 'required|string',
            'email' => 'required|string|email',
            'role' => 'required|string',
            'location_code' => 'required|string',
        ]);

        if (CompanyAdmin::where('id', $id)->exists()) {
            $admin_id = $request->admin_id;
            $front_office_id = $request->front_office_id;
            $firstname = $request->firstname;
            $lastname = $request->lastname;
            $staff_id = $request->staff_id;
            $email = $request->email;
            $role = $request->role;
            $location_code = $request->location_code;

            $companyadmin = CompanyAdmin::find($id);
            $companyadmin->admin_id = is_null($admin_id) ? $companyadmin->admin_id : $admin_id;
            $companyadmin->front_office_id = is_null($front_office_id) ? $companyadmin->front_office_id : $front_office_id;
            $companyadmin->firstname = is_null($firstname) ? $companyadmin->firstname : $firstname;
            $companyadmin->lastname = is_null($lastname) ? $companyadmin->lastname : $lastname;
            $companyadmin->staff_id = is_null($staff_id) ? $companyadmin->staff_id : $staff_id;
            $companyadmin->email = is_null($email) ? $companyadmin->email : $email;
            $companyadmin->role = is_null($role) ? $companyadmin->role : $role;
            $companyadmin->location_code = is_null($location_code) ? $companyadmin->location_code : $location_code;

            $companyadmin->save();

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
        if (CompanyAdmin::where('id', $id)->exists()) {
            $companyadmin = CompanyAdmin::find($id);
            $companyadmin->delete();
            return response()->json([
                "message" => "Company Admin deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Company Admin not found",
            ], 404);
        }

    }
}
