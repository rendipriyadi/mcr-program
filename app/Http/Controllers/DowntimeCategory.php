<?php

namespace App\Http\Controllers;

use App\Models\DownTime;
use App\Models\Site;
use Illuminate\Http\Request;

class DowntimeCategory extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.downtime-list|setup.downtime-create|setup.downtime-edit|setup.downtime-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.downtime-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.downtime-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.downtime-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return View ('setup.downtime.index',
    [
        'downtimes' => DownTime::paginate(10),
    ]);

}
public function create()
    {
        $site = Site::all();
        return View('setup.downtime.create', compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'dtcategory' => ['required',],
            'sitecode' => ['required',],


        ],
            [
                'dtcategory.required' => 'Down Time Category tidak Boleh Kosong',
                'sitecode.required' => 'Site Tidak Boleh Kosong',


            ]);

        $downtime = new DownTime();

        $downtime->dtcategory = $request->dtcategory;
        $downtime->sitecode = $request->sitecode;



        $downtime->save();

        session()->flash('success','Data Down Time Ditambah');

       return redirect()->route('downtime.index');
    }

    public function edit($id)
    {

        $downtime = DownTime::find($id);

        $site = Site::all();
        return View('setup.downtime.edit', compact('site','downtime'));

    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'dtcategory' => ['required',],
            'sitecode' => ['required',],


        ],
            [
                'dtcategory.required' => 'Down Time Category tidak Boleh Kosong',
                'sitecode.required' => 'Site Tidak Boleh Kosong',


            ]);

        $downtime = DownTime::find($id);

        $downtime->dtcategory = $request->dtcategory;
        $downtime->sitecode= $request->sitecode;




        $downtime->save();

        session()->flash('info','Data Down Time Diupdate');

       return redirect()->route('downtime.index');
    }

    public function destroy($id)
    {
        $downtime = DownTime::find($id);

        $downtime->delete();

        session()->flash('danger','Data Down Time Dihapus');

        return redirect()->route('downtime.index');
    }
}
