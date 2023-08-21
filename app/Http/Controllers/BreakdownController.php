<?php

namespace App\Http\Controllers;

use App\Exports\BreakdownExport;
use App\Imports\BreakdownImport;
use App\Models\Breakdown;
use App\Models\DownTime;
use App\Models\Equipment;
use App\Models\Shift;
use App\Models\Site;
use App\Models\Time;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BreakdownController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:breakdown-list|breakdown-create|breakdown-edit|breakdown-delete', ['only' => ['index','show']]);
         $this->middleware('permission:breakdown-create', ['only' => ['create','store']]);
         $this->middleware('permission:breakdown-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:breakdown-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        return View('breakdown.index',[
            'breaks' => Breakdown::get(),
        ]);
    }
    public function export()
	{
		return Excel::download(new BreakdownExport, 'Breakdown.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');




        $namaFile = $file->getClientOriginalName();
        $file->move('DataBreakdown',$namaFile);
        // import data
        $import = Excel::import(new BreakdownImport, public_path('/DataBreakdown/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('breakdown.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('breakdown.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
    {



        $site = Site::all();
        $shift = Shift::all();
        $downtime = DownTime::all();
        $equip = Equipment::where('status', 'active')->get();
        return view('breakdown.create', compact('site','shift','downtime','equip'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required'],
            'breakdate' => ['required',],
            'breakshift' => ['required'],
            'breaktype' => ['required'],
            'breakmodel' => ['required'],
            'breakcnunit' => ['required'],
            'bdawal' => ['required'],
            'bdakhir' => ['required'],
            'breaktotal' => ['required'],
            'bdcategory' => ['required'],
            'breakstatus' => ['required'],


            'bddesc' => ['required'],

        ]);

        $breakdown = new Breakdown();

        $breakdown->sitecode= json_decode($request->get('sitecode'), true)['sitecode'];
        $breakdown->breakdate = $request->breakdate;
        $breakdown->breakshift= json_decode($request->get('breakshift'), true)['shift'];
        $breakdown->breaktype = $request->breaktype;
        $breakdown->breakmodel = $request->breakmodel;
        $breakdown->breakcnunit= json_decode($request->get('breakcnunit'), true)['codeunit'];
        $breakdown->bdawal = $request->bdawal;
        $breakdown->bdakhir = $request->bdakhir;
        $breakdown->breaktotal = $request->breaktotal;
        $breakdown->bdcategory= json_decode($request->get('bdcategory'), true)['dtcategory'];

        $breakdown->breakstatus = $request->breakstatus;

        $breakdown->bddesc = $request->bddesc;


        $breakdown->save();

        session()->flash('success','Data Breakdown Berhasil Ditambahkan');

       return redirect()->route('breakdown.index');
    }
    public function edit($id)
    {

        $breakdown = Breakdown::find($id);
        $site = Site::all();
        $shift = Shift::all();
        $downtime = DownTime::all();
        $equip = Equipment::where('status', 'active')->get();
        return view('breakdown.edit', compact('site','shift','downtime','equip','breakdown'));
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required'],
            'breakdate' => ['required',],
            'breakshift' => ['required'],
            'breaktype' => ['required'],
            'breakmodel' => ['required'],
            'breakcnunit' => ['required'],
            'bdawal' => ['required'],
            'bdakhir' => ['required'],
            'breaktotal' => ['required'],
            'bdcategory' => ['required'],
            'breakstatus' => ['required'],


            'bddesc' => ['required'],

        ]);
        $breakdown = Breakdown::find($id);

        // $breakdown->sitecode= json_decode($request->get('sitecode'), true)['sitecode'];
        $breakdown->breakdate = $request->breakdate;
        $breakdown->breakshift= json_decode($request->get('breakshift'), true)['shift'];
        $breakdown->breaktype = $request->breaktype;
        $breakdown->breakmodel = $request->breakmodel;
        $breakdown->breakcnunit= json_decode($request->get('breakcnunit'), true)['codeunit'];
        $breakdown->bdawal = $request->bdawal;
        $breakdown->bdakhir = $request->bdakhir;
        $breakdown->breaktotal = $request->breaktotal;
        $breakdown->bdcategory= json_decode($request->get('bdcategory'), true)['dtcategory'];

        $breakdown->breakstatus = $request->breakstatus;

        $breakdown->bddesc = $request->bddesc;

        $breakdown->save();

        session()->flash('info','Data Breakdown Diupdate');

       return redirect()->route('breakdown.index');
    }

    public function destroy($id)
    {
        $breakdown = Breakdown::find($id);

        $breakdown->delete();

        session()->flash('danger','Data Breakdown Dihapus');

        return redirect()->route('breakdown.index');
    }

}
