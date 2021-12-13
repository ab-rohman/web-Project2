<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use Auth;
use Barryvdh\DomPDF\PDF;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    public function diterima()
    {
        $terima = User::where('status', 'diterima')->where('id', '!=', '1')->get();
        return view('admin.diterima', compact('terima'));
    }

    public function ditolak()
    {
        $tolak = User::where('status', 'ditolak')->where('id', '!=', '1')->get();
        return view('admin.ditolak', compact('tolak'));
    }

    public function diverifikasi()
    {
        $verifikasi = User::where('status', 'diverifikasi')->where('id', '!=', '1')->get();
        return view('admin.diverifikasi', compact('verifikasi'));
    }

    public function generatePDF()
    {
        $data = [
            'title' => 'Daftar Peserta',
            'date' => date('m/d/Y'),
            'terima' => User::where('status', 'diterima')->where('id', '!=', '1')->get()
        ];
          
        $pdf = PDF::loadView('admin.listPDF', $data);
    
        return $pdf->download('Daftarpeserta.pdf');
    }

    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'santri.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
             
        return back();
    }
}
