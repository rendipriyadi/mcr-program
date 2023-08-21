<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Hauler;
use App\Models\PlanHauler;
use App\Models\Shift;
use App\Models\Site;
use Illuminate\Http\Request;

class PlanHaulerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:planhauler-list|planhauler-create|planhauler-edit|planhauler-delete', ['only' => ['index','show']]);
         $this->middleware('permission:planhauler-create', ['only' => ['create','store']]);
         $this->middleware('permission:planhauler-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:planhauler-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $planhauls = PlanHauler::get();
        return view('planhauler.index',compact('planhauls'));
    }
    public function create()
    {
         $site = Site::all();
         $codemodelhauler = Equipment::select('modelunit', 'status', 'fungsi_equip') // Add other necessary columns here
         ->where('status', 'active')
         ->where('fungsi_equip', 'hauler')
         ->groupBy('modelunit', 'status', 'fungsi_equip') // Group by all selected columns
         ->get();
        return View('planhauler.create', compact('site','codemodelhauler'));
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
            'mohh' => ['required'],
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

                'prod_haulerob.required' => 'Produksi Hauler OB tidak Boleh Kosong',



            ]);

        $planhauler = new PlanHauler();

        $planhauler->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planhauler->tanggal_planhauler = $request->tanggal_planhauler;
        $planhauler->codemodelhauler = json_decode($request->get('codemodelhauler'), true)['modelunit'];
        $planhauler->qty_planhauler = $request->qty_planhauler;
        $planhauler->pa_planhauler = $request->pa_planhauler;
        $planhauler->ua_planhauler = $request->ua_planhauler;
        $planhauler->pty_planhauler = $request->pty_planhauler;
        $planhauler->mohh = $request->mohh;
        $planhauler->prod_haulerob = $request->prod_haulerob;




        $planhauler->save();

        session()->flash('success','Data Plan Hauler Berhasil Ditambah');

       return redirect()->route('planhauler.index');
    }

    public function edit($id)
    {

        $planhauler = PlanHauler::find($id);
        $site = Site::all();
        $codemodelhauler = Equipment::select('modelunit', 'status', 'fungsi_equip') // Add other necessary columns here
        ->where('status', 'active')
        ->where('fungsi_equip', 'hauler')
        ->groupBy('modelunit', 'status', 'fungsi_equip') // Group by all selected columns
        ->get();
       return View('planhauler.edit', compact('site','codemodelhauler','planhauler'));
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
            'mohh' => ['required',],

            'prod_haulerob' => ['required',],


        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',

                'codemodelhauler.required' => 'Code tidak Boleh Kosong',
                'qty_planhauler.required' => 'Qty Tidak Boleh Kosong',
                'pa_planhauler.required' => 'PA tidak Boleh Kosong',
                'ua_planhauler.required' => 'UA Tidak Boleh Kosong',
                'pty_planhauler.required' => 'Pty tidak Boleh Kosong',
                'mohh.required' => 'MoHH tidak Boleh Kosong',

                'prod_haulerob.required' => 'Produksi Hauler OB tidak Boleh Kosong',

            ]);

        $planhauler = PlanHauler::find($id);

        // $planhauler->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planhauler->tanggal_planhauler = $request->tanggal_planhauler;
        $planhauler->codemodelhauler = json_decode($request->get('codemodelhauler'), true)['modelunit'];
        $planhauler->qty_planhauler = $request->qty_planhauler;
        $planhauler->pa_planhauler = $request->pa_planhauler;
        $planhauler->ua_planhauler = $request->ua_planhauler;
        $planhauler->mohh = $request->mohh;

        $planhauler->prod_haulerob = $request->prod_haulerob;



        $planhauler->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('planhauler.index');
    }

    public function destroy($id)
    {
        $planhauler = PlanHauler::find($id);

        $planhauler->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('planhauler.index');
    }
}
