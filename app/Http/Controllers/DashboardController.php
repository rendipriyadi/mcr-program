<?php

namespace App\Http\Controllers;


use App\Models\Ritasi;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request){

       // Ambil data dari tabel plansite berdasarkan tanggal
       $plansite = DB::table('planproduksi')
       ->select(DB::raw('DATE(tanggal_planproduksi) as tanggal_planproduksi'), DB::raw('SUM(plan_site) as plan_site'))
       ->groupBy(DB::raw('DATE(tanggal_planproduksi)'))
       ->get();

   // Ambil data dari tabel ritasi berdasarkan tanggal dan material
        $adjustment = DB::table('ritasi')
       ->select(DB::raw('DATE(date) as date'), 'material', DB::raw("SUM(adjustment) as adjustment"))
       ->groupBy(DB::raw('DATE(date)'), 'material')
       ->get();

            // Mengubah nilai adjustment menjadi positif
            $adjustment->each(function ($item) {
                $item->adjustment = abs($item->adjustment);
            });

        $hari = Ritasi::select(DB::raw("DATE(date) as hari"))
        ->GroupBy('date')
        ->pluck('hari');

        $bulan = Ritasi::select (DB::raw("MONTHNAME(date) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(date)"))
        ->pluck('bulan');

        $shift = Ritasi::select(DB::raw("(shift) as shift"))
        ->GroupBy('shift')
        ->pluck('shift');

        $time = Ritasi::select(DB::raw("time as time"))
        ->GroupBy(DB::raw("time"))
        ->pluck('time');

        $codeloader = Ritasi::select(DB::raw("codeloader as codeloader"))
        ->GroupBy(DB::raw("codeloader"))
        ->pluck('codeloader');

        $sitecode = Ritasi::select(DB::raw("sitecode as sitecode"))
        ->GroupBy(DB::raw("sitecode"))
        ->pluck('sitecode');

        $material = Ritasi::select(DB::raw("material as material"))
        ->GroupBy(DB::raw("material"))
        ->pluck('material');


        $statusData = DB::table('statusunit')
        ->select(DB::raw('DATE(statusunitdate) as statusunitdate'), 'statuscnunit', DB::raw('SUM(statushour) as statushour'))
        ->groupBy(DB::raw('DATE(statusunitdate)'), 'statuscnunit')
        ->get();


        $breakData = DB::table('breakdown')
        ->select(DB::raw('DATE(breakdate) as breakdate'), 'breakcnunit', DB::raw('SUM(breaktotal) as breaktotal'))
        ->groupBy(DB::raw('DATE(breakdate)'), 'breakcnunit')
        ->get();

        $fuelData = DB::table('fuel')
        ->select(DB::raw('DATE(fueldate) as fueldate'), 'fuelcnunit', DB::raw('SUM(fueltotal) as fueltotal'))
        ->groupBy(DB::raw('DATE(fueldate)'), 'fuelcnunit')
        ->get();

        $hmData = DB::table('hourmeter')
        ->select(DB::raw('DATE(datehm) as datehm'), 'cnunithm', DB::raw('SUM(totalhm) as totalhm'))
        ->groupBy(DB::raw('DATE(datehm)'), 'cnunithm')
        ->get();

        $adjust= DB::table('ritasi')
        ->select(DB::raw('MONTH(date) as bulan'), DB::raw('SUM(adjustment) as adjustment'))
        ->groupBy(DB::raw('MONTH(date)'))
        ->get();

        $adjustData = $adjust->map(function ($item) {
            return [
                'bulan' => $item->bulan,
                'adjustment' => $item->adjustment,
            ];
        });

        $weatherData = DB::table('rainslippery')
        ->select('sitecode', 'rainslipdate', 'rainhour', 'slipperyhour')

        ->groupBy(['sitecode', 'rainslipdate','rainhour','slipperyhour'])
        ->get();

        $planweatherData = DB::table('planweather')
        ->select('sitecode', 'tanggal_planweather', 'plan_rain', 'plan_slippery')

        ->groupBy(['sitecode', 'tanggal_planweather','plan_rain','plan_slippery'])
        ->get();
        $combinedData = [];

        foreach ($weatherData as $weather) {
            $combinedData[$weather->sitecode][$weather->rainslipdate]['rainhour'] = $weather->rainhour;
            $combinedData[$weather->sitecode][$weather->rainslipdate]['slipperyhour'] = $weather->slipperyhour;
        }

        foreach ($planweatherData as $planWeather) {
            $combinedData[$planWeather->sitecode][$planWeather->tanggal_planweather]['plan_rain'] = $planWeather->plan_rain;
            $combinedData[$planWeather->sitecode][$planWeather->tanggal_planweather]['plan_slippery'] = $planWeather->plan_slippery;
        }

        $selectedYear = $request->input('year', Carbon::now()->year);
        $selectedMonth = $request->input('month', Carbon::now()->month);
        $selectedDate = $request->input('date', Carbon::now()->toDateString());

        // Ambil data rencana produksi dari tabel planproduksi
        $plansiteData = DB::table('planproduksi')
            ->select(DB::raw('MONTH(tanggal_planproduksi) as bulan'), DB::raw('SUM(plan_site) as plan_site'))
            ->whereYear('tanggal_planproduksi', $selectedYear)
            ->whereMonth('tanggal_planproduksi', $selectedMonth)
            ->groupBy(DB::raw('MONTH(tanggal_planproduksi)'))
            ->get();

        // Ambil data penyesuaian dari tabel ritasi
        $adjustData = DB::table('ritasi')
            ->select(DB::raw('MONTH(date) as bulan'), DB::raw('SUM(adjustment) as adjustment'))
            ->whereYear('date', $selectedYear)
            ->whereMonth('date', $selectedMonth)
            ->groupBy(DB::raw('MONTH(date)'))
            ->get();

            $planbudget = DB::table('planproduksi')
            ->select(DB::raw('MONTH(tanggal_planproduksi) as bulan'), DB::raw('SUM(plan_budget) as plan_budget'))
            ->whereYear('tanggal_planproduksi', $selectedYear)
            ->whereMonth('tanggal_planproduksi', $selectedMonth)
            ->groupBy(DB::raw('MONTH(tanggal_planproduksi)'))
            ->get();


        // Menghitung perbandingan antara rencana produksi dan penyesuaian
        $comparisonData = $plansiteData->map(function ($plansite, $index) use ($adjustData) {
            $comparison = $plansite->plan_site - $adjustData[$index]->adjustment;
            return [
                'bulan' => date('F', mktime(0, 0, 0, $plansite->bulan, 1)),
                'comparison' => number_format(abs($comparison), 0, '.', ','),
            ];
        });

        $selectedType = $request->query('type', 'all'); // Mengambil nilai parameter tipe (rain atau slippery), default: all
        $selectedSite = $request->query('sitecode', 'all'); // Mengambil nilai parameter sitecode, default: all
        return view('dashboard.index', compact('combinedData','selectedType', 'selectedSite','hmData','fuelData','breakData','statusData','plansiteData', 'adjustData', 'comparisonData', 'selectedYear', 'selectedMonth', 'selectedDate','weatherData','adjustment','hari','time','codeloader','sitecode','bulan','plansite','planbudget'));
    }

}


