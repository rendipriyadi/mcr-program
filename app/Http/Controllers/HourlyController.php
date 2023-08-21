<?php

namespace App\Http\Controllers;

use App\Models\PlanHauler;
use App\Models\PlanLoader;
use App\Models\Ritasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HourlyController extends Controller
{
    public function index(Request $request)
    {
    $planloaderData = PlanLoader::select('codemodelloader','prod_loaderob') // Select the columns you need
    ->distinct('codeunit') // Apply DISTINCT to the 'codeunit' column
    ->get();;
    $planhaulerData = PlanHauler::select('codemodelhauler','prod_haulerob') // Select the columns you need
    ->distinct('codeunit') // Apply DISTINCT to the 'codeunit' column
    ->get();;
       // Mendapatkan daftar tanggal, kode loader, site code, material yang tersedia dari database
       $availableDates = DB::table('ritasi')->distinct()->pluck('date');
       $availableCodeLoaders = DB::table('ritasi')->distinct()->pluck('codeloader');
       $availableSiteCodes = DB::table('ritasi')->distinct()->pluck('sitecode');
       $availableMaterials = DB::table('ritasi')->distinct()->pluck('submaterial');

       // Mendapatkan parameter yang dipilih dari input form
       $selectedDate = $request->input('date');
       $selectedCodeLoader = $request->input('codeloader');
       $selectedSiteCode = $request->input('sitecode');
       $selectedMaterial = $request->input('material');

       // Dapatkan data berdasarkan parameter yang dipilih (jika ada)
       $hourly = $this->getData($selectedDate, $selectedCodeLoader, $selectedSiteCode, $selectedMaterial);

       // Get the last updated date from the session
       $lastUpdated = Session::get('last_updated');

       // Format the date as needed (e.g., 'Y-m-d H:i:s' to 'd/m/Y H:i:s')
       $formattedLastUpdated = $lastUpdated ? date('d/m/Y H:i:s', strtotime($lastUpdated)) : null;

       return view('hourly.index', compact('hourly','planloaderData','planhaulerData', 'selectedDate', 'selectedCodeLoader', 'selectedSiteCode', 'selectedMaterial', 'formattedLastUpdated', 'availableDates', 'availableCodeLoaders', 'availableSiteCodes', 'availableMaterials'));
    }

    public function refresh(Request $request)
    {
        // Get the selected date from the form input
        $selectedDate = $request->input('date');
        $selectedCodeLoader = $request->input('codeloader');

        // Get the sitecode from the form input
        $selectedSiteCode = $request->input('sitecode');

        // Get the material from the form input
        $selectedMaterial= $request->input('material');

        // Save the current date as last updated date
        $lastUpdated = date('Y-m-d H:i:s');
        Session::put('last_updated', $lastUpdated);
        Session::put('codeloader', $selectedCodeLoader);
        Session::put('sitecode', $selectedSiteCode);
        Session::put('material', $selectedMaterial);
        // Redirect back to the index page with the selected date as a query parameter
        return redirect()->route('hourly.index', ['date' => $selectedDate,
        'codeloader' => $selectedCodeLoader,
        'sitecode' => $selectedSiteCode,
        'material' => $selectedMaterial]);
    }

    private function getData($selectedDate = null)
    {
        $query = DB::table('ritasi')
            ->select('date', 'sitecode', 'time', 'codeloader','submaterial', DB::raw('SUM(adjustment) as total_adjustment'))
            ->groupBy('date', 'sitecode', 'time', 'codeloader','submaterial');

        // If a date is provided, filter the data by the selected date
        if (!is_null($selectedDate)) {
            $query->where('date', $selectedDate);
        }

        return $query->get();
    }


}
