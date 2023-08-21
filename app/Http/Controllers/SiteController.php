<?php

namespace App\Http\Controllers;

use App\Exports\SiteExport;
use App\Imports\SiteImport;
use App\Models\Site;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiteController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:site-list|site-create|site-edit|site-delete', ['only' => ['index','show']]);
         $this->middleware('permission:site-create', ['only' => ['create','store']]);
         $this->middleware('permission:site-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:site-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return View('site.index',[
            'site' => Site::get()
        ]);
    }
    public function export()
	{
		return Excel::download(new SiteExport, 'ritasi.xlsx');
	}
    public function import( Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');




        $namaFile = $file->getClientOriginalName();
        $file->move('DataSite',$namaFile);
        // import data
        $import = Excel::import(new SiteImport, public_path('/DataSite/'.$namaFile));

        //remove from server


        if($import) {
            //redirect
            return redirect()->route('site.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('site.index')->with(['error' => 'Data Gagal Diimport!']);
        }

	}
    public function create()
    {
        return View('site.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'sitecode' => ['required',],
            'sitedesc' => ['required',],
            'siteaddress' => ['required'],
            'customercode' => ['required'],
        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',
                'site.required' => 'Description Tidak Boleh Kosong',
                'siteaddress.required' => 'Alamat Tidak Boleh Kosong',
                'customercode.required' => 'Telepon Tidak Boleh Kosong',
            ]);

        $site = new Site();

        $site->sitecode = $request->sitecode;
        $site->sitedesc = $request->sitedesc;
        $site->siteaddress = $request->siteaddress;
        $site->customercode = $request->customercode;


        $site->save();

        session()->flash('success','Data Site Ditambah');

       return redirect()->route('site.index');
    }

    public function edit($id)
    {

        $site = Site::find($id);

       return View('site.edit',[
            'site' =>$site,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'sitecode' => ['required',],
            'sitedesc' => ['required',],
            'siteaddress' => ['required'],
            'customercode' => ['required'],
        ],
            [
                'sitecode.required' => 'Code tidak Boleh Kosong',
                'sitedesc.required' => 'Deskripsi Tidak Boleh Kosong',
                'siteaddress.required' => 'Alamat Tidak Boleh Kosong',
                'customercode.required' => 'No.Telepon Tidak Boleh Kosong',
            ]);

        $site = Site::find($id);

        $site->sitecode = $request->sitecode;
        $site->sitedesc= $request->sitedesc;
        $site->siteaddress = $request->siteaddress;
        $site->customercode= $request->customercode;


        $site->save();

        session()->flash('info','Data Site Diupdate');

       return redirect()->route('site.index');
    }

    public function destroy($id)
    {
        $site = Site::find($id);

        $site->delete();

        session()->flash('danger','Data Site Dihapus');

        return redirect()->route('site.index');
    }
}
