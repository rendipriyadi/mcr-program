<?php

namespace App\Http\Controllers;

use App\Exports\HourMeterExport;
use App\Imports\HourMeterImport;
use App\Models\Equipment;
use App\Models\MeterHour;
use App\Models\Operator;
use App\Models\Shift;
use App\Models\Site;
use App\Models\Time;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HourMeterController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:hourmeter-list|hourmeter-create|hourmeter-edit|hourmeter-delete', ['only' => ['index','show']]);
         $this->middleware('permission:hourmeter-create', ['only' => ['create','store']]);
         $this->middleware('permission:hourmeter-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:hourmeter-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return View('hourmeter.index',[
            'hourmeters'=> MeterHour::latest()->paginate(25)
        ]);
    }
    public function export()
	{
		return Excel::download(new HourMeterExport, 'HourMeter.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $namaFile = $file->getClientOriginalName();
        $file->move('DataHourMeter',$namaFile);
        // import data
        $import = Excel::import(new HourMeterImport, public_path('/DataHourMeter/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('hourmeter.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('hourmeter.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
    {
        $site = Site::all();
        $shift = Shift::all();
        $equiphm = Equipment::all();
        $operators = Operator::all();
        return View('hourmeter.create',compact('site','shift','equiphm','operators'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'datehm' => ['required',],
            'shift' => ['required'],
            'nikopthm' => ['required'],
            'opthm' => ['required'],
            'modelhm' => ['required'],
            'cnunithm' => ['required'],
            'hmawal' => ['required'],
            'hmakhir' => ['required'],
            'totalhm' => ['required'],
            'remarkhm' => ['required']

            ]);

        $hourmeter = new MeterHour();

        $hourmeter->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $hourmeter->datehm = $request->datehm;
        $hourmeter->shift = json_decode($request->get('shift'), true)['shift'];
        $hourmeter->nikopthm = $request ->nikopthm;
        $hourmeter->opthm =json_decode($request->get('opthm'), true)['optnama'];
        $hourmeter->modelhm = $request->modelhm;
        $hourmeter->cnunithm = json_decode($request->get('cnunithm'), true)['codeunit'];
        $hourmeter->hmawal = $request->hmawal;
        $hourmeter->hmakhir = $request->hmakhir;
        $hourmeter->totalhm = $request->totalhm;
        $hourmeter->remarkhm = $request->remarkhm;

        $hourmeter->save();

        session()->flash('success','Data HourMeter Ditambah');

       return redirect()->route('hourmeter.index');
    }
    public function edit($id)
    {

        $hourmeter = MeterHour::find($id);
        $site = Site::all();
        $shift = Shift::all();
        $equiphm = Equipment::all();
        $operators = Operator::all();
        return View('hourmeter.edit',compact('site','shift','equiphm','operators','hourmeter'));
    }

public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required',],
            'datehm' => ['required',],
            'shift' => ['required'],
            'nikopthm' => ['required'],
            'opthm' => ['required'],
            'modelhm' => ['required'],
            'cnunithm' => ['required'],
            'hmawal' => ['required'],
            'hmakhir' => ['required'],
            'totalhm' => ['required'],
            'remarkhm' => ['required']

            ]);

        $hourmeter = MeterHour::find($id);


        // $hourmeter->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $hourmeter->datehm = $request->datehm;
        $hourmeter->shift = json_decode($request->get('shift'), true)['shift'];
        $hourmeter->nikopthm = $request ->nikopthm;
        $hourmeter->opthm =json_decode($request->get('opthm'), true)['optnama'];
        $hourmeter->modelhm = $request->modelhm;
        $hourmeter->cnunithm = json_decode($request->get('cnunithm'), true)['codeunit'];
        $hourmeter->hmawal = $request->hmawal;
        $hourmeter->hmakhir = $request->hmakhir;
        $hourmeter->totalhm = $request->totalhm;
        $hourmeter->remarkhm = $request->remarkhm;

        $hourmeter->save();

        session()->flash('info','Data HourMeter Diupdate');

       return redirect()->route('hourmeter.index');
    }

    public function destroy($id)
    {
        $hourmeter = MeterHour::find($id);

        $hourmeter->delete();

        session()->flash('danger','Data HourMeter Dihapus');

        return redirect()->route('hourmeter.index');
    }
}
