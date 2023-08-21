<?php

namespace App\Http\Controllers;

use App\Exports\RainSlipperyExport;
use App\Imports\RainSlipperyImport;
use App\Models\Shift;
use App\Models\Site;
use App\Models\SlipperyRain;
use App\Models\Time;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RainSlipperyController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:rainslippery-list|rainslippery-create|rainslippery-edit|rainslippery-delete', ['only' => ['index','show']]);
         $this->middleware('permission:rainslippery-create', ['only' => ['create','store']]);
         $this->middleware('permission:rainslippery-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:rainslippery-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $cari = $request->get('search');
        $rainslipperys = SlipperyRain::where('rainslipshift','LIKE','%'.$cari.'%')

        ->orWhere ( 'sitecode', 'LIKE', '%' . $cari . '%' )
        ->latest()
        ->paginate(25);
        return View ('rainslippery.index',compact('rainslipperys','request')

        );
    }
    public function export()
	{
		return Excel::download(new RainSlipperyExport, 'RainSlippery.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');




        $namaFile = $file->getClientOriginalName();
        $file->move('DataRainSlippery',$namaFile);
        // import data
        $import = Excel::import(new RainSlipperyImport, public_path('/DataRainSlippery/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('rainslippery.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('rainslippery.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
    {



        $site = Site::all();
        $shift = Shift::all();

        return view('rainslippery.create', compact('site','shift'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required'],
            'rainslipdate' => ['required',],
            'rainslipshift' => ['required'],
            'rainstart' => ['required'],
            'rainend' => ['required'],
            'rainhour' => ['required'],
            'slipperystart' => ['required'],
            'slipperyend' => ['required'],
            'slipperyhour' => ['required'],
            'rainfall' => ['required'],
        ]);

        $rainslippery = new SlipperyRain();

        $rainslippery->sitecode= json_decode($request->get('sitecode'), true)['sitecode'];
        $rainslippery->rainslipdate = $request->rainslipdate;
        $rainslippery->rainslipshift= json_decode($request->get('rainslipshift'), true)['shift'];
        $rainslippery->rainstart = $request->rainstart;
        $rainslippery->rainend = $request->rainend;
        $rainslippery->rainhour = $request->rainhour;
        $rainslippery->slipperystart = $request->slipperystart;
        $rainslippery->slipperyend = $request->slipperyend;
        $rainslippery->slipperyhour = $request->slipperyhour;
        $rainslippery->rainfall = $request->rainfall;


        $rainslippery->save();

        session()->flash('success','Data Rain Dan Slippery Ditambahkan');

       return redirect()->route('rainslippery.index');
    }
    public function edit($id)
    {

        $rainslippery = SlipperyRain::find($id);
        $shift = Shift::all();

        return view('rainslippery.edit', compact('rainslippery','shift'));

    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required'],
            'rainslipdate' => ['required',],
            'rainslipshift' => ['required'],
            'rainstart' => ['required'],
            'rainend' => ['required'],
            'rainhour' => ['required'],
            'slipperystart' => ['required'],
            'slipperyend' => ['required'],
            'slipperyhour' => ['required'],
            'rainfall' => ['required'],

            ]);

        $rainslippery = SlipperyRain::find($id);


        // $rainslippery->sitecode= json_decode($request->get('sitecode'), true)['sitecode'];
        $rainslippery->rainslipdate = $request->rainslipdate;
        $rainslippery->rainslipshift= json_decode($request->get('rainslipshift'), true)['shift'];
        $rainslippery->rainstart = $request->rainstart;
        $rainslippery->rainend = $request->rainend;
        $rainslippery->rainhour = $request->rainhour;
        $rainslippery->slipperystart = $request->slipperystart;
        $rainslippery->slipperyend = $request->slipperyend;
        $rainslippery->slipperyhour = $request->slipperyhour;
        $rainslippery->rainfall = $request->rainfall;


        $rainslippery->save();

        session()->flash('info','Data Rain & Slippery Diupdate');

       return redirect()->route('rainslippery.index');
    }

    public function destroy($id)
    {
        $rainslippery = SlipperyRain::find($id);

        $rainslippery->delete();

        session()->flash('danger','Data Rain & Slippery Dihapus');

        return redirect()->route('rainslippery.index');
    }


}
