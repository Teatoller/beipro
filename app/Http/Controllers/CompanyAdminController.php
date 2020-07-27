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
    public function store(CompanyAdmin $companyAdmin)
    {
        $this->authorize('create', CompanyAdmin::class);
        $data = $this->validateRequest();

        CompanyAdmin::create($data);

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
    public function update(CompanyAdmin $companyAdmin, $id)
    {
        $this->authorize('update', $companyAdmin);
        $data = $this->validateRequest();

        if (CompanyAdmin::where('id', $id)->exists()) {
            $admin_id = $companyAdmin->admin_id;
            $front_office_id = $companyAdmin->front_office_id;
            $firstname = $companyAdmin->firstname;
            $lastname = $companyAdmin->lastname;
            $staff_id = $companyAdmin->staff_id;
            $email = $companyAdmin->email;
            $role = $companyAdmin->role;
            $location = $companyAdmin->location;

            $companyadmin = CompanyAdmin::find($id);
            $companyadmin->admin_id = is_null($admin_id) ? $companyadmin->admin_id : $admin_id;
            $companyadmin->front_office_id = is_null($front_office_id) ? $companyadmin->front_office_id : $front_office_id;
            $companyadmin->firstname = is_null($firstname) ? $companyadmin->firstname : $firstname;
            $companyadmin->lastname = is_null($lastname) ? $companyadmin->lastname : $lastname;
            $companyadmin->staff_id = is_null($staff_id) ? $companyadmin->staff_id : $staff_id;
            $companyadmin->email = is_null($email) ? $companyadmin->email : $email;
            $companyadmin->role = is_null($role) ? $companyadmin->role : $role;
            $companyadmin->location = is_null($location) ? $companyadmin->location : $location;

            $companyadmin->update($data);

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
    public function destroy(CompanyAdmin $companyAdmin, $id)
    {
        $this->authorize('delete', $companyAdmin);

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

    public function validateRequest()
    {
        return request()->validate([
            'admin_id' => 'required|numeric',
            'front_office_id' => 'required|numeric',
            'firstname' => 'required|alpha|string',
            'lastname' => 'required|alpha|string',
            'staff_id' => 'required|string',
            'email' => 'required|string|email',
            'role' => 'required|string|max:5',
            'location' => 'required|string',
        ]);
    }
}
