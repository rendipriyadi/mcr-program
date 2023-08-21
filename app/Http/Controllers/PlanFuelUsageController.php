<?php

namespace App\Http\Controllers;

use App\Models\Hauler;
use App\Models\PlanFuelUsage;
use App\Models\Site;
use Illuminate\Http\Request;

class PlanFuelUsageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:planusage-list|planusage-create|planusage-edit|planusage-delete', ['only' => ['index','show']]);
         $this->middleware('permission:planusage-create', ['only' => ['create','store']]);
         $this->middleware('permission:planusage-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:planusage-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $cari = $request->get('search');
        $planusages = PlanFuelUsage::where('tanggal_planusage','LIKE','%'.$cari.'%')

        ->orWhere ( 'sitecode', 'LIKE', '%' . $cari . '%' )
        ->latest()
        ->paginate(10);
        return View ('planusage.index',compact('planusages','request')

        );
    }
    public function create()
    {
         $site = Site::all();

        return View('planusage.create', compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_planusage' => ['required',],
            'fuelusage' => ['required',],



        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',
                'tanggal_planusage.required' => ' Tidak Boleh Kosong',
                'fuelusage.required' => 'Code tidak Boleh Kosong',




            ]);

        $planusage = new PlanFuelUsage();

        $planusage->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planusage->tanggal_planusage = $request->tanggal_planusage;
        $planusage->fuelusage = $request->fuelusage;





        $planusage->save();

        session()->flash('success','Data Plan Fuel Usage Berhasil Ditambah');

       return redirect()->route('planusage.index');
    }

    public function edit($id)
    {

        $planusage = PlanFuelUsage::find($id);

       return View('planusage.edit',[
            'planusage' =>$planusage,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_planusage' => ['required',],
            'fuelusage' => ['required',],


        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',

                'fuelusage.required' => 'Fuel Usage tidak Boleh Kosong',


            ]);

        $planusage = PlanFuelUsage::find($id);

        $planusage->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planusage->tanggal_planusage = $request->tanggal_planusage;
        $planusage->fuelusage = json_decode($request->get('fuelusage'), true)['fuelusage'];




        $planusage->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('planusage.index');
    }

    public function destroy($id)
    {
        $planusage = PlanFuelUsage::find($id);

        $planusage->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('planusage.index');
    }
}
