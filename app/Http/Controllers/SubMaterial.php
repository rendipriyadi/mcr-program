<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use Illuminate\Http\Request;

class SubMaterial extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.submaterial-list|setup.submaterial-create|setup.submaterial-edit|setup.submaterial-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.submaterial-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.submaterial-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.submaterial-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return View ('setup.submaterial.index', [
            'submaterial' => Sub::get(),
        ]);
    }

    public function create()
    {
        return View('submaterial.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'subdesc' => ['required'],
            'subcode' => ['required',],
            'materialcode' => ['required'],
            'materialfactor' => ['required'],
        ],
            [
                'subdesc.required' => 'Description tidak Boleh Kosong',
                'subcode.required' => 'Code Tidak Boleh Kosong',
                'materialcode.required' => 'Material Code Tidak Boleh Kosong',
                'materialfactor.required' => 'Material Factor Tidak Boleh Kosong',
            ]);

        $submaterial = new Sub();

        $submaterial->subdesc = $request->subdesc;
        $submaterial->subcode = $request->subcode;
        $submaterial->materialcode = $request->materialcode;
        $submaterial->materialfactor = $request->materialfactor;


        $submaterial->save();

        session()->flash('success','Data SubMaterial Ditambah');

       return redirect()->route('submaterial.index');
    }

    public function edit($id)
    {

        $submaterial = Sub::find($id);

       return View('submaterial.edit',[
            'submaterial' =>$submaterial,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'subdesc' => ['required'],
            'subcode' => ['required',],
            'materialcode' => ['required'],
            'materialfactor' => ['required'],
        ],
            [
                'subdesc.required' => 'Description tidak Boleh Kosong',
                'subcode.required' => 'Code Tidak Boleh Kosong',
                'materialcode.required' => 'Material Code Tidak Boleh Kosong',
                'materialfactor.required' => 'Material Factor Tidak Boleh Kosong',
            ]);

        $submaterial = Sub::find($id);

        $submaterial->subdesc = $request->subdesc;
        $submaterial->subcode = $request->subcode;
        $submaterial->materialcode = $request->materialcode;
        $submaterial->materialfactor = $request->materialfactor;


        $submaterial->save();

        session()->flash('info','Data SubMaterial Diupdate');

       return redirect()->route('submaterial.index');
    }

    public function destroy($id)
    {
        $submaterial = Sub::find($id);

        $submaterial->delete();

        session()->flash('danger','Data SubMaterial Dihapus');

        return redirect()->route('submaterial.index');
    }
}
