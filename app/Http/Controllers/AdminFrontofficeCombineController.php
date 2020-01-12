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
            ->join('company_admins', 'company_admins.company_id', '=', 'companies.id')
            ->select('companies.name', 'companies.country', 'company_admins.admin_id', 'company_admins.front_office_id', 'company_admins.email')
            ->get();

        return response($frontadmins, 200);
    }

}
