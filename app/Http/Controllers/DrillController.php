<?php

namespace App\Http\Controllers;

use App\Exports\DrillExport;
use App\Imports\DrillImport;
use App\Models\DataDrill;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DrillController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:drill-list|drill-create|drill-edit|drill-delete', ['only' => ['index','show']]);
         $this->middleware('permission:drill-create', ['only' => ['create','store']]);
         $this->middleware('permission:drill-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:drill-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View ('drill.index',[
            'drill' => DataDrill::get(),
        ]);
    }
    public function export()
	{
		return Excel::download(new DrillExport, 'Drill.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $namaFile = $file->getClientOriginalName();
        $file->move('DataDrill',$namaFile);
        // import data
        $import = Excel::import(new DrillImport, public_path('/DataDrill/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('drill.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('drill.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
{
    return View('drill.create');
}

public function store(Request $request)
{

    $this-> validate($request, [
        'activitycode' => ['required',],
        'activitydesc' => ['required',],


    ],
        [
            'activitycode.required' => 'Code Data Drill tidak Boleh Kosong',
            'activitydesc.required' => 'Description Tidak Boleh Kosong',


        ]);

    $drill = new DataDrill();

    $drill->activitycode = $request->activitycode;
    $drill->activitydesc = $request->activitydesc;




    $drill->save();

    session()->flash('success','Data Equipment Model Ditambah');

   return redirect()->route('drill.index');
}

public function edit($id)
{

    $drill = DataDrill::find($id);

   return View('drill.edit',[
        'drill' =>$drill,
]);
}

public function update(Request $request, $id)

{
    $this-> validate($request, [
        'activitycode' => ['required',],
        'activitydesc' => ['required',],


    ],
        [
            'activitycode.required' => 'Code tidak Boleh Kosong',
            'activitydesc.required' => 'Deskripsi Tidak Boleh Kosong',


        ]);

    $drill = DataDrill::find($id);

    $drill->activitycode = $request->activitycode;
    $drill->activitydesc= $request->activitydesc;
    $drill->typecode = $request->typecode;



    $drill->save();

    session()->flash('info','Data Diupdate');

   return redirect()->route('drill.index');
}

public function destroy($id)
{
    $drill = DataDrill::find($id);

    $drill->delete();

    session()->flash('danger','Data Dihapus');

    return redirect()->route('activity.index');
}
}
