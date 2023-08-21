<?php

namespace App\Http\Controllers;

use App\Models\Hauler;
use App\Models\PlanDistance;
use App\Models\Site;
use Illuminate\Http\Request;

class PlanDistanceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:plandistance-list|plandistance-create|plandistance-edit|plandistance-delete', ['only' => ['index','show']]);
         $this->middleware('permission:plandistance-create', ['only' => ['create','store']]);
         $this->middleware('permission:plandistance-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:plandistance-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $cari = $request->get('search');
        $plandists = PlanDistance::where('tanggal_plandistance','LIKE','%'.$cari.'%')

        ->orWhere ( 'sitecode', 'LIKE', '%' . $cari . '%' )
        ->latest()
        ->paginate(10);
        return View ('plandistance.index',compact('plandists','request')

        );
    }
    public function create()
    {
         $site = Site::all();

        return View('plandistance.create', compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_plandistance' => ['required',],
            'plan_distanceob' => ['required',],


            'plan_distancecoal' => ['required',],


        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',
                'tanggal_plandistance.required' => 'Tanggal Tidak Boleh Kosong',
                'plan_distanceob.required' => 'Plan Distance OB tidak Boleh Kosong',

                'plan_distancecoal.required' => 'Plan Distance Coal Tidak Boleh Kosong',




            ]);

        $plandistance = new PlanDistance();

        $plandistance->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $plandistance->tanggal_plandistance = $request->tanggal_plandistance;
        $plandistance->plan_distanceob = $request->plan_distanceob;

        $plandistance->plan_distancecoal = $request->plan_distancecoal;





        $plandistance->save();

        session()->flash('success','Data Plan Distance Berhasil Ditambah');

       return redirect()->route('plandistance.index');
    }

    public function edit($id)
    {

        $plandistance = PlanDistance::find($id);
        $site = Site::all();
        return View('plandistance.edit', compact('site','plandistance'));

    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_plandistance' => ['required',],
            'plan_distanceob' => ['required',],

            'plan_distancecoal' => ['required',],


        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',
                'tanggal_plandistance.required' => 'Tanggal Tidak Boleh Kosong',
                'plan_distanceob.required' => 'Plan Distance OB tidak Boleh Kosong',


                'plan_distancecoal.required' => 'Plan Distance Coal Tidak Boleh Kosong',




            ]);

        $plandistance = PlanDistance::find($id);

        // $plandistance->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $plandistance->tanggal_plandistance = $request->tanggal_plandistance;
        $plandistance->plan_distanceob = $request->plan_distanceob;

        $plandistance->plan_distancecoal = $request->plan_distancecoal;




        $plandistance->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('plandistance.index');
    }

    public function destroy($id)
    {
        $plandistance = PlanDistance::find($id);

        $plandistance->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('plandistance.index');
    }
}
