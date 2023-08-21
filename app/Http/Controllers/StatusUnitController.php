<?php

namespace App\Http\Controllers;

use App\Exports\StatusUnitExport;
use App\Imports\StatusUnitImport;
use App\Models\Dedicated;
use App\Models\DownTime;
use App\Models\Equipcategori;
use App\Models\Equipment;
use App\Models\Hauler;
use App\Models\Operator;
use App\Models\Shift;
use App\Models\Site;
use App\Models\StatusUnit;
use App\Models\Time;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StatusUnitController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:statusunit-list|statusunit-create|statusunit-edit|statusunit-delete', ['only' => ['index','show']]);
         $this->middleware('permission:statusunit-create', ['only' => ['create','store']]);
         $this->middleware('permission:statusunit-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:statusunit-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $cari = $request->get('search');
        $statusunits = StatusUnit::where('statusmodel','LIKE','%'.$cari.'%')
        ->orWhere ( 'statuscnunit', 'LIKE', '%' . $cari . '%' )
        ->orWhere ( 'sitecode', 'LIKE', '%' . $cari . '%' )
        ->orWhere ( 'statusunitdate', 'LIKE', '%' . $cari . '%' )
        ->orWhere ( 'statusopt', 'LIKE', '%' . $cari . '%' )
        ->orWhere ( 'statusnikopt', 'LIKE', '%' . $cari . '%' )
        ->orWhere ( 'sitecode', 'LIKE', '%' . $cari . '%' )
        ->latest()
        ->paginate(15);
        return View ('statusunit.index',compact('statusunits','request')

        );
    }
    public function export()
	{
		return Excel::download(new StatusUnitExport, 'statusunit.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataStatusUnit',$namaFile);
        // import data
        $import = Excel::import(new StatusUnitImport, public_path('/DataStatusUnit/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('statusunit.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('statusunit.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
    {
        $haul = Equipment::where('status', 'active')->get();
        $operators = Operator::all();
        $category = Equipcategori::all();
        $dedicated = Dedicated::all();
        $site = Site::all();
        $shift = Shift::all();
        $downtime = DownTime::all();

        return view('statusunit.create', compact('operators','haul','downtime','category','dedicated','site','shift'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required'],
            'statusunitdate' => ['required',],
            'statusopt' => ['required'],
            'statusnikopt' => ['required'],
            'statuscnunit' => ['required'],
            'statusmodel' => ['required'],
            'statusitemcat' => ['required'],
            'statuscategory' => ['required'],
            'statusstart' => ['required',],
            'statusend' => ['required'],
            'statushour' => ['required',],
            'statusshift' => ['required'],
            'statuscode' => ['required',],
            'dedicated' => ['required'],
            'statusremark' => ['required'],
        ]);

        $statusunit = new StatusUnit();

        $statusunit->sitecode= json_decode($request->get('sitecode'), true)['sitecode'];
        $statusunit->statusunitdate = $request->statusunitdate;
        $statusunit->statusopt = json_decode($request->get('statusopt'), true)['optnama'];
        $statusunit->statusnikopt = $request->statusnikopt;
        $statusunit->statuscnunit = json_decode($request->get('statuscnunit'), true)['codeunit'];
        $statusunit->statusmodel = $request->statusmodel;
        $statusunit->statusitemcat = json_decode($request->get('statusitemcat'), true)['dtcategory'];
        $statusunit->statuscategory = $request->statuscategory;
        $statusunit->statusstart = $request->statusstart;
        $statusunit->statusend = $request->statusend;
        $statusunit->statushour = $request->statushour;
        $statusunit->statusshift = json_decode($request->get('statusshift'), true)['shift'];
        $statusunit->statuscode = $request->statuscode;

        $statusunit->dedicated = json_decode($request->get('dedicated'), true)['dedicateddesc'];
        $statusunit->statusremark = $request->statusremark;


        $statusunit->save();

        session()->flash('success','Data Status Unit Ditambah');

       return redirect()->route('statusunit.index');
    }

    public function edit($id)
    {

        $statusunit = StatusUnit::find($id);
        $haul = Hauler::all();
        $operators = Operator::all();
        $category = Equipcategori::all();
        $dedicated = Dedicated::all();

        $shift = Shift::all();
        $downtime = DownTime::all();

        return view('statusunit.edit', compact('statusunit','operators','haul','downtime','category','dedicated','shift'));

    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required'],
            'statusunitdate' => ['required',],
            'statusopt' => ['required'],
            'statusnikopt' => ['required'],
            'statuscnunit' => ['required'],
            'statusmodel' => ['required'],
            'statusitemcat' => ['required'],
            'statuscategory' => ['required'],
            'statusstart' => ['required',],
            'statusend' => ['required'],
            'statushour' => ['required',],
            'statusshift' => ['required'],
            'statuscode' => ['required',],
            'dedicated' => ['required'],
            'statusremark' => ['required'],
        ]);


        $statusunit = StatusUnit::find($id);


        // $statusunit->sitecode= json_decode($request->get('sitecode'), true)['sitecode'];
        $statusunit->statusunitdate = $request->statusunitdate;
        $statusunit->statusopt = json_decode($request->get('statusopt'), true)['optnama'];
        $statusunit->statusnikopt = $request->statusnikopt;
        $statusunit->statuscnunit = json_decode($request->get('statuscnunit'), true)['codehauler'];
        $statusunit->statusmodel = $request->statusmodel;
        $statusunit->statusitemcat = json_decode($request->get('statusitemcat'), true)['dtcategory'];
        $statusunit->statuscategory = $request->statuscategory;
        $statusunit->statusstart = $request->statusstart;
        $statusunit->statusend = $request->statusend;
        $statusunit->statushour = $request->statushour;
        $statusunit->statusshift = json_decode($request->get('statusshift'), true)['shift'];
        $statusunit->statuscode = $request->statuscode;

        $statusunit->dedicated = json_decode($request->get('dedicated'), true)['dedicateddesc'];
        $statusunit->statusremark = $request->statusremark;


        $statusunit->save();



        session()->flash('info','Data Status Unit Diupdate');

       return redirect()->route('statusunit.index');
    }

    public function destroy($id)
    {
        $statusunit = StatusUnit::find($id);

        $statusunit->delete();

        session()->flash('danger','Data Status Unit Dihapus');

        return redirect()->route('statusunit.index');
    }

}
