<?php

namespace App\Http\Controllers;

use App\Exports\TruckFactorExport;
use App\Imports\TruckFactorImport;

use App\Models\Factor;
use App\Models\Site;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TruckFactor extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.faktor-list|setup.faktor-create|setup.faktor-edit|setup.faktor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.faktor-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.faktor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.faktor-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return View ('setup.faktor.index', [
            'factors' => Factor::get(),
        ]);
    }
    public function export()
	{
		return Excel::download(new TruckFactorExport, 'TruckFactor.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');




        $namaFile = $file->getClientOriginalName();
        $file->move('DataTruck',$namaFile);
        // import data
        $import = Excel::import(new TruckFactorImport, public_path('/DataTruck/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('faktor.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('faktor.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}

    public function create()
    {
        $site = Site::all();
        return View('setup.faktor.create',compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [

            'truck' => ['required',],
            'factor' => ['required'],
            'sitecode' => ['required'],

            ]);

        $factor = new Factor();



        $factor->truck = $request->truck;
        $factor->factor = $request->factor;

        $factor->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];

        $factor->save();

        session()->flash('success','Data Ditambah');

       return redirect()->route('faktor.index');
    }

    public function edit($id)
    {

        $factor = Factor::find($id);

        $site = Site::all();
        return View('setup.faktor.edit',compact('site','factor'));

    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [

            'category' => ['required',],
            'type' => ['required'],
            'codehauler' => ['required'],
            'codemodelhauler' => ['required',],
            'factor_truck' => ['required'],
            'sitecode' => ['required'],

            ]);

        $factor = Factor::find($id);


        $factor->category = $request->category;
        $factor->type = $request->type;
        $factor->codehauler = $request->codehauler;
        $factor->codemodelhauler = $request->codemodelhauler;
        $factor->factor_truck = $request->factor_truck;

        // $factor->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];




        $factor->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('faktor.index');
    }

    public function destroy($id)
    {
        $factor = Factor::find($id);
        if ($factor != null) {
        $factor->delete();

        session()->flash('danger','Data Dihapus');
        }
        return redirect()->route('faktor.index');
}
}
