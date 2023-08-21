<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentExport;
use App\Imports\EquipmentImport;
use App\Models\Equipment;
use App\Models\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EquipmentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:equipment-list|equipment-create|equipment-edit|equipment-delete', ['only' => ['index','show']]);
         $this->middleware('permission:equipment-create', ['only' => ['create','store']]);
         $this->middleware('permission:equipment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:equipment-delete', ['only' => ['destroy']]);
    }
   public function index()
   {
    $equips = Equipment::get();

    return view('equipment.index', compact('equips'));
}
public function toggleStatus(Request $request, $id)
{
    $equipment = Equipment::findOrFail($id);
    $equipment->status = ($equipment->status === 'active') ? 'inactive' : 'active';
    $equipment->save();

    return redirect()->back();
}
public function export()
{
    return Excel::download(new EquipmentExport, 'Equipment.xlsx');
}
public function import( Request $request)
{
    $this->validate($request, [
        'file' => 'required|mimes:csv,xls,xlsx'
    ]);

    $file = $request->file('file');
    $namaFile = $file->getClientOriginalName();
    $file->move('DataEquipment',$namaFile);
    // import data
    $import = Excel::import(new EquipmentImport, public_path('/DataEquipment/'.$namaFile));

    //remove from server


    if($import) {
        //redirect
        return redirect()->route('equipment.index')->with(['success' => 'Data Berhasil Diimport!']);
    } else {
        //redirect
        return redirect()->route('equipment.index')->with(['error' => 'Data Gagal Diimport!']);
    }

}


   public function create()
   {
        $site = Site::all();

    return view('equipment.create', compact('site'));
   }

   public function store(Request $request)
   {
    $equipment = $request->input('fungsi_equip');

    if ($equipment === 'loader') {
        // Validasi dan simpan data pengguna
        $request->validate([

        'modelunit' => ['required'],
        'codeunit' => ['required'],
        'type' => ['required'],
        'category' => ['required'],
        'status' => ['required'],
        'sitecode' => ['required'],
        [

            'modelunit.required' => 'Tidak Boleh Kosong',
            'codeunit.required' => 'Tidak Boleh Kosong',
            'type.required' => 'Tidak Boleh Kosong',
            'category.required' => 'Tidak Boleh Kosong',
            'status.required' => 'Tidak Boleh Kosong',
            'sitecode.required' => 'Tidak Boleh Kosong',
        ]
           ]);

           $equipment = new Equipment();


           $equipment->modelunit    = $request->modelunit;
           $equipment->codeunit     = $request->codeunit;
           $equipment->type         = $request->type;
           $equipment->category     = $request->category;
           $equipment->status = $request->status;
           $equipment->fungsi_equip = $request->fungsi_equip;
           $equipment->sitecode =  json_decode($request->get('sitecode'), true)['sitecode'];

           $equipment->save();

           session()->flash('success','Data Equipment Ditambah');

          return redirect()->route('equipment.index');

    } elseif ($equipment === 'hauler') {
        // Validasi dan simpan data produk
        $request->validate([
        'modelunit' => ['required'],
        'codeunit' => ['required'],
        'type' => ['required'],
        'category' => ['required'],
        'status' => ['required'],
        'truck_factor' => ['required'],
        'sitecode' => ['required'],
        [

            'modelunit.required' => ' Model Unit Tidak Boleh Kosong',
            'codeunit.required' => 'Code Unit Tidak Boleh Kosong',
            'type.required' => 'Type Tidak Boleh Kosong',
            'category.required' => 'Categori Tidak Boleh Kosong',
            'status.required' => 'Status Equipment Tidak Boleh Kosong',
            'trcuk_factor.required' => 'Truck Factor Tidak Boleh Kosong',
            'sitecode.required' => 'Site Tidak Boleh Kosong',
        ]
           ]);

           $equipment = new Equipment();


           $equipment->modelunit    = $request->modelunit;
           $equipment->codeunit     = $request->codeunit;
           $equipment->type         = $request->type;
           $equipment->category     = $request->category;
           $equipment->status = $request->status;
           $equipment->fungsi_equip = $request->fungsi_equip;
           $equipment->truck_factor = $request->truck_factor;
           $equipment->sitecode =  json_decode($request->get('sitecode'), true)['sitecode'];

           $equipment->save();

           session()->flash('success','Data Equipment Ditambah');

          return redirect()->route('equipment.index');
    } elseif ($equipment === 'support') {
        // Validasi dan simpan data kategori
        $request->validate([
        'modelunit' => ['required'],
        'codeunit' => ['required'],
        'type' => ['required'],
        'category' => ['required'],
        'status' => ['required'],
        'sitecode' => ['required'],
        [

            'modelunit.required' => 'Tidak Boleh Kosong',
            'codeunit.required' => 'Tidak Boleh Kosong',
            'type.required' => 'Tidak Boleh Kosong',
            'category.required' => 'Tidak Boleh Kosong',
            'status.required' => 'Tidak Boleh Kosong',
            'sitecode.required' => 'Tidak Boleh Kosong',
        ]
           ]);

           $equipment = new Equipment();


           $equipment->modelunit    = $request->modelunit;
           $equipment->codeunit     = $request->codeunit;
           $equipment->type         = $request->type;
           $equipment->category     = $request->category;
           $equipment->status = $request->status;
           $equipment->fungsi_equip = $request->fungsi_equip;
           $equipment->sitecode =  json_decode($request->get('sitecode'), true)['sitecode'];

           $equipment->save();

           session()->flash('success','Data Equipment Ditambah');

          return redirect()->route('equipment.index');
    }
}





//    public function edit($id)
//    {

//        $equipment = Equipment::find($id);

//       return View('equipment.edit',[
//            'equipment' =>$equipment,
//    ]);
//    }

//    public function update(Request $request, $id)

//    {
//        $this-> validate($request, [

//         'modelunit' => ['required'],
//         'codeunit' => ['required'],
//         'type' => ['required'],
//         'category' => ['required'],

//         'equipactivity' => ['required'],
//         'sitecode' => ['required'],
//        ],
//            [

//             'modelunit.required'    => 'Tidak Boleh Kosong',
//             'codeunit.required'     => 'Tidak Boleh Kosong',
//             'type.required'         => 'Tidak Boleh Kosong',
//             'category.required'     => 'Tidak Boleh Kosong',

//             'equipactivity.required' => 'Tidak Boleh Kosong',
//             'sitecode.required' => 'Tidak Boleh Kosong',

//            ]);

//        $equipment = Equipment::find($id);



//        $equipment->modelunit = $request->modelunit;
//        $equipment->codeunit = $request->codeunit;
//        $equipment->type = $request->type;
//        $equipment->category = $request->category;

//        $equipment->equipactivity = $request->equipactivity;
//        $equipment->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];

//        $equipment->save();

//        session()->flash('info','Data Equipment Diupdate');

//       return redirect()->route('equipment.index');
//    }

//    public function destroy($id)
//    {
//        $equipment = Equipment::find($id);

//        $equipment->delete();

//        session()->flash('danger','Data Equipment Dihapus');

//        return redirect()->route('equipment.index');

// }
}
