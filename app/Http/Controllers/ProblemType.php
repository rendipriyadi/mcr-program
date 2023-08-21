<?php

namespace App\Http\Controllers;

use App\Exports\ProductionProblemExport;
use App\Imports\ProductionProblemImport;
use App\Models\Problem;
use App\Models\Site;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProblemType extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.problem-list|setup.problem-create|setup.problem-edit|setup.problem-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.problem-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.problem-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.problem-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return View ('setup.problem.index', [
            'probs' => Problem::all(),
        ]);
    }

    public function export()
    {
        return Excel::download(new ProductionProblemExport, 'ProductionProblem.xlsx');
    }
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataProductionProblem',$namaFile);
        // import data
        $import = Excel::import(new ProductionProblemImport, public_path('/DataProductionProblem/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('problem.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('problem.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }
    public function create()
    {
        $site = Site::all();
        return View('setup.problem.create', compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [

            'prodproblem' => ['required'],
            'sitecode' => ['required']


        ],
            [

                'prodproblem.required' => 'Tidak Boleh Kosong',
                'sitecode.required' => 'Tidak Boleh Kosong'

            ]);

        $problem = new Problem();

        $problem->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];

        $problem->prodproblem = $request->prodproblem;



        $problem->save();

        session()->flash('success','Data Production Problem Ditambah');

       return redirect()->route('problem.index');
    }

    public function edit($id)
    {

        $problem = Problem::find($id);

        $site = Site::all();
        return View('setup.problem.edit', compact('site','problem'));
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required'],
            'prodproblem' => ['required'],

        ],
            [
                'sitecode.required' => 'tidak Boleh Kosong',
                'prodproblem.required' => 'Tidak Boleh Kosong',

            ]);

        $problem = Problem::find($id);

        $problem->sitecode = $request->sitecode;
        $problem->prodproblem = $request->prodproblem;


        $problem->save();

        session()->flash('info','Data Production Problem Diupdate');

       return redirect()->route('problem.index');
    }

    public function destroy($id)
    {
        $problem = Problem::find($id);
        if ($problem != null) {
        $problem->delete();

        session()->flash('danger','Data Production Problem Dihapus');

            return redirect()->route('problem.index');
    }
}
}
