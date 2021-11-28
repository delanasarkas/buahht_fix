<?php

namespace App\Controllers;
use App\Models\KaryawanModel;
use App\Models\PresensiModel;

class Home extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            // JIKA MASUK DASHBOARD
            $modelKaryawan = new KaryawanModel();
            $modelPresensi = new PresensiModel();

            $jumlahKaryawan = $modelKaryawan->countAllResults();
            $jumlahPresensi = $modelPresensi->where('Date(date)', date('Y-m-d'))->countAllResults();

            $data = [
                'title' => 'Dashboard',
                'jumlahKaryawan' => $jumlahKaryawan,
                'jumlahPresensi' => $jumlahPresensi,
            ];

            return view('pages/dashboard/dashboard', $data);
        }
    }
}
