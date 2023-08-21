<?php

namespace App\Http\Controllers;

use App\Exports\TimeExport;
use App\Imports\TimeImport;
use App\Models\Time;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TimeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.time-list|setup.time-create|setup.time-edit|setup.time-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.time-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.time-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.time-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View('setup.time.index',[
            'times' => Time::paginate(5)
        ]);
    }
    public function export()
	{
		return Excel::download(new TimeExport, 'time.xlsx');
	}

    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataTime',$namaFile);
        // import data
        $import = Excel::import(new TimeImport, public_path('/DataTime/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('time.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('time.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
    {
        return View('setup.time.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'categori' => ['required',],
            'time' => ['required',],
            'jam' => ['required'],
            'shift' => ['required'],
            'calculation' => ['required'],
            'number' => ['required'],
        ],
            [
                'categori.required' => 'Kategori tidak Boleh Kosong',
                'time.required' => 'Time Tidak Boleh Kosong',
                'jam.required' => 'Jam Tidak Boleh Kosong',
                'shift.required' => 'Shift Tidak Boleh Kosong',
                'calculation.required' => 'Calculation Tidak Boleh Kosong',
                'number.required' => 'Number Tidak Boleh Kosong',
            ]);

        $time = new Time();

        $time->categori = $request->categori;
        $time->time = $request->time;
        $time->jam = $request->jam;
        $time->shift = $request->shift;
        $time->calculation = $request->calculation;
        $time->number = $request->number;


        $time->save();

        session()->flash('success','Data Time Ditambah');

       return redirect()->route('time.index');
    }

    public function edit($id)
    {

        $time = Time::find($id);

       return View('setup.time.edit',[
            'time' =>$time,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'categori' => ['required',],
            'time' => ['required',],
            'jam' => ['required'],
            'shift' => ['required'],
            'calculation' => ['required'],
            'number' => ['required'],
        ],
            [
                'categori.required' => 'Code tidak Boleh Kosong',
                'time.required' => 'Deskripsi Tidak Boleh Kosong',
                'jam.required' => 'Alamat Tidak Boleh Kosong',
                'shift.required' => 'No.Telepon Tidak Boleh Kosong',
                'calculation.required' => 'Calculation Tidak Boleh Kosong',
                'number.required' => 'Number Tidak Boleh Kosong',
            ]);

        $time = Time::find($id);

        $time->categori = $request->categori;
        $time->time= $request->time;
        $time->jam = $request->jam;
        $time->shift= $request->shift;
        $time->calculation = $request->calculation;
        $time->number= $request->number;



        $time->save();

        session()->flash('info','Data Time Diupdate');

       return redirect()->route('time.index');
    }

    public function destroy($id)
    {
        $time = Time::find($id);

        $time->delete();

        session()->flash('danger','Data Time Dihapus');

        return redirect()->route('time.index');
    }
}
