<?php

namespace App\Http\Controllers;

use App\Exports\JointSurveyExport;
use App\Imports\JointSurveyImport;
use App\Models\JointSurvey;
use App\Models\Material;
use App\Models\Site;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JointSurveyController extends Controller
{

    public function index()
    {
        return View ('jointsurvey.index',[
            'jointsurvey'=> JointSurvey::get()
        ]);
    }
    public function export()
	{
		return Excel::download(new JointSurveyExport, 'Jointsurvey.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $namaFile = $file->getClientOriginalName();
        $file->move('DataJointSurvey',$namaFile);
        // import data
        $import = Excel::import(new JointSurveyImport, public_path('/DataJointSurvey/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('jointsurvey.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('jointsurvey.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
    {
        $site = Site::all();
        $material = Material::all();


        return View('jointsurvey.create',compact('site','material'));
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'jointmonth' => ['required',],
            'material' => ['required'],
            'jointtotal' => ['required'],

            ]);

        $jointsurvey = new JointSurvey ();

        $jointsurvey->sitecode = json_decode($request->get('sitecode'), true)['sitecode'];
        $jointsurvey->jointmonth = $request->jointmonth;
        $jointsurvey->material = json_decode($request->get('material'), true)['submaterial'];
        $jointsurvey->jointtotal = $request ->jointtotal;


        $jointsurvey->save();

        session()->flash('success','Data  Ditambah');

       return redirect()->route('jointsurvey.index');
    }

}
