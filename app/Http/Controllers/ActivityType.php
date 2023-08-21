<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityType extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setup.activity-list|setup.activity-create|setup.activity-edit|setup.activity-delete', ['only' => ['index','show']]);
         $this->middleware('permission:setup.activity-create', ['only' => ['create','store']]);
         $this->middleware('permission:setup.activity-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setup.activity-delete', ['only' => ['destroy']]);
    }
   public function index(){
    return View('setup.activity.index',[
        'activitys' => Activity::paginate(10),
    ]);
}
public function create()
{
    return View('activity.create');
}

public function store(Request $request)
{

    $this-> validate($request, [
        'activitycode' => ['required',],
        'activitydesc' => ['required',],


    ],
        [
            'activitycode.required' => 'Code Activity tidak Boleh Kosong',
            'activitydesc.required' => 'Description Tidak Boleh Kosong',


        ]);

    $activity = new Activity();

    $activity->activitycode = $request->activitycode;
    $activity->activitydesc = $request->activitydesc;




    $activity->save();

    session()->flash('success','Data Equipment Model Ditambah');

   return redirect()->route('activity.index');
}

public function edit($id)
{

    $activity = Activity::find($id);

   return View('activity.edit',[
        'activity' =>$activity,
]);
}

public function update(Request $request, $id)

{
    $this-> validate($request, [
        'activitycode' => ['required',],
        'activitydesc' => ['required',],


    ],
        [
            'activitycode.required' => 'Code tidak Boleh Kosong',
            'activitydesc.required' => 'Deskripsi Tidak Boleh Kosong',


        ]);

    $activity = Activity::find($id);

    $activity->activitycode = $request->activitycode;
    $activity->activitydesc= $request->activitydesc;
    $activity->typecode = $request->typecode;



    $activity->save();

    session()->flash('info','Data Diupdate');

   return redirect()->route('activity.index');
}

public function destroy($id)
{
    $activity = Activity::find($id);

    $activity->delete();

    session()->flash('danger','Data Dihapus');

    return redirect()->route('activity.index');
}
}
