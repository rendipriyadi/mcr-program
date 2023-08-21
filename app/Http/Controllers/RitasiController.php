<?php

namespace App\Http\Controllers;

use App\Exports\RitasiExport;

use App\Imports\RitasiImport;
use App\Models\Equipment;
use App\Models\Factor;
use App\Models\Hauler;
use App\Models\Loader;
use App\Models\Location;
use App\Models\Material;
use App\Models\Operator;
use App\Models\Problem;
use App\Models\Ritasi;
use App\Models\Shift;
use App\Models\Site;
use App\Models\Time;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class RitasiController extends Controller
{

 function __construct()
    {
         $this->middleware('permission:ritasi-list|ritasi-create|ritasi-edit|ritasi-delete', ['only' => ['index','show']]);
         $this->middleware('permission:ritasi-create', ['only' => ['create','store']]);
         $this->middleware('permission:ritasi-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ritasi-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)

    {

        $ritase = Ritasi::get();
        return view('ritasi.index',compact('ritase'));
    }


    public function export()
	{
		return Excel::download(new RitasiExport, 'ritasi.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');




        $namaFile = $file->getClientOriginalName();
        $file->move('DataRitasi',$namaFile);
        // import data
        $import = Excel::import(new RitasiImport, public_path('/DataRitasi/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('ritasi.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('ritasi.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}

    public function create(Request $request)
    {

        $load = Equipment::where('status', 'active')
        ->where('fungsi_equip','loader')
        ->get();
        $operators = Operator::all();
        $materil = Material::all();
        $locs = Location::all();
        $site = Site::all();
        $times = Time::all();
        $truck = Factor::all();
        $shift = Shift::all();
        $hauler = Equipment::where('status', 'active')
        ->where('fungsi_equip','hauler')
        ->get();
        $problem = Problem::all();
        return view('ritasi.create', compact('problem','operators','load','materil','locs','site','times','truck','shift','hauler'));

    }



    public function store(Request $request)
    {

        $messages = [
        'detail.required' =>  'Tidak Boleh Kosong',
        'ritase.required' => 'Ritasi Wajib Diisi',
        'ritase.numeric'=> 'Ritasi Wajib Angka',
        'distance.required'=> 'Distance Wajib Diisi',
        'distance.required'=> 'Distance Wajib Angka',
        'dumping.required' => 'Tidak Boleh Kosong',

    ];
        $this-> validate($request, [
            'sitecode' => 'required',
            'date' => 'required|date',
            'shift' => 'required',
            'time' => 'required',
            'nikloader' => 'required',
            'oploader' => 'required',
            'nikhauler' => 'required',
            'ophauler' => 'required',
            'codeloader' => 'required',
            'modelloader' => 'required',
            'codehauler' => 'required',
            'modelhauler' => 'required',
            'block' => 'required',
            'pit' => 'required',
            'distance' => 'required|numeric',
            'ritase' => 'required|numeric',
            'material' => 'required',
            'submaterial' => 'required',
            'factor' => 'required',
            'detail' => 'required',
            'dumping' => 'required',

        ],$messages);

        $ritasi = new Ritasi();

        $ritasi->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $ritasi->date = $request->date;
        $ritasi->shift = $request->shift;
        $ritasi->time = json_decode($request->get('time'), true)['time'];
        $ritasi->nikloader = $request->nikloader;
        $ritasi->oploader = json_decode($request->get('oploader'), true)['optnama'];
        $ritasi->nikhauler = $request->nikhauler;
        $ritasi->ophauler = json_decode($request->get('ophauler'), true)['optnama'];
        $ritasi->codeloader = json_decode($request->get('codeloader'), true)['codeunit'];
        $ritasi->modelloader = $request->modelloader;
        $ritasi->codehauler = json_decode($request->get('codehauler'), true)['codeunit'];
        $ritasi->modelhauler = $request->modelhauler;
        $ritasi->block = json_decode($request->get('block'), true)['block'];
        $ritasi->pit = $request->pit;
        $ritasi->distance = $request->distance;
        $ritasi->ritase = $request->ritase;
        $ritasi->material = $request->material;
        $ritasi->submaterial = json_decode($request->get('submaterial'), true)['submaterial'];
        $ritasi->factor = json_decode($request->get('factor'), true)['prodproblem'];
        $ritasi->detail = $request->detail;
        $ritasi->dumping = $request->dumping;
        $ritasi->produksi = $request->produksi;
        $ritasi->adjustment = $request->adjustment;
        $ritasi->distvol = $request->distvol;

        $ritasi->save();

        session()->flash('success','Data Ritasi Berhasil Ditambah');

       return redirect()->route('ritasi.index');
    }

    public function edit($id)
    {

        $ritasi = Ritasi::find($id);

        $load = Equipment::where('status', 'active')
        ->where('fungsi_equip','loader')
        ->get();
        $operators = Operator::all();
        $materil = Material::all();
        $locs = Location::all();
        // $site = Site::all();
        $times = Time::all();
        $truck = Factor::all();
        $shift = Shift::all();
        $hauler = Equipment::where('status', 'active')
        ->where('fungsi_equip','hauler')
        ->get();
        $problem = Problem::all();
        return view('ritasi.edit', compact('ritasi','problem','operators','load','materil','locs','times','truck','shift','hauler'));

    }

    public function update(Request $request, $id)


    {

        $messages = [
            'detail.required' =>  'Tidak Boleh Kosong',
            'ritase.required' => 'Ritasi Wajib Diisi',
            'ritase.numeric'=> 'Ritasi Wajib Angka',
            'distance.required'=> 'Distance Wajib Diisi',
            'distance.required'=> 'Distance Wajib Angka',
            'dumping.required' => 'Tidak Boleh Kosong',

        ];
            $this-> validate($request, [
                'sitecode' => 'required',
                'date' => 'required|date',
                'shift' => 'required',
                'time' => 'required',
                'nikloader' => 'required',
                'oploader' => 'required',
                'nikhauler' => 'required',
                'ophauler' => 'required',
                'codeloader' => 'required',
                'modelloader' => 'required',
                'codehauler' => 'required',
                'modelhauler' => 'required',
                'block' => 'required',
                'pit' => 'required',
                'distance' => 'required|numeric',
                'ritase' => 'required|numeric',
                'material' => 'required',
                'submaterial' => 'required',
                'factor' => 'required',
                'detail' => 'required',
                'dumping' => 'required',

            ],$messages);

            $ritasi = new Ritasi();

            $ritasi->sitecode = $request->sitecode;
            $ritasi->date = $request->date;
            $ritasi->shift = $request->shift;
            $ritasi->time = json_decode($request->get('time'), true)['time'];
            $ritasi->nikloader = $request->nikloader;
            $ritasi->oploader = json_decode($request->get('oploader'), true)['optnama'];
            $ritasi->nikhauler = $request->nikhauler;
            $ritasi->ophauler = json_decode($request->get('ophauler'), true)['optnama'];
            $ritasi->codeloader = json_decode($request->get('codeunit'), true)['codeloader'];
            $ritasi->modelloader = $request->modelloader;
            $ritasi->codehauler = json_decode($request->get('codeunit'), true)['codehauler'];
            $ritasi->modelhauler = $request->modelhauler;
            $ritasi->block = json_decode($request->get('block'), true)['block']??'';
            $ritasi->pit = $request->pit;
            $ritasi->distance = $request->distance;
            $ritasi->ritase = $request->ritase;
            $ritasi->material = $request->material;
            $ritasi->submaterial = json_decode($request->get('submaterial'), true)['submaterial'];
            $ritasi->factor = json_decode($request->get('factor'), true)['prodproblem'];
            $ritasi->detail = $request->detail;
            $ritasi->dumping = $request->dumping;
            $ritasi->produksi = $request->produksi;
            $ritasi->adjustment = $request->adjustment;
            $ritasi->distvol = $request->distvol;

            $ritasi->save();

            session()->flash('success','Input Ritasi Berhasil');


       return redirect()->route('ritasi.index');
    }

    public function destroy($id)
    {
        $ritasi = Ritasi::find($id);

        $ritasi->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('ritasi.index');
}
}
