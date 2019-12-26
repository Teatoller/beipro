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

        /**
         *  Nairobi location
         */
        $totalnrb = $depotprices
            ->where('name', 'Total Kenya')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $vivonrb = $depotprices
            ->where('name', 'Vivo Energ')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kknrb = $depotprices
            ->where('name', 'Kenol Kobil')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olanrb = $depotprices
            ->where('name', 'Oil Libya')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hashinrb = $depotprices
            ->where('name', 'Hashi Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        /**
         *  Mombasa location
         */

        $totalmsa = $depotprices
            ->where('name', 'Total Kenya')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $vivomsa = $depotprices
            ->where('name', 'Vivo Energ')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kkmsa = $depotprices
            ->where('name', 'Kenol Kobil')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olamsa = $depotprices
            ->where('name', 'Oil Libya')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hashimsa = $depotprices
            ->where('name', 'Hashi Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        /**
         * Nakuru location
         */

        $totalnkr = $depotprices
            ->where('name', 'Total Kenya')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $vivonkr = $depotprices
            ->where('name', 'Vivo Energ')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kknkr = $depotprices
            ->where('name', 'Kenol Kobil')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olankr = $depotprices
            ->where('name', 'Oil Libya')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hashinkr = $depotprices
            ->where('name', 'Hashi Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        /**
         * Kisumu location
         */

        $totalksm = $depotprices
            ->where('name', 'Total Kenya')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $vivoksm = $depotprices
            ->where('name', 'Vivo Energ')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kkksm = $depotprices
            ->where('name', 'Kenol Kobil')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olaksm = $depotprices
            ->where('name', 'Oil Libya')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hashiksm = $depotprices
            ->where('name', 'Hashi Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        /**
         * Eldoret location
         */

        $totaleld = $depotprices
            ->where('name', 'Total Kenya')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $vivoeld = $depotprices
            ->where('name', 'Vivo Energ')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kkeld = $depotprices
            ->where('name', 'Kenol Kobil')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olaeld = $depotprices
            ->where('name', 'Oil Libya')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hashield = $depotprices
            ->where('name', 'Hashi Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        /**
         * A collection of all front offices current prices
         */

        $collection = collect([
            $totalnrb, $totalmsa, $totalnkr, $totaleld, $totalksm,
            $vivonrb, $vivomsa, $vivonkr, $vivoeld, $vivoksm,
            $olanrb, $olamsa, $olankr, $olaeld, $olaksm,
            $kknrb, $kkmsa, $kknkr, $kkeld, $kkksm,
            $hashinrb, $hashimsa, $hashinkr, $hashield, $hashiksm,
        ]);

        return response($collection, 200);
    }

}
