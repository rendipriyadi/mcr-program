<?php

namespace App\Http\Controllers;

use App\Exports\PayloadExport;
use App\Imports\PayloadImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PayloadController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:payload-list|payload-create|payload-edit|payload-delete', ['only' => ['index','show']]);
         $this->middleware('permission:payload-create', ['only' => ['create','store']]);
         $this->middleware('permission:payload-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:payload-delete', ['only' => ['destroy']]);
    }
    public function export()
	{
		return Excel::download(new PayloadExport, 'Payload.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');




        $namaFile = $file->getClientOriginalName();
        $file->move('DataPayload',$namaFile);
        // import data
        $import = Excel::import(new PayloadImport, public_path('/DataPayload/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('payload.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('payload.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
}
