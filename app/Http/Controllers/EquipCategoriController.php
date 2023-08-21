<?php

namespace App\Http\Controllers;

use App\Models\Equipcategori;
use App\Models\Site;
use Illuminate\Http\Request;

class EquipCategoriController extends Controller
{ function __construct()
    {
         $this->middleware('permission:setup.equipcategori-list|setup.equipcategori-create|setup.equipcategori-edit|setup.equipcategori-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.equipcategori-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.equipcategori-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.equipcategori-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View('setup.equipcategori.index',[
            'equipcates' => Equipcategori::all(),
        ]);
    }
    public function create()


    {
        $site = Site::all();

        return View('setup.equipcategori.create',compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'categoricode' => ['required',],
            'categoridesc' => ['required',],


        ],
            [
                'categoricode.required' => 'Code tidak Boleh Kosong',
                'categoridesc.required' => 'Description Tidak Boleh Kosong',


            ]);

        $equipcategori = new Equipcategori();

        $equipcategori->sitecode =json_decode($request->get('sitecode'), true)['sitecode'];
        $equipcategori->categoricode = $request->categoricode;
        $equipcategori->categoridesc = $request->categoridesc;




        $equipcategori->save();

        session()->flash('success','Data Ditambah');

       return redirect()->route('equipcategori.index');
    }

    public function edit($id)
    {

        $equipcategori = Equipcategori::find($id);

       return View('setup.equipcategori.edit',[
            'equipcategori' =>$equipcategori,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'categoricode' => ['required',],
            'categoridesc' => ['required',],


        ],
            [
                'categoricode.required' => 'Code tidak Boleh Kosong',
                'categoridesc.required' => 'Deskripsi Tidak Boleh Kosong',


            ]);

        $equipcategori = Equipcategori::find($id);

        $equipcategori->categoricode = $request->categoricode;
        $equipcategori->categoridesc= $request->categoridesc;




        $equipcategori->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('setup.equipcategori.index');
    }

    public function destroy($id)
    {
        $equipcategori = Equipcategori::find($id);

        $equipcategori->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('setup.equipcategori.index');
    }
}
