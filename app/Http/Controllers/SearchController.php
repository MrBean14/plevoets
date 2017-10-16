<?php

namespace App\Http\Controllers;

use App\Factuur;
use App\Klant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function executeSearch(Request $request)
    {
        $keywords = $request->keywords;
        $klanten = Klant::all();
        $searchKlanten = new \Illuminate\Database\Eloquent\Collection();

        foreach($klanten as $klant)
        {
            if(Str::contains(Str::lower($klant->naam), Str::lower($keywords)))
            {
                $searchKlanten->add($klant);
            }
        }

        return view('search/searchKlanten')->with('searchKlanten', $searchKlanten);
    }

    public function executeFacturenSearch(Request $request)
    {
        $keywords = $request->keywords;
        $facturen = Factuur::all();
        $searchFacturen = new \Illuminate\Database\Eloquent\Collection();

        foreach ($facturen as $factuur) {
            if ($keywords == 1) {
                $searchFacturen->add($factuur);
            }
            else if ($keywords == 2) {
                if ($factuur->voldaan == true) {
                    $searchFacturen->add($factuur);
                }
            }
            else if ($keywords == 3) {
                if ($factuur->voldaan == false) {
                    $searchFacturen->add($factuur);
                }
            }
        }

        return view('search/searchInvoices')->with('facturen', $searchFacturen);
    }

    public function executeSearchInvoices(Request $request)
    {
        //$filtered = Factuur::all();

        $criterium  = $request->data[0]{'criterium'};
        $startnr    = $request->data[0]{'startnr'};
        $eindnr     = $request->data[0]{'eindnr'};
        $operator   = $request->data[0]{'operator'};
        $bedrag     = $request->data[0]{'bedrag'};
        $startdatum = $request->data[0]{'factuurdatum_start'};
        $einddatum  = $request->data[0]{'factuurdatum_einde'};
        $klant_id   = $request->data[0]{'klant_id'};
        $makelaar_id = $request->data[0]{'makelaar_id'};
        $selectie   = $request->data[0]{'selectie'};
        $sortering  = $request->data[0]{'sortering'};

        if ($criterium == 1) {
            $filtered = Factuur::FactuurNummer($startnr, $eindnr)
                ->Bedrag($operator, $bedrag)
                ->Klant($klant_id)
                ->Makelaar($makelaar_id)
                ->WelkeFacturen($selectie)
                ->Sortering($sortering)
                ->get();
        }
        elseif ($criterium == 2) {
            $filtered = Factuur::FactuurDatum($startdatum, $einddatum)
                ->Bedrag($operator, $bedrag)
                ->Klant($klant_id)
                ->Makelaar($makelaar_id)
                ->WelkeFacturen($selectie)
                ->Sortering($sortering)
                ->get();
        }
        else {
            $filtered = Factuur::Bedrag($operator, $bedrag)
                ->Klant($klant_id)
                ->Makelaar($makelaar_id)
                ->WelkeFacturen($selectie)
                ->Sortering($sortering)
                ->get();
        }

      //  $filtered->all();

        return view('search/searchInvoices')->with('facturen', $filtered);
    }


    public function berekenStatistieken(Request $request)
    {
        $criterium  = $request->data[0]{'criterium'};

        $startdatum = $request->data[0]{'startjaar'}.'-01-01'; //2017 ---> 2017-01-01
        $einddatum  = $request->data[0]{'eindjaar'}.'-12-31';

  //      $facturen = Factuur::where('datum','>=',date($startdatum))->where('datum','<=',date($einddatum))->OrderBy('datum','asc')->get();

        $facturen = Factuur::whereDate('datum', '>=', date($startdatum))
            ->whereDate('datum', '<=', date($einddatum))
            ->orderBy('datum', 'asc')
            ->get();

        foreach ($facturen as $factuur) {

            $tebetalen = 0;

            $dt = Carbon::parse($factuur->datum);

            $theYear = $dt->year;
            $theMonth = $dt->month . "/" . $theYear;
            $theQuarter = "Q" . $dt->quarter . "/" . $theYear;

            $b = $factuur->bedrag;
            $bt = ($factuur->betaald == NULL) ? 0 : $factuur->betaald;
            $tb = $b - $bt;

            if ($criterium == 3){
                if(isset($totalen[$theYear]))
                {
                    $totaal = $totalen[$theYear]['totaal'] + $b;
                    $betaald = $totalen[$theYear]['betaald'] + $bt;
                    $tebetalen = $totalen[$theYear]['tebetalen'] + $tb;

                    $totalen[$theYear] = array('totaal'=> $totaal, 'betaald'=>$betaald, 'tebetalen'=>$tebetalen);
                }
                else
                {
                    $totalen[$theYear] = array('totaal'=>$b, 'betaald'=>$bt, 'tebetalen'=>$tb);
                }
            }
            elseif ($criterium == 2) {
                if(isset($totalen[$theQuarter]))
                {
                    $totaal = $totalen[$theQuarter]['totaal'] + $b;
                    $betaald = $totalen[$theQuarter]['betaald'] + $bt;
                    $tebetalen = $totalen[$theQuarter]['tebetalen'] + $tb;

                    $totalen[$theQuarter] = array('totaal'=> $totaal, 'betaald'=>$betaald, 'tebetalen'=>$tebetalen);
                }
                else
                {
                    $totalen[$theQuarter] = array('totaal'=>$b, 'betaald'=>$bt, 'tebetalen'=>$tb);
                }
            }
            elseif ($criterium == 1) {
                if(isset($totalen[$theMonth]))
                {
                    $totaal = $totalen[$theMonth]['totaal'] + $b;
                    $betaald = $totalen[$theMonth]['betaald'] + $bt;
                    $tebetalen = $totalen[$theMonth]['tebetalen'] + $tb;

                    $totalen[$theMonth] = array('totaal'=> $totaal, 'betaald'=>$betaald, 'tebetalen'=>$tebetalen);
                }
                else
                {
                    $totalen[$theMonth] = array('totaal'=>$b, 'betaald'=>$bt, 'tebetalen'=>$tb);
                }
            }
        }

        return view('search/statistiekenResultaat')->with('resultaten', json_encode($totalen,JSON_NUMERIC_CHECK));
    }
}