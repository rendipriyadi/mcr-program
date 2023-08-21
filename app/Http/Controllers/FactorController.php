<?php

namespace App\Http\Controllers;

use App\Models\SiteFactor;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:sitefactor-list|sitefactor-create|sitefactor-edit|sitefactor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:sitefactor-create', ['only' => ['create','store']]);
         $this->middleware('permission:sitefactor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sitefactor-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View ('factor.index',[
            'sitefactor' => SiteFactor::get(),
        ]);
    }
    public function create()
    {
        return View('factor.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitefactorcode' => ['required',],
            'sitecode' => ['required',],
            'factorcode' => ['required'],
            'startdate' => ['required'],
            'enddate' => ['required'],

        ],
            [
                'sitefactorcode.required' => 'Tidak Boleh Kosong',
                'sitecode.required' => 'Tidak Boleh Kosong',
                'factorcode.required' => 'Tidak Boleh Kosong',
                'startdate.required' => 'Tidak Boleh Kosong',
                'enddate.required' => 'Tidak Boleh Kosong',

            ]);

        $sitefactor = new SiteFactor();

        $sitefactor->sitefactorcode = $request->sitefactorcode;
        $sitefactor->sitecode = $request->sitecode;
        $sitefactor->factorcode = $request->factorcode;
        $sitefactor->startdate = $request->startdate;
        $sitefactor->enddate = $request->enddate;

        $sitefactor->save();

        session()->flash('success','Data SiteFactor Ditambah');

       return redirect()->route('factor.index');
    }

    public function edit($id)
    {

        $sitefactor = SiteFactor::find($id);

       return View('factor.edit',[
            'sitefactor' =>$sitefactor,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
          'sitefactorcode' => ['required',],
            'sitecode' => ['required',],
            'factorcode' => ['required'],
            'startdate' => ['required'],
            'enddate' => ['required'],

        ],
            [
                'sitefactorcode.required' => 'Tidak Boleh Kosong',
                'sitecode.required' => 'Tidak Boleh Kosong',
                'factorcode.required' => 'Tidak Boleh Kosong',
                'startdate.required' => 'Tidak Boleh Kosong',
                'enddate.required' => 'Tidak Boleh Kosong',

            ]);

        $sitefactor = SiteFactor::find($id);


        $sitefactor->sitefactorcode = $request->sitefactorcode;
        $sitefactor->sitecode = $request->sitecode;
        $sitefactor->factorcode = $request->factorcode;
        $sitefactor->startdate = $request->startdate;
        $sitefactor->enddate = $request->enddate;


        $sitefactor->save();

        session()->flash('info','Data SiteFactor Diupdate');

       return redirect()->route('factor.index');
    }

    public function destroy($id)
    {
        $sitefactor = SiteFactor::find($id);

        $sitefactor->delete();

        session()->flash('danger','Data SiteFactor Dihapus');

        return redirect()->route('factor.index');
    }
}
