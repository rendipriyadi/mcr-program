<?php

namespace App\Http\Controllers;

use App\Exports\ShiftCodeExport;
use App\Models\Shift;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ShiftCode extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.shift-list|setup.shift-create|setup.shift-edit|setup.shift-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.shift-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.shift-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.shift-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View('setup.shift.index',[
            'shifts' => Shift::paginate(10),
        ]);
    }
    // public function export()
    // {
    //     return Excel::download(new ShiftCodeExport, 'ShiftCode.xlsx');
    // }
    // public function import( Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx'
    //     ]);

    //     $file = $request->file('file');
    //     $namaFile = $file->getClientOriginalName();
    //     $file->move('DataProductionProblem',$namaFile);
    //     // import data
    //     $import = Excel::import(new ProductionProblemImport, public_path('/DataProductionProblem/'.$namaFile));

    //     //remove from server


    //     if($import) {
    //         //redirect
    //         return redirect()->route('problem.index')->with(['success' => 'Data Berhasil Diimport!']);
    //     } else {
    //         //redirect
    //         return redirect()->route('problem.index')->with(['error' => 'Data Gagal Diimport!']);
    //     }
    // }
    public function create()
    {
        return View('setup.shift.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'shiftcode' => ['required',],
            'shift' => ['required',],
            'startshift' => ['required',],
            'endshift' => ['required',],

        ],
            [
                'shiftcode.required' => 'Code tidak Boleh Kosong',
                'shift.required' => 'Tipe Tidak Boleh Kosong',
                'startshift.required' => 'Start tidak Boleh Kosong',
                'endshift.required' => 'End Tidak Boleh Kosong',

            ]);

        $shift = new Shift  ();

        $shift->shiftcode = $request->shiftcode;
        $shift->shift = $request->shift;
        $shift->startshift = $request->startshift;
        $shift->endshift = $request->endshift;



        $shift->save();

        session()->flash('success','Data Shift Ditambah');

       return redirect()->route('shift.index');
    }

    public function edit($id)
    {

        $shift = Shift  ::find($id);

       return View('setup.shift.edit',[
            'shift' =>$shift,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'shiftcode' => ['required',],
            'shift' => ['required',],
            'startshift' => ['required',],
            'endshift' => ['required',],

        ],
            [
                'shiftcode.required' => 'Code tidak Boleh Kosong',
                'shift.required' => 'Tipe Tidak Boleh Kosong',
                'startshift.required' => 'Start tidak Boleh Kosong',
                'endshift.required' => 'End Tidak Boleh Kosong',

            ]);

        $shift = Shift  ::find($id);

        $shift->shiftcode = $request->shiftcode;
        $shift->shift= $request->shift;
        $shift->startshift= $request->startshift;
        $shift->endshift= $request->endshift;



        $shift->save();

        session()->flash('info','Data Shift Diupdate');

       return redirect()->route('shift.index');
    }

    public function destroy($id)
    {
        $shift = Shift::find($id);

        $shift->delete();

        session()->flash('danger','Data Shift Dihapus');

        return redirect()->route('shift.index');
    }
}
