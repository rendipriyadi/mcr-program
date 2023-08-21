<?php

namespace App\Http\Controllers;

use App\Models\TypeLocation;
use Illuminate\Http\Request;

class LocationType extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.lokasi-list|setup.lokasi-create|setup.lokasi-edit|setup.lokasi-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.lokasi-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.lokasi-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.lokasi-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View('setup.lokasi.index',[
            'lokas' => TypeLocation::paginate(10),
        ]);
    }
    public function create()
    {
        return View('setup.lokasi.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'lokasicode' => ['required',],
            'lokasidesc' => ['required',],


        ],
            [
                'lokasicode.required' => 'Code tidak Boleh Kosong',
                'lokasidesc.required' => 'Description Tidak Boleh Kosong',


            ]);

        $lokasi = new TypeLocation();

        $lokasi->lokasicode = $request->lokasicode;
        $lokasi->lokasidesc = $request->lokasidesc;




        $lokasi->save();

        session()->flash('success','Data Equipment Model Ditambah');

       return redirect()->route('setup.lokasi.index');
    }

    public function edit($id)
    {

        $lokasi = TypeLocation::find($id);

       return View('setup.lokasi.edit',[
            'lokasi' =>$lokasi,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'lokasicode' => ['required',],
            'lokasidesc' => ['required',],


        ],
            [
                'lokasicode.required' => 'Code tidak Boleh Kosong',
                'lokasidesc.required' => 'Deskripsi Tidak Boleh Kosong',


            ]);

        $lokasi = TypeLocation::find($id);

        $lokasi->lokasicode = $request->lokasicode;
        $lokasi->lokasidesc= $request->lokasidesc;




        $lokasi->save();

        session()->flash('info','Data Equipment Model Diupdate');

       return redirect()->route('setup.lokasi.index');
    }

    public function destroy($id)
    {
        $lokasi = TypeLocation::find($id);

        $lokasi->delete();

        session()->flash('danger','Data Equipment Model Dihapus');

        return redirect()->route('setup.lokasi.index');
    }
}
