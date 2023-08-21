<?php

namespace App\Http\Controllers;

use App\Exports\CoalExposeExport;
use App\Imports\CoalExposeImport;
use App\Models\Coal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CoalExposeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:coal-list|coal-create|coal-edit|coal-delete', ['only' => ['index','show']]);
         $this->middleware('permission:coal-create', ['only' => ['create','store']]);
         $this->middleware('permission:coal-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:coal-delete', ['only' => ['destroy']]);
    }
    public function index()
    {

        return view('coal.index',[
            'coal' => Coal::get(),
        ]);

    }
    public function export()
	{
		return Excel::download(new CoalExposeExport, 'CoalExpose.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');




        $namaFile = $file->getClientOriginalName();
        $file->move('DataCoalExpose',$namaFile);
        // import data
        $import = Excel::import(new CoalExposeImport, public_path('/DataCoalExpose/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('coal.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('coal.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
}
