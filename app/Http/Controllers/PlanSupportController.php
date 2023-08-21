<?php

namespace App\Http\Controllers;

use App\Models\Equipment;

use App\Models\PlanSupport;
use App\Models\Site;
use Illuminate\Http\Request;

class PlanSupportController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:plansupport-list|plansupport-create|plansupport-edit|plansupport-delete', ['only' => ['index','show']]);
         $this->middleware('permission:plansupport-create', ['only' => ['create','store']]);
         $this->middleware('permission:plansupport-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:plansupport-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $plansupps = PlanSupport::get();
        return view('plansupport.index',compact('plansupps'));
    }
    public function create()
    {
         $site = Site::all();
         $codemodelsupport = Equipment::select('modelunit', 'status', 'fungsi_equip') // Add other necessary columns here
         ->where('status', 'active')
         ->where('fungsi_equip', 'support')
         ->groupBy('modelunit', 'status', 'fungsi_equip') // Group by all selected columns
         ->get();

        return View('plansupport.create', compact('site','codemodelsupport'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required'],
            'tanggal_plansupport' => ['required'],
            'codemodelsupport' => ['required'],
            'qty_plansupport' => ['required'],
            'pa_plansupport' => ['required'],
            'ua_plansupport' => ['required'],





        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',

                'codemodelsupport.required' => 'Code tidak Boleh Kosong',
                'qty_plansupport.required' => 'Qty Tidak Boleh Kosong',
                'pa_plansupport.required' => 'PA tidak Boleh Kosong',
                'ua_plansupport.required' => 'UA Tidak Boleh Kosong',




            ]);

        $plansupport = new PlanSupport();

        $plansupport->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $plansupport->tanggal_plansupport = $request->tanggal_plansupport;
        $plansupport->codemodelsupport = json_decode($request->get('codemodelsupport'), true)['modelunit'];
        $plansupport->qty_plansupport = $request->qty_plansupport;
        $plansupport->pa_plansupport = $request->pa_plansupport;
        $plansupport->ua_plansupport = $request->ua_plansupport;





        $plansupport->save();

        session()->flash('success','Data Plan Support Berhasil Ditambah');

       return redirect()->route('plansupport.index');
    }

    public function edit($id)
    {

        $plansupport = PlanSupport::find($id);
        $site = Site::all();
        $codemodelsupport = Equipment::select('modelunit', 'status', 'fungsi_equip') // Add other necessary columns here
         ->where('status', 'active')
         ->where('fungsi_equip', 'support')
         ->groupBy('modelunit', 'status', 'fungsi_equip') // Group by all selected columns
         ->get();
        return View('plansupport.edit', compact('site','codemodelsupport','plansupport'));
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required'],
            'tanggal_plansupport' => ['required'],
            'codemodelsupport' => ['required'],
            'qty_plansupport' => ['required'],
            'pa_plansupport' => ['required'],
            'ua_plansupport' => ['required'],



        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',

                'codemodelloader.required' => 'Code tidak Boleh Kosong',
                'qty_planloader.required' => 'Qty Tidak Boleh Kosong',
                'pa_planloader.required' => 'PA tidak Boleh Kosong',
                'ua_planloader.required' => 'UA Tidak Boleh Kosong',
                'pty_planloader.required' => 'Pty tidak Boleh Kosong',

            ]);

        $plansupport = PlanSupport::find($id);

    // $plansupport->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
    $plansupport->tanggal_plansupport = $request->tanggal_plansupport;
        $plansupport->codemodelsupport = json_decode($request->get('codemodelsupport'), true)['modelunit'];
        $plansupport->qty_plansupport = $request->qty_plansupport;
        $plansupport->pa_plansupport = $request->pa_plansupport;
        $plansupport->ua_plansupport = $request->ua_plansupport;




        $plansupport->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('plansupport.index');
    }

    public function destroy($id)
    {
        $plansupport = PlanSupport::find($id);

        $plansupport->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('plansupport.index');
    }
}
