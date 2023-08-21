<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Loader;

use App\Models\PlanLoader;
use App\Models\Site;
use DASPRiD\EnumTest\Planet;
use Illuminate\Http\Request;

class PlanLoaderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:planloader-list|planloader-create|planloader-edit|planloader-delete', ['only' => ['index','show']]);
         $this->middleware('permission:planloader-create', ['only' => ['create','store']]);
         $this->middleware('permission:planloader-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:planloader-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){
        $planloads = PlanLoader::get();
        return view('planloader.index',compact('planloads'));
    }
    public function create()
    {
         $site = Site::all();
         $codemodelloader = Equipment::select('modelunit', 'status', 'fungsi_equip') // Add other necessary columns here
         ->where('status', 'active')
         ->where('fungsi_equip', 'loader')
         ->groupBy('modelunit', 'status', 'fungsi_equip') // Group by all selected columns
         ->get();
        return View('planloader.create', compact('site','codemodelloader'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_planloader' => ['required'],
            'codemodelloader' => ['required'],
            'qty_planloader' => ['required'],
            'pa_planloader' => ['required'],
            'ua_planloader' => ['required'],
            'pty_planloader' => ['required'],
            'mohh_planloader' => ['required'],

            'prod_loaderob' => ['required'],



        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',
                'tanggal_planloader.required' => 'Description Tidak Boleh Kosong',
                'codemodelloader.required' => 'Code tidak Boleh Kosong',
                'qty_planloader.required' => 'Qty Tidak Boleh Kosong',
                'pa_planloader.required' => 'PA tidak Boleh Kosong',
                'ua_planloader.required' => 'UA Tidak Boleh Kosong',
                'pty_planloader.required' => 'Pty tidak Boleh Kosong',
                'mohh_planloader.required' => 'Pty tidak Boleh Kosong',
                'prod_loaderob.required' => 'Produksi Loader OB tidak Boleh Kosong',



            ]);

        $planloader = new PlanLoader();

        $planloader->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planloader->tanggal_planloader = $request->tanggal_planloader;
        $planloader->codemodelloader = json_decode($request->get('codemodelloader'), true)['codemodelloader'];
        $planloader->qty_planloader = $request->qty_planloader;
        $planloader->pa_planloader = $request->pa_planloader;
        $planloader->ua_planloader = $request->ua_planloader;
        $planloader->pty_planloader = $request->pty_planloader;
        $planloader->mohh_planloader = $request->mohh_planloader;

        $planloader->prod_loaderob = $request->prod_loaderob;




        $planloader->save();

        session()->flash('success','Data Plan Loader Berhasil Ditambah');

       return redirect()->route('planloader.index');
    }

    public function edit($id)
    {

        $planloader = PlanLoader::find($id);
        $site = Site::all();
        $codemodelloader = Equipment::select('modelunit', 'status', 'fungsi_equip') // Add other necessary columns here
        ->where('status', 'active')
        ->where('fungsi_equip', 'loader')
        ->groupBy('modelunit', 'status', 'fungsi_equip') // Group by all selected columns
        ->get();
        return View('planloader.edit', compact('site','codemodelloader','planloader'));

    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required'],
            'tanggal_planloader' => ['required'],
            'codemodelloader' => ['required'],
            'qty_planloader' => ['required'],
            'pa_planloader' => ['required'],
            'ua_planloader' => ['required'],
            'pty_planloader' => ['required'],
            'mohh_planloader' => ['required'],
            'prod_loaderob' => ['required'],


        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',

                'codemodelloader.required' => 'Code tidak Boleh Kosong',
                'qty_planloader.required' => 'Qty Tidak Boleh Kosong',
                'pa_planloader.required' => 'PA tidak Boleh Kosong',
                'ua_planloader.required' => 'UA Tidak Boleh Kosong',
                'pty_planloader.required' => 'Pty tidak Boleh Kosong',
                'mohh_planloader.required' => 'Pty tidak Boleh Kosong',

                'prod_loaderob.required' => 'Produksi Loader OB tidak Boleh Kosong',

            ]);

        $planloader = PlanLoader::find($id);

        // $planloader->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planloader->tanggal_planloader = $request->tanggal_planloader;
        $planloader->codemodelloader = json_decode($request->get('codemodelloader'), true)['codemodelloader'];
        $planloader->qty_planloader = $request->qty_planloader;
        $planloader->pa_planloader = $request->pa_planloader;
        $planloader->ua_planloader = $request->ua_planloader;
        $planloader->pty_planloader = $request->pty_planloader;
        $planloader->mohh_planloader = $request->mohh_planloader;
        $planloader->prod_loaderob = $request->prod_loaderob;



        $planloader->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('planloader.index');
    }

    public function destroy($id)
    {
        $planloader = PlanLoader::find($id);

        $planloader->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('planloader.index');
    }
}
