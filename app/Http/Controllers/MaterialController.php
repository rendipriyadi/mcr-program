<?php

namespace App\Http\Controllers;

use App\Exports\MaterialExport;
use App\Imports\MaterialImport;
use App\Models\Material;
use App\Models\Site;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MaterialController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.material-list|setup.material-create|setup.material-edit|setup.material-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.material-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.material-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.material-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View('setup.material.index',[
            'materials' => Material::paginate(10),
        ]);
    }
    public function export()
{
    return Excel::download(new MaterialExport, 'Material.xlsx');
}
public function import( Request $request)
{
    $this->validate($request, [
        'file' => 'required|mimes:csv,xls,xlsx'
    ]);

    $file = $request->file('file');
    $namaFile = $file->getClientOriginalName();
    $file->move('DataMaterial',$namaFile);
    // import data
    $import = Excel::import(new MaterialImport, public_path('/DataMaterial/'.$namaFile));

    //remove from server


    if($import) {
        //redirect
        return redirect()->route('material.index')->with(['success' => 'Data Berhasil Diimport!']);
    } else {
        //redirect
        return redirect()->route('material.index')->with(['error' => 'Data Gagal Diimport!']);
    }

}
    public function create()
    {
        $site = Site::all();

        return View('setup.material.create',compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'material' => ['required',],
            'submaterial' => ['required',],
            'factor' => ['required',],

        ],
            [
                'sitecode.required' => 'Site tidak Boleh Kosong',
                'material.required' => 'Material Tidak Boleh Kosong',
                'submaterial.required' => 'Sub Material tidak Boleh Kosong',
                'factor.required' => 'Factor Tidak Boleh Kosong',

            ]);

        $material = new Material();

        $material->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $material->material = $request->material;
        $material->submaterial = $request->submaterial;
        $material->factor = $request->factor;



        $material->save();

        session()->flash('success','Data Ditambah');

       return redirect()->route('material.index');
    }

    public function edit($id)
    {

        $material = Material::find($id);
        $site = Site::all();

        return View('setup.material.edit',compact('site','material'));
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required',],
            'material' => ['required',],
            'submaterial' => ['required',],
            'factor' => ['required',],

        ],
            [
                'sitecode.required' => 'Site tidak Boleh Kosong',
                'material.required' => 'Material Tidak Boleh Kosong',
                'submaterial.required' => 'Sub Material tidak Boleh Kosong',
                'factor.required' => 'Factor Tidak Boleh Kosong',

            ]);

        $material = Material::find($id);


        // $material->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $material->material = $request->material;
        $material->submaterial = $request->submaterial;
        $material->factor = $request->factor;




        $material->save();

        session()->flash('info','Data Diupdate');

       return redirect()->route('material.index');
    }

    public function destroy($id)
    {
        $material = Material::find($id);

        $material->delete();

        session()->flash('danger','Data Dihapus');

        return redirect()->route('material.index');
    }
}
