<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:location-list|location-create|location-edit|location-delete', ['only' => ['index','show']]);
         $this->middleware('permission:location-create', ['only' => ['create','store']]);
         $this->middleware('permission:location-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:location-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View('location.index',[
            'location' => Location::get(),
        ]);
    }
    public function create()
    {
        return View('location.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'block' => ['required',],
            'pit' => ['required',],
            'dumpingarea' => ['required'],

            'sitecode' => ['required'],

            ]);

        $location = new Location();

        $location->block = $request->block;
        $location->pit = $request->pit;
        $location->dumpingarea = $request->dumpingarea;

        $location->sitecode = $request->sitecode;

        $location->save();

        session()->flash('success','Data Location Ditambah');

       return redirect()->route('location.index');
    }

    public function edit($id)
    {

        $location = Location::find($id);

       return View('location.edit',[
            'location' =>$location,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
          'block' => ['required',],
            'pit' => ['required',],
            'dumpingarea' => ['required'],

            'sitecode' => ['required'],


            ]);

        $location = Location::find($id);


        $location->block = $request->block;
        $location->pit = $request->pit;
        $location->dumpingarea = $request->dumpingarea;

        $location->sitecode = $request->sitecode;

        $location->save();

        session()->flash('info','Data Location Diupdate');

       return redirect()->route('location.index');
    }

    public function destroy($id)
    {
        $location = Location::find($id);

        $location->delete();

        session()->flash('danger','Data Location Dihapus');

        return redirect()->route('location.index');
    }
}
