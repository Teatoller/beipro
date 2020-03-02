<?php

namespace App\Http\Controllers;

use App\SuperAdmin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sAdmins = SuperAdmin::all();
        return response($sAdmins, 200);
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
            'staff_id' => 'required|string',
            'firstname' => 'required|alpha|string',
            'lastname' => 'required|alpha|string',
            'email' => 'required|string|email',
            'role' => 'required|string',
        ]);

        $staff_id = $request->staff_id;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $role = $request->role;

        $sAdmins = new SuperAdmin;
        $sAdmins->staff_id = $staff_id;
        $sAdmins->firstname = $firstname;
        $sAdmins->lastname = $lastname;
        $sAdmins->email = $email;
        $sAdmins->role = $role;

        $sAdmins->save();

        return response()->json([
            "message" => "Super Admin created succesfully",
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
        if (SuperAdmin::where('id', $id)->exists()) {
            $sAdmin = SuperAdmin::where('id', $id)->get();
            return response($sAdmin, 200);
        } else {
            return response()->json([
                "message" => "Super Admin not found",
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
            'staff_id' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email',
            'role' => 'required|string',
        ]);

        if (SuperAdmin::where('id', $id)->exists()) {
            $firstname = $request->firstname;
            $lastname = $request->lastname;
            $staff_id = $request->staff_id;
            $email = $request->email;
            $role = $request->role;

            $sAdmin = SuperAdmin::find($id);
            $sAdmin->firstname = is_null($firstname) ? $sAdmin->firstname : $firstname;
            $sAdmin->lastname = is_null($lastname) ? $sAdmin->lastname : $lastname;
            $sAdmin->staff_id = is_null($staff_id) ? $sAdmin->staff_id : $staff_id;
            $sAdmin->email = is_null($email) ? $sAdmin->email : $email;
            $sAdmin->role = is_null($role) ? $sAdmin->role : $role;

            $sAdmin->save();

            return response()->json([
                "message" => "records updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "Super Admin not found",
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
        if (SuperAdmin::where('id', $id)->exists()) {
            $sAdmin = SuperAdmin::find($id);
            $sAdmin->delete();
            return response()->json([
                "message" => "Super Admin deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Super Admin not found",
            ], 404);
        }
    }
}
