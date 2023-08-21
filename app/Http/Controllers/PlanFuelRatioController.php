<?php

namespace App\Http\Controllers;

use App\Models\Hauler;
use App\Models\PlanFuelRatio;
use App\Models\Site;
use Illuminate\Http\Request;

class PlanFuelRatioController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:planratio-list|planratio-create|planratio-edit|planratio-delete', ['only' => ['index','show']]);
         $this->middleware('permission:planratio-create', ['only' => ['create','store']]);
         $this->middleware('permission:planratio-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:planratio-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $cari = $request->get('search');
        $planratios = PlanFuelRatio::where('tanggal_planratio','LIKE','%'.$cari.'%')

        ->orWhere ( 'sitecode', 'LIKE', '%' . $cari . '%' )
        ->latest()
        ->paginate(10);
        return View ('planratio.index',compact('planratios','request')

        );
    }
    public function create()
    {
         $site = Site::all();
        $codemodelhauler = Hauler::all();
        return View('planratio.create', compact('site','codemodelhauler'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_planhauler' => ['required',],
            'codemodelhauler' => ['required',],
            'qty_planhauler' => ['required',],
            'pa_planhauler' => ['required',],
            'ua_planhauler' => ['required',],
            'pty_planhauler' => ['required',],
            'prod_planhauler' => ['required',],
            'prod_haulerob' => ['required',],



        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',
                'tanggal_planhauler.required' => 'Description Tidak Boleh Kosong',
                'codemodelhauler.required' => 'Code tidak Boleh Kosong',
                'qty_planhauler.required' => 'Qty Tidak Boleh Kosong',
                'pa_planhauler.required' => 'PA tidak Boleh Kosong',
                'ua_planhauler.required' => 'UA Tidak Boleh Kosong',
                'pty_planhauler.required' => 'Pty tidak Boleh Kosong',
                'prod_planhauler.required' => 'Produksi Tidak Boleh Kosong',
                'prod_haulerob.required' => 'Produksi Hauler OB tidak Boleh Kosong',



            ]);

        $planratio = new PlanFuelRatio();

        $planratio->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planratio->tanggal_planhauler = $request->tanggal_planhauler;
        $planratio->codemodelhauler = json_decode($request->get('codemodelhauler'), true)['codemodelhauler'];
        $planratio->qty_planhauler = $request->qty_planhauler;
        $planratio->pa_planhauler = $request->pa_planhauler;
        $planratio->ua_planhauler = $request->ua_planhauler;
        $planratio->pty_planhauler = $request->pty_planhauler;
        $planratio->prod_planhauler = $request->prod_planhauler;
        $planratio->prod_haulerob = $request->prod_haulerob;




        $planratio->save();

        session()->flash('success','Data Plan Ratio Berhasil Ditambah');

       return redirect()->route('planratio.index');
    }

    public function edit($id)
    {

        $planratio = PlanFuelRatio::find($id);

       return View('planratio.edit',[
            'planratio' =>$planratio,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_planhauler' => ['required',],
            'codemodelhauler' => ['required',],
            'qty_planhauler' => ['required',],
            'pa_planhauler' => ['required',],
            'ua_planhauler' => ['required',],
            'pty_planhauler' => ['required',],
            'prod_planhauler' => ['required',],
            'prod_haulerob' => ['required',],


        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',

                'codemodelhauler.required' => 'Code tidak Boleh Kosong',
                'qty_planhauler.required' => 'Qty Tidak Boleh Kosong',
                'pa_planhauler.required' => 'PA tidak Boleh Kosong',
                'ua_planhauler.required' => 'UA Tidak Boleh Kosong',
                'pty_planhauler.required' => 'Pty tidak Boleh Kosong',
                'prod_planhauler.required' => 'Produksi Tidak Boleh Kosong',
                'prod_haulerob.required' => 'Produksi Hauler OB tidak Boleh Kosong',

            ]);

        $planratio = PlanFuelRatio::find($id);

        $planratio->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planratio->tanggal_planhauler = $request->tanggal_planhauler;
        $planratio->codemodelhauler = json_decode($request->get('codemodelhauler'), true)['codemodelhauler'];
        $planratio->qty_planhauler = $request->qty_planhauler;
        $planratio->pa_planhauler = $request->pa_planhauler;
        $planratio->ua_planhauler = $request->ua_planhauler;
        $planratio->pty_planhauler = $request->pty_planhauler;
        $planratio->prod_planhauler = $request->prod_planhauler;
        $planratio->prod_haulerob = $request->prod_haulerob;



        $planratio->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('planratio.index');
    }

    public function destroy($id)
    {
        $planratio = PlanFuelRatio::find($id);

        $planratio->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('planratio.index');
    }
}
