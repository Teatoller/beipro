<?php

namespace App\Http\Controllers;

use App\Admin;
use App\CompanyAdmin;
use App\SuperAdmin;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user...
        $user = Auth::user();

        $companyAdmin = CompanyAdmin::where('email', $user->email)->exists();
        $admin = Admin::where('email', $user->email)->exists();
        $superAdmin = SuperAdmin::where('email', $user->email)->exists();

        if ($companyAdmin) {
            return response("staff", 200);
        } elseif ($admin) {
            return response("admin", 200);
        } elseif ($superAdmin) {
            return response("superadmin", 200);
        } else {
            return "";
        }
    }
}
