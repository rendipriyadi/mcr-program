<?php

namespace App\Http\Controllers;

use App\Models\SlipperyRain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PCAController extends Controller
{

        public function index(Request $request)
        {

            $availableDates = DB::table('ritasi')->distinct()->pluck('date');

            // Mendapatkan tanggal yang dipilih dari input form
            $selectedDate = $request->input('date');

            // Dapatkan data berdasarkan tanggal yang dipilih (jika ada)
            $pca = $this->getData($selectedDate);
            // Mengambil data "plansite" dari tabel "planproduksi" menggunakan Eloquent ORM
            $plansite = DB::table('planproduksi')
            ->select(DB::raw('tanggal_planproduksi as tanggal'), DB::raw('SUM(plan_site) as achievement'))
            ->groupBy('tanggal_planproduksi')
            ->orderBy('tanggal')
            ->get();

        // Ambil data adjustment dari tabel ritasi
        $adjustment = DB::table('ritasi')
            ->select(DB::raw('DATE(date) as tanggal'), DB::raw("SUM(adjustment) as adjustment"))
            ->groupBy(DB::raw('DATE(date)'))
            ->orderBy('tanggal')
            ->get();

        // Mengubah nilai adjustment menjadi positif
        $adjustment->each(function ($item) {
            $item->adjustment = abs($item->adjustment);
        });



            return view('pca.index', compact('pca', 'selectedDate', 'availableDates','plansite','adjustment'));
        }

        public function refresh(Request $request)
        {
            // Get the selected date from the form input
            $selectedDate = $request->input('date');

            // Save the current date as last updated date
            $lastUpdated = date('Y-m-d H:i:s');
            Session::put('last_updated', $lastUpdated);

            // Redirect back to the index page with the selected date as a query parameter
            return redirect()->route('pca.index', ['date' => $selectedDate]);
        }

private function getData($selectedDate = null)
{
    $query = DB::table('ritasi')
        ->select('date', 'sitecode', 'time', 'codeloader', DB::raw('SUM(adjustment) as total_adjustment'))
        ->groupBy('date', 'sitecode', 'time', 'codeloader');

    // If a date is provided, filter the data by the selected date
    if (!is_null($selectedDate)) {
        $query->where('date', $selectedDate);
    }
    $query = DB::table('statusunit')
    ->select('statusunitdate','sitecode', DB::raw('SUM(statushour) as statushour'))
    ->groupBy('statusunitdate','sitecode');

    return $query->get();
}

}
