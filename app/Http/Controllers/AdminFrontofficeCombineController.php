<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminFrontofficeCombineController extends Controller
{
    /**
     * Display a listing of the front office admin and emails.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontadmins = DB::table('companies')
            ->join('admins', 'admins.company_id', '=', 'companies.id')
            ->join('company_admins', 'company_admins.admin_id', '=', 'admins.id')
            ->select('companies.name', 'companies.country', 'company_admins.front_office_id', 'company_admins.email', 'company_admins.role')
            ->get();

        return response($frontadmins, 200);
    }

}
