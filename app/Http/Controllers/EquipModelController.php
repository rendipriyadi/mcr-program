<?php

namespace App\Http\Controllers;

use App\Models\EquipmentModel;
use App\Models\Site;
use Illuminate\Http\Request;

class EquipModelController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.equipmodel-list|setup.equipmodel-create|setup.equipmodel-edit|setup.equipmodel-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.equipmodel-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.equipmodel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.equipmodel-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $equipmodels = EquipmentModel::all();


        return view('setup.equipmodel.index', compact('equipmodels'));
    }
    public function create()

    {
        $site = Site::all();
        return View('setup.equipmodel.create',compact('site'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'modelunit' => ['required',],
            'codeunit' => ['required',],
            'type' => ['required'],
            'sitecode' => ['required'],
            'equipactivity' => ['required'],


            ]);

        $equipmodel = new EquipmentModel();

        $equipmodel->modelunit = $request->modelunit;
        $equipmodel->codeunit = $request->codeunit;
        $equipmodel->type = $request->type;
        $equipmodel->equipactivity = $request->equipactivity;
        $equipmodel->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];



        $equipmodel->save();

        session()->flash('success','Data Equipment Model Ditambah');

       return redirect()->route('equipmodel.index');
    }

    public function edit($id)
    {

        $equipmodel = EquipmentModel::find($id);

       return View('setup.equipmodel.edit',[
            'equipmodel' =>$equipmodel,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'modelunit' => ['required',],
            'codeunit' => ['required',],
            'type' => ['required'],
            'sitecode' => ['required'],
            'equipactivity' => ['required'],


            ]);

        $equipmodel = EquipmentModel::find($id);

        $equipmodel->modelunit = $request->modelunit;
        $equipmodel->codeunit= $request->codeunit;
        $equipmodel->type = $request->type;
        $equipmodel->sitecode = $request->sitecode;
        $equipmodel->equipactivity = $request->equipactivity;



        $equipmodel->save();

        session()->flash('info','Data Equipment Model Diupdate');

       return redirect()->route('setup.equipmodel.index');
    }

    public function destroy($id)
    {
        $equipmodel = EquipmentModel::find($id);

        $equipmodel->delete();

        session()->flash('danger','Data Equipment Model Dihapus');

        return redirect()->route('setup.equipmodel.index');
    }
}
