<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DepotPriceController extends Controller
{
    /**
     * Display a combined listing of the company name the front offices
     * and product prices posted over time in descending order.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depotprices = DB::table('companies')
            ->join('front_offices', 'front_offices.company_id', '=', 'company_id')
            ->join('current_prices', 'current_prices.front_office_id', '=', 'front_office_id')
            ->select('companies.name', 'front_offices.location', 'current_prices.id', 'current_prices.diesel', 'current_prices.petrol', 'current_prices.kerosene', 'current_prices.ido', 'current_prices.fo', 'current_prices.lpg')
            ->get();
        return response($depotprices, 200);
    }

}
