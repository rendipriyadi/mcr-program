<?php

namespace App\Http\Controllers;

use App\Models\PlanProduksi;
use App\Models\Site;
use Illuminate\Http\Request;

class PlanProduksiController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:planproduksi-list|planproduksi-create|planproduksi-edit|planproduksi-delete', ['only' => ['index','show']]);
         $this->middleware('permission:planproduksi-create', ['only' => ['create','store']]);
         $this->middleware('permission:planproduksi-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:planproduksi-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $cari = $request->get('search');
        $planprods = PlanProduksi::where('tanggal_planproduksi','LIKE','%'.$cari.'%')

        ->orWhere ( 'sitecode', 'LIKE', '%' . $cari . '%' )
        ->latest()
        ->paginate(10);
        return View ('planproduksi.index',compact('planprods','request')

        );
    }
    public function create()
    {
         $site = Site::all();

        return View('planproduksi.create', compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_planproduksi' => ['required'],
            'plan_site' => ['required'],
            'plan_budget' => ['required'],



        ],
            [
                'sitecode.required' => 'Site tidak Boleh Kosong',
                'tanggal_planproduksi.required' => 'Tanggal Tidak Boleh Kosong',
                'plan_site.required' => 'Plan Site tidak Boleh Kosong',
                'plan_budget.required' => 'Plan Budget Tidak Boleh Kosong',



            ]);

        $planproduksi = new PlanProduksi();

        $planproduksi->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planproduksi->tanggal_planproduksi = $request->tanggal_planproduksi;
        $planproduksi->plan_site = $request->plan_site;
        $planproduksi->plan_budget = $request->plan_budget;




        $planproduksi->save();

        session()->flash('success','Data Plan Produksi Berhasil Ditambah');

       return redirect()->route('planproduksi.index');
    }

    public function edit($id)
    {

        $planproduksi = PlanProduksi::find($id);
        $site = Site::all();

        return View('planproduksi.edit', compact('site','planproduksi'));
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required'],
            'tanggal_planproduksi' => ['required'],
            'plan_site' => ['required'],
            'plan_budget' => ['required'],



        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',

                'plan_site.required' => 'Code tidak Boleh Kosong',
                'plan_budget.required' => 'Qty Tidak Boleh Kosong',

            ]);

        $planproduksi = PlanProduksi::find($id);

        // $planproduksi->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planproduksi->tanggal_planproduksi = $request->tanggal_planproduksi;
        $planproduksi->plan_site = $request->plan_site;
        $planproduksi->plan_budget = $request->plan_budget;




        $planproduksi->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('planproduksi.index');
    }

    public function destroy($id)
    {
        $planproduksi = PlanProduksi::find($id);

        $planproduksi->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('planproduksi.index');
    }
}
