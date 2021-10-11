<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use Auth;
Use PDF;

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
}
