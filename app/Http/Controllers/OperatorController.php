<?php

namespace App\Http\Controllers;

use App\DataTables\OperatorDataTable;
use App\Exports\OperatorExport;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Operator;
use App\Imports\OperatorImport;
use App\Models\Site;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use Yajra\DataTables\DataTables;

class OperatorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:operator-list|operator-create|operator-edit|operator-delete', ['only' => ['index','show']]);
         $this->middleware('permission:operator-create', ['only' => ['create','store']]);
         $this->middleware('permission:operator-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:operator-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $cari = $request->get('search');
        $user = auth()->id();

        $operators = Operator::where('optnama','LIKE','%'.$cari.'%')

        ->orwhere('id', $user)
        ->paginate(10);


        return view('operator.index', compact('operators'));
    }




    public function export()
	{
		return Excel::download(new OperatorExport, 'Operator.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataOperator',$namaFile);
        // import data
        $import = Excel::import(new OperatorImport, public_path('/DataOperator/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('operator.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('operator.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}



    public function create()
    {
        return View('operator.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'optnik.required' => 'NIK Wajib Diisi ',
            'optnik.numeric' => 'NIK Harus Angka',
            'optnama.required' => 'Nama Wajib Diisi ',
            'optversati.required'=>'Versatility Wajib Diisi',
            'optsite.required' => 'Site Wajib Diisi ',
            'no_telp.required' => 'Site Wajib Diisi '
        ];


        $this-> validate($request, [
            'optnik' => 'required|numeric',
            'optnama' => 'required',
            'optversati' => 'required',
            'optsite' => 'required',
            'no_telp' => 'required|numeric',
        ], $messages);

        $operator = new Operator();

        $operator->optnik = $request->optnik;
        $operator->optnama = $request->optnama;
        $operator->optversati = $request->optversati;
        $operator->optsite = $request->optsite;
        $operator->no_telp = $request->no_telp;

        $operator->save();

        session()->flash('success','Data Operator Ditambah');

       return redirect()->route('operator.index');
    }

    public function edit($optnik)
    {

        $operator = Operator::find($optnik);

       return View('operator.edit',[
            'operator' =>$operator,
    ]);
    }

    public function update(Request $request, $optnik)

    {
        $this-> validate($request, [
            'optnik' => ['required'],
            'optnama' => ['required',],
            'optversati' => ['required'],
            'optsite' => ['required'],
            'no_telp' => ['required'],
        ],
        [
            'optnik.numeric' => 'NIK Harus Berupa Angka'
        ],
            [
                'optnik.required' => 'NIK tidak Boleh Kosong',
                'optnama.required' => 'Nama Tidak Boleh Kosong',
                'optversati.required' => 'Versatility Tidak Boleh Kosong',
                'optsite.required' => 'Site Tidak Boleh Kosong',
                'no_telp.numeric' => 'No Telepon Tidak Boleh Kosong',
            ]);

        $operator = Operator::find($optnik);

        $operator->optnik = $request->optnik;
        $operator->optnama = $request->optnama;
        $operator->optversati = $request->optversati;
        $operator->optsite = $request->optsite;
        $operator->no_telp = $request->no_telp;

        $operator->save();

        session()->flash('info','Data Operator Diupdate');

       return redirect()->route('operator.index');
    }

    public function destroy($optnik)
    {
        $operator = Operator::find($optnik);

        $operator->delete();

        session()->flash('danger','Data Operator Dihapus');

        return redirect()->route('operator.index');
    }
}
