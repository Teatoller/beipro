<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CombineCompanyAdminController extends Controller
{
    /**
     * Display a listing of the front office admin and emails.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combineadmins = DB::table('companies')
            ->join('admins', 'admins.company_id', '=', 'companies.id')
            ->select('companies.name', 'companies.country', 'admins.id', 'admins.email')
            ->get();

        return response($combineadmins, 200);
    }

}
