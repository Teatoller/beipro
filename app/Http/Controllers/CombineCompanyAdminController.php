<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\Auth;

class CombineCompanyAdminController extends Controller
{
    /**
     * Display logged in admin credentials
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $admin = Admin::where('email', $user->email)->get();
        return response($admin[0], 200);
    }
}
