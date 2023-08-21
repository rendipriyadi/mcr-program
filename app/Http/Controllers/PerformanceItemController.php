<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use Illuminate\Http\Request;

class PerformanceItemController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.performance-list|setup.performance-create|setup.performance-edit|setup.performance-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.performance-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.performance-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.performance-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return View ('setup.performance.index', [
            'performance' => Performance::get(),
        ]);
    }

    public function create()
    {
        return View('performance.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'performancecode' => ['required'],
            'performancedesc' => ['required'],

        ],
            [
                'performancecode.required' => 'NIK tidak Boleh Kosong',
                'performancedesc.required' => 'Nama Tidak Boleh Kosong',

            ]);

        $performance = new Performance();

        $performance->performancecode = $request->performancecode;
        $performance->performancedesc = $request->performancedesc;



        $performance->save();

        session()->flash('success','Data Performance Ditambah');

       return redirect()->route('performance.index');
    }

    public function edit($id)
    {

        $performance = Performance::find($id);

       return View('performance.edit',[
            'performance' =>$performance,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'performancecode' => ['required'],
            'performancedesc' => ['required'],

        ],
            [
                'performancecode.required' => 'Tidak Boleh Kosong',
                'performancedesc.required' => 'Tidak Boleh Kosong',

            ]);

        $performance = Performance::find($id);

        $performance->performancecode = $request->performancecode;
        $performance->performancedesc = $request->performancedesc;



        $performance->save();

        session()->flash('info','Data Performance Diupdate');

       return redirect()->route('performance.index');
    }

    public function destroy($id)
    {
        $performance = Performance::find($id);

        $performance->delete();

        session()->flash('danger','Data Performance Dihapus');

        return redirect()->route('performance.index');
    }
}
