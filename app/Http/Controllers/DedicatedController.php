<?php

namespace App\Http\Controllers;

use App\Models\Dedicated;
use App\Models\Site;
use Illuminate\Http\Request;

class DedicatedController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.dedicated-list|setup.dedicated-create|setup.dedicated-edit|setup.dedicated-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.dedicated-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.dedicated-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.dedicated-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return View ('setup.dedicated.index',
    [
        'dedicateds' => Dedicated::paginate(10),
    ]);

}
public function create()
    {
        $site = Site::all();
        return View('setup.dedicated.create',compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'dedicatedcode' => ['required',],
            'dedicateddesc' => ['required',],


        ],
            [
                'sitecode.required' => 'Site tidak Boleh Kosong',
                'dedicatedcode.required' => 'Code Dedicated tidak Boleh Kosong',
                'dedicateddesc.required' => 'Description Tidak Boleh Kosong',


            ]);

        $dedicated = new Dedicated();
        $dedicated->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $dedicated->dedicatedcode = $request->dedicatedcode;
        $dedicated->dedicateddesc = $request->dedicateddesc;



        $dedicated->save();

        session()->flash('success','Data Equipment Model Ditambah');

       return redirect()->route('dedicated.index');
    }

    public function edit($id)
    {

        $dedicated = Dedicated::find($id);

       return View('setup.dedicated.edit',[
            'dedicated' =>$dedicated,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'dedicatedcode' => ['required',],
            'dedicateddesc' => ['required',],


        ],
            [
                'dedicatedcode.required' => 'Code tidak Boleh Kosong',
                'dedicateddesc.required' => 'Deskripsi Tidak Boleh Kosong',


            ]);

        $dedicated = Dedicated::find($id);

        $dedicated->dedicatedcode = $request->dedicatedcode;
        $dedicated->dedicateddesc= $request->dedicateddesc;




        $dedicated->save();

        session()->flash('info','Data Dedicated Diupdate');

       return redirect()->route('dedicated.index');
    }

    public function destroy($id)
    {
        $dedicated = Dedicated::find($id);

        $dedicated->delete();

        session()->flash('danger','Data Dedicated Dihapus');

        return redirect()->route('dedicated.index');
    }
}
