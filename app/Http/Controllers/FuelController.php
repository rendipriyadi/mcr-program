<?php

namespace App\Http\Controllers;

use App\Exports\FuelExport;
use App\Imports\FuelImport;
use App\Models\Equipment;
use App\Models\Fuel;
use App\Models\Shift;
use App\Models\Site;
use App\Models\Time;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FuelController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:fuel-list|fuel-create|fuel-edit|fuel-delete', ['only' => ['index','show']]);
         $this->middleware('permission:fuel-create', ['only' => ['create','store']]);
         $this->middleware('permission:fuel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:fuel-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return View ('fuel.index',
        [
            'fuels' => Fuel::latest()->paginate(10),
        ]);
    }
    public function export()
	{
		return Excel::download(new FuelExport, 'Fuel.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');




        $namaFile = $file->getClientOriginalName();
        $file->move('DataFuel',$namaFile);
        // import data
        $import = Excel::import(new FuelImport, public_path('/DataFuel/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('fuel.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('fuel.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
    {

        $site = Site::all();
        $shift = Shift::all();
        $equipfuel = Equipment::all();
        return view('fuel.create', compact('site','shift','equipfuel'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required'],
            'fueldate' => ['required',],
            'shiftcode' => ['required'],
            'fuelcnunit' => ['required'],
            'typecode' => ['required'],
            'fuelmodel' => ['required',],
            'hmbefore' => ['required'],
            'hmstart' => ['required'],
            'fuelcons' => ['required'],
            'fueltotal' => ['required'],
            'fuelusage' => ['required',],
            'fuelob' => ['required'],
            'fuelcoal' => ['required'],
            'fuelcoaltransport' => ['required'],

        ],
            [
                'sitecode.required' => 'Tidak Boleh Kosong',
                'fueldate.required' => 'Tidak Boleh Kosong',
                'shiftcode.required' => 'Tidak Boleh Kosong',
                'fuelcnunit.required' => 'Tidak Boleh Kosong',
                'typecode.required' => 'tidak Boleh Kosong',
                'fuelmodel.required' => 'Tidak Boleh Kosong',
                'hmbefore.required' => 'Tidak Boleh Kosong',
                'hmstart.required' => 'Tidak Boleh Kosong',
                'fuelcons.required' => 'Tidak Boleh Kosong',

            ]);

        $fuel = new Fuel();

        $fuel->sitecode= json_decode($request->get('sitecode'), true)['sitecode'];
        $fuel->fueldate = $request->fueldate;
        $fuel->shiftcode= json_decode($request->get('shiftcode'), true)['shift'];
        $fuel->fuelcnunit = json_decode($request->get('fuelcnunit'), true)['codeunit'];
        $fuel->typecode = $request->typecode;
        $fuel->fuelmodel = $request->fuelmodel;
        $fuel->hmbefore = $request->hmbefore;
        $fuel->hmstart = $request->hmstart;
        $fuel->fuelcons = $request->fuelcons;
        $fuel->fueltotal = $request->fueltotal;
        $fuel->fuelusage = $request->fuelusage;
        $fuel->fuelob = $request->fuelob;
        $fuel->fuelcoal = $request->fuelcoal;
        $fuel->fuelcoaltransport = $request->fuelcoaltransport;



        $fuel->save();

        session()->flash('success','Data Fuel Ditambah');

       return redirect()->route('fuel.index');
    }

    public function edit($id)
    {

        $fuel = Fuel::find($id);
        $site = Site::all();
        $shift = Shift::all();
        $equipfuel = Equipment::all();
        return view('fuel.edit', compact('site','shift','equipfuel','fuel'));
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required'],
            'fueldate' => ['required',],
            'shiftcode' => ['required'],
            'fuelcnunit' => ['required'],
            'typecode' => ['required'],
            'fuelmodel' => ['required',],
            'hmbefore' => ['required'],
            'hmstart' => ['required'],
            'fuelcons' => ['required'],
            'fueltotal' => ['required'],
            'fuelusage' => ['required',],
            'fuelob' => ['required'],
            'fuelcoal' => ['required'],
            'fuelcoaltransport' => ['required'],

        ],
            [
                'sitecode.required' => 'Tidak Boleh Kosong',
                'fueldate.required' => 'Tidak Boleh Kosong',
                'shiftcode.required' => 'Tidak Boleh Kosong',
                'fuelcnunit.required' => 'Tidak Boleh Kosong',
                'typecode.required' => 'tidak Boleh Kosong',
                'fuelmodel.required' => 'Tidak Boleh Kosong',
                'hmbefore.required' => 'Tidak Boleh Kosong',
                'hmstart.required' => 'Tidak Boleh Kosong',
                'fuelcons.required' => 'Tidak Boleh Kosong',

            ]);

        $fuel = Fuel::find($id);

        // $fuel->sitecode= json_decode($request->get('sitecode'), true)['sitecode'];
        $fuel->fueldate = $request->fueldate;
        $fuel->shiftcode= json_decode($request->get('shiftcode'), true)['shift'];
        $fuel->fuelcnunit = json_decode($request->get('fuelcnunit'), true)['codeunit'];
        $fuel->typecode = $request->typecode;
        $fuel->fuelmodel = $request->fuelmodel;
        $fuel->hmbefore = $request->hmbefore;
        $fuel->hmstart = $request->hmstart;
        $fuel->fuelcons = $request->fuelcons;
        $fuel->fueltotal = $request->fueltotal;
        $fuel->fuelusage = $request->fuelusage;
        $fuel->fuelob = $request->fuelob;
        $fuel->fuelcoal = $request->fuelcoal;
        $fuel->fuelcoaltransport = $request->fuelcoaltransport;

        $fuel->save();

        session()->flash('info','Data Fuel Diupdate');

       return redirect()->route('fuel.index');
    }

    public function destroy($id)
    {
        $fuel = Fuel::find($id);

        $fuel->delete();

        session()->flash('danger','Data Fuel Dihapus');

        return redirect()->route('fuel.index');
    }
}
