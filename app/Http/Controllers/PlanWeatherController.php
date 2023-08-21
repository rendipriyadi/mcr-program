<?php

namespace App\Http\Controllers;

use App\Models\Hauler;
use App\Models\PlanWeather;
use App\Models\Site;
use Illuminate\Http\Request;

class PlanWeatherController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:planweather-list|planweather-create|planweather-edit|planweather-delete', ['only' => ['index','show']]);
         $this->middleware('permission:planweather-create', ['only' => ['create','store']]);
         $this->middleware('permission:planweather-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:planweather-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $cari = $request->get('search');
        $planweats = PlanWeather::where('tanggal_planweather','LIKE','%'.$cari.'%')

        ->orWhere ( 'sitecode', 'LIKE', '%' . $cari . '%' )
        ->latest()
        ->paginate(10);
        return View ('planweather.index',compact('planweats','request')

        );
    }
    public function create()
    {
         $site = Site::all();

        return View('planweather.create', compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_planweather' => ['required',],
            'plan_rain' => ['required',],
            'plan_slippery' => ['required',],
            'plan_total' => ['required',],
            'plan_rainfall' => ['required',],




        ],
            [
                'sitecode.required' => 'Site tidak Boleh Kosong',
                'tanggal_planweather.required' => 'Tanggal Tidak Boleh Kosong',
                'plan_rain.required' => 'Plan Rain tidak Boleh Kosong',
                'plan_slippery.required' => 'Plan Slippery Tidak Boleh Kosong',
                'plan_total.required' => 'Plan Total tidak Boleh Kosong',
                'plan_rainfall.required' => 'Plan Rainfall Tidak Boleh Kosong',



            ]);

        $planweather = new PlanWeather();

        $planweather->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planweather->tanggal_planweather = $request->tanggal_planweather;
        $planweather->plan_rain = $request->plan_rain;
        $planweather->plan_slippery = $request->plan_slippery;
        $planweather->plan_total = $request->plan_total;
        $planweather->plan_rainfall = $request->plan_rainfall;





        $planweather->save();

        session()->flash('success','Data Plan Weather Berhasil Ditambah');

       return redirect()->route('planweather.index');
    }

    public function edit($id)
    {

        $planweather = PlanWeather::find($id);
        $site = Site::all();

        return View('planweather.edit', compact('site','planweather'));

    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required',],
            'tanggal_planweather' => ['required',],
            'plan_rain' => ['required',],
            'plan_slippery' => ['required',],
            'plan_total' => ['required',],
            'plan_rainfall' => ['required',],



        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',

                'plan_rain.required' => 'Code tidak Boleh Kosong',
                'plan_slippery.required' => 'Qty Tidak Boleh Kosong',
                'plan_total.required' => 'PA tidak Boleh Kosong',
                'plan_rainfall.required' => 'UA Tidak Boleh Kosong',


            ]);

        $planweather = PlanWeather::find($id);

        // $planweather->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $planweather->tanggal_planweather = $request->tanggal_planweather;
        $planweather->plan_rain = $request->plan_rain;
        $planweather->plan_slippery = $request->plan_slippery;
        $planweather->plan_total = $request->plan_total;
        $planweather->plan_rainfall = $request->plan_rainfall;




        $planweather->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('planweather.index');
    }

    public function destroy($id)
    {
        $planweather = PlanWeather::find($id);

        $planweather->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('planweather.index');
    }
}
