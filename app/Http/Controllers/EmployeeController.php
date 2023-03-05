<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use PDF;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Employee::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }

        return view('adminulplmg',compact('data'));
    }
    public function tambahdatapelanggan(){
        return view('tambahdata'); 
    }
    public function insertdata(request $request){
        //dd($request->all());
        $data = Employee::create($request->all());
        if($request->hasFile('PK')){
           $request->file('PK')->move('Perintahkerja/', $request->file('PK')->getClientOriginalName());
           $data->PK = $request->file('PK')->getClientOriginalName();
           $data->save();
        }
        return redirect()->route('adminulplmg')->with('success','Data Pelanggan Berhasil Ditambahkan');
    }
    public function tampilkandata($id){
        
        $data = Employee::find($id);
        //dd ($data);
        return view('tampildata', compact('data'));
    }
    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('adminulplmg')->with('success','Data Pelanggan Berhasil Edit');
    }
    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('adminulplmg')->with('succes','Data Pelanggan Berhasil Delete');
    }

    public function exportpdf(){
        $data = Employee::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('adminulplmg-pdf');
        return $pdf->download('datapelanggan.pdf');
    }
    public function exportexcel(){
    return Excel::download(new EmployeeExport,'adminulplmg.xlsx');
}

public function importexcel(Request $request){
    $data = $request->file('file');

    $namafile = $data->getClientOriginalName();
    $data->move('EmployeeData', $namafile);

    Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$namafile));
    return \redirect()->back();
}
}
