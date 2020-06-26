<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return response($admins, 200);
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
            'company_id' => 'required',
            'staff_id' => 'required|string',
            'firstname' => 'required|alpha|string',
            'lastname' => 'required|alpha|string',
            'email' => 'required|string|email',
            'role' => 'required|string|max:5',
        ]);

        Admin::create($data);

        return response()->json([
            "message" => "Admin created succesfully",
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
        if (Admin::where('id', $id)->exists()) {
            $admin = Admin::where('id', $id)->get();
            return response($admin, 200);
        } else {
            return response()->json([
                "message" => "Admin not found",
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
            'company_id' => 'required',
            'staff_id' => 'required|string',
            'firstname' => 'required|alpha|string',
            'lastname' => 'required|alpha|string',
            'email' => 'required|string|email',
            'role' => 'required|string|max:5',
        ]);

        if (Admin::where('id', $id)->exists()) {
            $company_id = $request->company_id;
            $firstname = $request->firstname;
            $lastname = $request->lastname;
            $staff_id = $request->staff_id;
            $email = $request->email;
            $role = $request->role;

            $admin = Admin::find($id);
            $admin->company_id = is_null($company_id) ? $admin->company_id : $company_id;
            $admin->firstname = is_null($firstname) ? $admin->firstname : $firstname;
            $admin->lastname = is_null($lastname) ? $admin->lastname : $lastname;
            $admin->staff_id = is_null($staff_id) ? $admin->staff_id : $staff_id;
            $admin->email = is_null($email) ? $admin->email : $email;
            $admin->role = is_null($role) ? $admin->role : $role;

            $admin->save();

            return response()->json([
                "message" => "records updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "Admin not found",
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
        if (Admin::where('id', $id)->exists()) {
            $admin = Admin::find($id);
            $admin->delete();
            return response()->json([
                "message" => "Admin deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Admin not found",
            ], 404);
        }
    }
}
