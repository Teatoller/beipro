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
            ->join('front_offices', 'front_offices.company_id', '=', 'companies.id')
            ->join('current_prices', 'current_prices.front_office_id', '=', 'front_offices.id')
            ->select('companies.name', 'companies.country', 'front_offices.location', 'current_prices.id', 'current_prices.diesel', 'current_prices.petrol', 'current_prices.kerosene', 'current_prices.ido', 'current_prices.fo', 'current_prices.lpg')
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
            ->where('name', 'Vivo Energy')
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

        $gapconrb = $depotprices
            ->where('name', 'Gapco Kenya')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petronrb = $depotprices
            ->where('name', 'Petro Kenya')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oryxnrb = $depotprices
            ->where('name', 'Oryx Energies')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $texasnrb = $depotprices
            ->where('name', 'Texas Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $galananrb = $depotprices
            ->where('name', 'Galana Oil')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fossilnrb = $depotprices
            ->where('name', 'Fossil Fuel')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $nocknrb = $depotprices
            ->where('name', 'NOCK')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $toshanrb = $depotprices
            ->where('name', 'Tosha Petroleum')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aspamnrb = $depotprices
            ->where('name', 'ASPAM Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $gulfnrb = $depotprices
            ->where('name', 'Gulf Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $dalbitnrb = $depotprices
            ->where('name', 'Dalbit Petroleum')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kencornrb = $depotprices
            ->where('name', 'Kencor Petroleum')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $royalnrb = $depotprices
            ->where('name', 'Royal Oilfields')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $eagolnrb = $depotprices
            ->where('name', 'EAGOL Kenya')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ainunrb = $depotprices
            ->where('name', 'Ainu Shamsi')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $twobanrb = $depotprices
            ->where('name', 'Twoba')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olympicnrb = $depotprices
            ->where('name', 'Olympic Petroleum')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $lakenrb = $depotprices
            ->where('name', 'Lake Oil Gas')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $regnolnrb = $depotprices
            ->where('name', 'Regnol Oil')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $onenrb = $depotprices
            ->where('name', 'One Petroleum')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aftahnrb = $depotprices
            ->where('name', 'Aftah Petroleum')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $benrb = $depotprices
            ->where('name', 'BE Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oceannrb = $depotprices
            ->where('name', 'Ocean Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tristarnrb = $depotprices
            ->where('name', 'Tri-Star')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $banodanrb = $depotprices
            ->where('name', 'Banoda Oil')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $brainnrb = $depotprices
            ->where('name', 'Brain Field')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $futuresnrb = $depotprices
            ->where('name', 'Futures')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $primenrb = $depotprices
            ->where('name', 'Prime Regional')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $mogasnrb = $depotprices
            ->where('name', 'Mogas')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petrocamnrb = $depotprices
            ->where('name', 'Petrocam Kenya')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $globalnrb = $depotprices
            ->where('name', 'Global Oil')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $jaguarnrb = $depotprices
            ->where('name', 'Jaguar Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bachunrb = $depotprices
            ->where('name', 'Bachulal')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $iladenrb = $depotprices
            ->where('name', 'Ilade Oil')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $axonnrb = $depotprices
            ->where('name', 'Axon Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hammexnrb = $depotprices
            ->where('name', 'Hammex')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fastnrb = $depotprices
            ->where('name', 'Fastnet')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oilcomnrb = $depotprices
            ->where('name', 'Oilcom')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $citynrb = $depotprices
            ->where('name', 'City Oil')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bushranrb = $depotprices
            ->where('name', 'Bushra Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ashanrb = $depotprices
            ->where('name', 'Asharami Energy')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $amananrb = $depotprices
            ->where('name', 'Amana')
            ->where('location', 'Nairobi')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tibanrb = $depotprices
            ->where('name', 'Tiba')
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
            ->where('name', 'Vivo Energy')
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

        $gapcomsa = $depotprices
            ->where('name', 'Gapco Kenya')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petromsa = $depotprices
            ->where('name', 'Petro Kenya')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oryxmsa = $depotprices
            ->where('name', 'Oryx Energies')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $texasmsa = $depotprices
            ->where('name', 'Texas Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $galanamsa = $depotprices
            ->where('name', 'Galana Oil')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fossilmsa = $depotprices
            ->where('name', 'Fossil Fuel')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $nockmsa = $depotprices
            ->where('name', 'NOCK')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $dalbitmsa = $depotprices
            ->where('name', 'Dalbit Petroleum')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $toshamsa = $depotprices
            ->where('name', 'Tosha Petroleum')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aspammsa = $depotprices
            ->where('name', 'ASPAM Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $gulfmsa = $depotprices
            ->where('name', 'Gulf Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kencormsa = $depotprices
            ->where('name', 'Kencor Petroleum')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $royalmsa = $depotprices
            ->where('name', 'Royal Oilfields')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $eagolmsa = $depotprices
            ->where('name', 'EAGOL Kenya')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ainumsa = $depotprices
            ->where('name', 'Ainu Shamsi')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $twobamsa = $depotprices
            ->where('name', 'Twoba')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olympicmsa = $depotprices
            ->where('name', 'Olympic Petroleum')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $lakemsa = $depotprices
            ->where('name', 'Lake Oil Gas')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $regnolmsa = $depotprices
            ->where('name', 'Regnol Oil')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $onemsa = $depotprices
            ->where('name', 'One Petroleum')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aftahmsa = $depotprices
            ->where('name', 'Aftah Petroleum')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bemsa = $depotprices
            ->where('name', 'BE Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oceanmsa = $depotprices
            ->where('name', 'Ocean Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tristarmsa = $depotprices
            ->where('name', 'Tri-Star')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $banodamsa = $depotprices
            ->where('name', 'Banoda Oil')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $brainmsa = $depotprices
            ->where('name', 'Brain Field')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $futuresmsa = $depotprices
            ->where('name', 'Futures')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $primemsa = $depotprices
            ->where('name', 'Prime Regional')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $mogasmsa = $depotprices
            ->where('name', 'Mogas')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petrocammsa = $depotprices
            ->where('name', 'Petrocam Kenya')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $globalmsa = $depotprices
            ->where('name', 'Global Oil')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $jaguarmsa = $depotprices
            ->where('name', 'Jaguar Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bachumsa = $depotprices
            ->where('name', 'Bachulal')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ilademsa = $depotprices
            ->where('name', 'Ilade Oil')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $axonmsa = $depotprices
            ->where('name', 'Axon Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hammexmsa = $depotprices
            ->where('name', 'Hammex')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fastmsa = $depotprices
            ->where('name', 'Fastnet')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oilcommsa = $depotprices
            ->where('name', 'Oilcom')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $citymsa = $depotprices
            ->where('name', 'City Oil')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bushramsa = $depotprices
            ->where('name', 'Bushra Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ashamsa = $depotprices
            ->where('name', 'Asharami Energy')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $amanamsa = $depotprices
            ->where('name', 'Amana')
            ->where('location', 'Mombasa')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tibamsa = $depotprices
            ->where('name', 'Tiba')
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
            ->where('name', 'Vivo Energy')
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

        $gapconkr = $depotprices
            ->where('name', 'Gapco Kenya')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petronkr = $depotprices
            ->where('name', 'Petro Kenya')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oryxnkr = $depotprices
            ->where('name', 'Oryx Energies')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $texasnkr = $depotprices
            ->where('name', 'Texas Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $galanankr = $depotprices
            ->where('name', 'Galana Oil')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fossilnkr = $depotprices
            ->where('name', 'Fossil Fuel')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $nocknkr = $depotprices
            ->where('name', 'NOCK')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aspamnkr = $depotprices
            ->where('name', 'ASPAM Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $dalbitnkr = $depotprices
            ->where('name', 'Dalbit Petroleum')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $toshankr = $depotprices
            ->where('name', 'Tosha Petroleum')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $gulfnkr = $depotprices
            ->where('name', 'Gulf Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kencornkr = $depotprices
            ->where('name', 'Kencor Petroleum')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $royalnkr = $depotprices
            ->where('name', 'Royal Oilfields')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $eagolnkr = $depotprices
            ->where('name', 'EAGOL Kenya')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ainunkr = $depotprices
            ->where('name', 'Ainu Shamsi')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $twobankr = $depotprices
            ->where('name', 'Twoba')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olympicnkr = $depotprices
            ->where('name', 'Olympic Petroleum')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $lakenkr = $depotprices
            ->where('name', 'Lake Oil Gas')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $regnolnkr = $depotprices
            ->where('name', 'Regnol Oil')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $onenkr = $depotprices
            ->where('name', 'One Petroleum')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aftahnkr = $depotprices
            ->where('name', 'Aftah Petroleum')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $benkr = $depotprices
            ->where('name', 'BE Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oceannkr = $depotprices
            ->where('name', 'Ocean Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tristarnkr = $depotprices
            ->where('name', 'Tri-Star')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $banodankr = $depotprices
            ->where('name', 'Banoda Oil')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $brainnkr = $depotprices
            ->where('name', 'Brain Field')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $futuresnkr = $depotprices
            ->where('name', 'Futures')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $primenkr = $depotprices
            ->where('name', 'Prime Regional')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $mogasnkr = $depotprices
            ->where('name', 'Mogas')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petrocamnkr = $depotprices
            ->where('name', 'Petrocam Kenya')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $globalnkr = $depotprices
            ->where('name', 'Global Oil')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $jaguarnkr = $depotprices
            ->where('name', 'Jaguar Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bachunkr = $depotprices
            ->where('name', 'Bachulal')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $iladenkr = $depotprices
            ->where('name', 'Ilade Oil')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $axonnkr = $depotprices
            ->where('name', 'Axon Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hammexnkr = $depotprices
            ->where('name', 'Hammex')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fastnkr = $depotprices
            ->where('name', 'Fastnet')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oilcomnkr = $depotprices
            ->where('name', 'Oilcom')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $citynkr = $depotprices
            ->where('name', 'City Oil')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bushrankr = $depotprices
            ->where('name', 'Bushra Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ashankr = $depotprices
            ->where('name', 'Asharami Energy')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $amanankr = $depotprices
            ->where('name', 'Amana')
            ->where('location', 'Nakuru')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tibankr = $depotprices
            ->where('name', 'Tiba')
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
            ->where('name', 'Vivo Energy')
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

        $gapcoksm = $depotprices
            ->where('name', 'Gapco Kenya')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petroksm = $depotprices
            ->where('name', 'Petro Kenya')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oryxksm = $depotprices
            ->where('name', 'Oryx Energies')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $texasksm = $depotprices
            ->where('name', 'Texas Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $galanaksm = $depotprices
            ->where('name', 'Galana Oil')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fossilksm = $depotprices
            ->where('name', 'Fossil Fuel')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $nockksm = $depotprices
            ->where('name', 'NOCK')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aspamksm = $depotprices
            ->where('name', 'ASPAM Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $dalbitksm = $depotprices
            ->where('name', 'Dalbit Petroleum')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $toshaksm = $depotprices
            ->where('name', 'Tosha Petroleum')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $gulfksm = $depotprices
            ->where('name', 'Gulf Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kencorksm = $depotprices
            ->where('name', 'Kencor Petroleum')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $royalksm = $depotprices
            ->where('name', 'Royal Oilfields')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $eagolksm = $depotprices
            ->where('name', 'EAGOL Kenya')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ainuksm = $depotprices
            ->where('name', 'Ainu Shamsi')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $twobaksm = $depotprices
            ->where('name', 'Twoba')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olympicksm = $depotprices
            ->where('name', 'Olympic Petroleum')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $lakeksm = $depotprices
            ->where('name', 'Lake Oil Gas')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $regnolksm = $depotprices
            ->where('name', 'Regnol Oil')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oneksm = $depotprices
            ->where('name', 'One Petroleum')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aftahksm = $depotprices
            ->where('name', 'Aftah Petroleum')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $beksm = $depotprices
            ->where('name', 'BE Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oceanksm = $depotprices
            ->where('name', 'Ocean Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tristarksm = $depotprices
            ->where('name', 'Tri-Star')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $banodaksm = $depotprices
            ->where('name', 'Banoda Oil')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $brainksm = $depotprices
            ->where('name', 'Brain Field')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $futuresksm = $depotprices
            ->where('name', 'Futures')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $primeksm = $depotprices
            ->where('name', 'Prime Regional')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $mogasksm = $depotprices
            ->where('name', 'Mogas')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petrocamksm = $depotprices
            ->where('name', 'Petrocam Kenya')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $globalksm = $depotprices
            ->where('name', 'Global Oil')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $jaguarksm = $depotprices
            ->where('name', 'Jaguar Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bachuksm = $depotprices
            ->where('name', 'Bachulal')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $iladeksm = $depotprices
            ->where('name', 'Ilade Oil')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $axonksm = $depotprices
            ->where('name', 'Axon Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hammexksm = $depotprices
            ->where('name', 'Hammex')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fastksm = $depotprices
            ->where('name', 'Fastnet')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oilcomksm = $depotprices
            ->where('name', 'Oilcom')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $cityksm = $depotprices
            ->where('name', 'City Oil')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bushraksm = $depotprices
            ->where('name', 'Bushra Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ashaksm = $depotprices
            ->where('name', 'Asharami Energy')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $amanaksm = $depotprices
            ->where('name', 'Amana')
            ->where('location', 'Kisumu')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tibaksm = $depotprices
            ->where('name', 'Tiba')
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
            ->where('name', 'Vivo Energy')
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

        $gapcoeld = $depotprices
            ->where('name', 'Gapco Kenya')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petroeld = $depotprices
            ->where('name', 'Petro Kenya')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oryxeld = $depotprices
            ->where('name', 'Oryx Energies')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $texaseld = $depotprices
            ->where('name', 'Texas Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $galanaeld = $depotprices
            ->where('name', 'Galana Oil')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fossileld = $depotprices
            ->where('name', 'Fossil Fuel')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $nockeld = $depotprices
            ->where('name', 'NOCK')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aspameld = $depotprices
            ->where('name', 'ASPAM Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $dalbiteld = $depotprices
            ->where('name', 'Dalbit Petroleum')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $toshaeld = $depotprices
            ->where('name', 'Tosha Petroleum')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $gulfeld = $depotprices
            ->where('name', 'Gulf Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $kencoreld = $depotprices
            ->where('name', 'Kencor Petroleum')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $royaleld = $depotprices
            ->where('name', 'Royal Oilfields')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $eagoleld = $depotprices
            ->where('name', 'EAGOL Kenya')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ainueld = $depotprices
            ->where('name', 'Ainu Shamsi')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $twobaeld = $depotprices
            ->where('name', 'Twoba')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $olympiceld = $depotprices
            ->where('name', 'Olympic Petroleum')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $lakeeld = $depotprices
            ->where('name', 'Lake Oil Gas')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $regnoleld = $depotprices
            ->where('name', 'Regnol Oil')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oneeld = $depotprices
            ->where('name', 'One Petroleum')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $aftaheld = $depotprices
            ->where('name', 'Aftah Petroleum')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $beeld = $depotprices
            ->where('name', 'BE Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oceaneld = $depotprices
            ->where('name', 'Ocean Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tristareld = $depotprices
            ->where('name', 'Tri-Star')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $banodaeld = $depotprices
            ->where('name', 'Banoda Oil')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $braineld = $depotprices
            ->where('name', 'Brain Field')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $futureseld = $depotprices
            ->where('name', 'Futures')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $primeeld = $depotprices
            ->where('name', 'Prime Regional')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $mogaseld = $depotprices
            ->where('name', 'Mogas')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $petrocameld = $depotprices
            ->where('name', 'Petrocam Kenya')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $globaleld = $depotprices
            ->where('name', 'Global Oil')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $jaguareld = $depotprices
            ->where('name', 'Jaguar Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bachueld = $depotprices
            ->where('name', 'Bachulal')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $iladeeld = $depotprices
            ->where('name', 'Ilade Oil')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $axoneld = $depotprices
            ->where('name', 'Axon Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $hammexeld = $depotprices
            ->where('name', 'Hammex')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $fasteld = $depotprices
            ->where('name', 'Fastnet')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $oilcomeld = $depotprices
            ->where('name', 'Oilcom')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $cityeld = $depotprices
            ->where('name', 'City Oil')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $bushraeld = $depotprices
            ->where('name', 'Bushra Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $ashaeld = $depotprices
            ->where('name', 'Asharami Energy')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $amanaeld = $depotprices
            ->where('name', 'Amana')
            ->where('location', 'Eldoret')
            ->unique()->sortBy('id', SORT_REGULAR, true)
            ->take(1);

        $tibaeld = $depotprices
            ->where('name', 'Tiba')
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
            $gapconrb, $gapcomsa, $gapconkr, $gapcoeld, $gapcoksm,
            $petronrb, $petromsa, $petronkr, $petroeld, $petroksm,
            $oryxnrb, $oryxmsa, $oryxnkr, $oryxeld, $oryxksm,
            $texasnrb, $texasmsa, $texasnkr, $texaseld, $texasksm,
            $galananrb, $galanamsa, $galanankr, $galanaeld, $galanaksm,
            $fossilnrb, $fossilmsa, $fossilnkr, $fossileld, $fossilksm,
            $nocknrb, $nockmsa, $nocknkr, $nockeld, $nockksm,

            $toshanrb, $toshamsa, $toshankr, $toshaeld, $toshaksm,
            $aspamnrb, $aspammsa, $aspamnkr, $aspameld, $aspamksm,
            $gulfnrb, $gulfmsa, $gulfnkr, $gulfeld, $gulfksm,
            $dalbitnrb, $dalbitmsa, $dalbitnkr, $dalbiteld, $dalbitksm,
            $kencornrb, $kencormsa, $kencornkr, $kencoreld, $kencorksm,
            $royalnrb, $royalmsa, $royalnkr, $royaleld, $royalksm,
            $eagolnrb, $eagolmsa, $eagolnkr, $eagoleld, $eagolksm,
            $ainunrb, $ainumsa, $ainunkr, $ainueld, $ainuksm,
            $twobanrb, $twobamsa, $twobankr, $twobaeld, $twobaksm,
            $olympicnrb, $olympicmsa, $olympicnkr, $olympiceld, $olympicksm,
            $lakenrb, $lakemsa, $lakenkr, $lakeeld, $lakeksm,

            $regnolnrb, $regnolmsa, $regnolnkr, $regnoleld, $regnolksm,
            $onenrb, $onemsa, $onenkr, $oneeld, $oneksm,
            $aftahnrb, $aftahmsa, $aftahnkr, $aftaheld, $aftahksm,
            $benrb, $bemsa, $benkr, $beeld, $beksm,
            $oceannrb, $oceanmsa, $oceannkr, $oceaneld, $oceanksm,
            $tristarnrb, $tristarmsa, $tristarnkr, $tristareld, $tristarksm,
            $banodanrb, $banodamsa, $banodankr, $banodaeld, $banodaksm,
            $brainnrb, $brainmsa, $brainnkr, $braineld, $brainksm,
            $futuresnrb, $futuresmsa, $futuresnkr, $futureseld, $futuresksm,
            $primenrb, $primemsa, $primenkr, $primeeld, $primeksm,

            $mogasnrb, $mogasmsa, $mogasnkr, $mogaseld, $mogasksm,
            $petrocamnrb, $petrocammsa, $petrocamnkr, $petrocameld, $petrocamksm,
            $globalnrb, $globalmsa, $globalnkr, $globaleld, $globalksm,
            $jaguarnrb, $jaguarmsa, $jaguarnkr, $jaguareld, $jaguarksm,
            $bachunrb, $bachumsa, $bachunkr, $bachueld, $bachuksm,
            $iladenrb, $ilademsa, $iladenkr, $iladeeld, $iladeksm,
            $axonnrb, $axonmsa, $axonnkr, $axoneld, $axonksm,
            $hammexnrb, $hammexmsa, $hammexnkr, $hammexeld, $hammexksm,
            $fastnrb, $fastmsa, $fastnkr, $fasteld, $fastksm,
            $oilcomnrb, $oilcommsa, $oilcomnkr, $oilcomeld, $oilcomksm,
            $citynrb, $citymsa, $citynkr, $cityeld, $cityksm,
            $bushranrb, $bushramsa, $bushrankr, $bushraeld, $bushraksm,
            $ashanrb, $ashamsa, $ashankr, $ashaeld, $ashaksm,
            $amananrb, $amanamsa, $amanankr, $amanaeld, $amanaksm,
            $tibanrb, $tibamsa, $tibankr, $tibaeld, $tibaksm,
        ]);

        $collapsed = $collection->collapse();

        return response($collapsed, 200);
    }

}
