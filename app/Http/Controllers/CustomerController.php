<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use App\Models\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','show']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return View('customer.index',[
            'customer' => Customer::get(),
        ]);
    }
    // public function export()
	// {
	// 	return Excel::download(new CustomerExport, 'Customer.xlsx');
	// }
    // public function import( Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx'
    //     ]);

    //     $file = $request->file('file');




    //     $namaFile = $file->getClientOriginalName();
    //     $file->move('DataCustomer',$namaFile);
    //     // import data
    //     $import = Excel::import(new CustomerImport, public_path('/DataCustomer/'.$namaFile));

    //     //remove from server


    //     if($import) {
    //         //redirect
    //         return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Diimport!']);
    //     } else {
    //         //redirect
    //         return redirect()->route('customer.index')->with(['error' => 'Data Gagal Diimport!']);
    //     }

	// }

    public function create()
    {
        return View('customer.create');
    }

    public function store(Request $request)
    {

        $this-> validate($request, [
            'cscode' => ['required',],
            'csdescript' => ['required',],
            'csaddress' => ['required'],
            'cstelp' => ['required','numeric'],
        ],
            [
                'cscode.required' => 'Code Customer tidak Boleh Kosong',
                'csdescript.required' => 'Description Tidak Boleh Kosong',
                'csaddress.required' => 'Alamat Tidak Boleh Kosong',
                'cstelp.required' => 'Telepon Tidak Boleh Kosong',
            ]);

        $customer = new Customer();

        $customer->cscode = $request->cscode;
        $customer->csdescript = $request->csdescript;
        $customer->csaddress = $request->csaddress;
        $customer->cstelp = $request->cstelp;


        $customer->save();

        session()->flash('success','Data Customer Ditambah');

       return redirect()->route('customer.index');
    }

    public function edit($id)
    {

        $customer = Customer::find($id);

       return View('customer.edit',[
            'customer' =>$customer,
    ]);
    }

    public function update(Request $request, $id)

    {
        $this-> validate($request, [
            'cscode' => ['required',],
            'csdescript' => ['required',],
            'csaddress' => ['required'],
            'cstelp' => ['required','numeric'],
        ],
            [
                'cscode.required' => 'Code tidak Boleh Kosong',
                'csdescript.required' => 'Deskripsi Tidak Boleh Kosong',
                'csaddress.required' => 'Alamat Tidak Boleh Kosong',
                'cstelp.required' => 'No.Telepon Tidak Boleh Kosong',
            ]);

        $customer = Customer::find($id);

        $customer->cscode = $request->cscode;
        $customer->csdescript= $request->csdescript;
        $customer->csaddress = $request->csaddress;
        $customer->cstelp= $request->cstelp;


        $customer->save();

        session()->flash('info','Data Customer Diupdate');

       return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        session()->flash('danger','Data Customer Dihapus');

        return redirect()->route('customer.index');
    }
}
