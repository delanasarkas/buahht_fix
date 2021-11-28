<?php

namespace App\Controllers;
use App\Models\PresensiModel;
use App\Models\KaryawanModel;
use App\Libraries\Zklibrary;

class Laporan extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            // JIKA MASUK DASHBOARD
            $db = \Config\Database::connect();
            $modelKaryawan = new KaryawanModel();

            $datas = $db->query("SELECT b.nama, a.state, a.date FROM presensi a, karyawan b WHERE a.id_user = b.id_finger AND DATE(a.date) = CURRENT_DATE()")->getResult('array');
            $karyawan = $modelKaryawan->findAll();

            $data = [
                'title' => 'Laporan Presensi',
                'data' => $datas,
                'karyawan' => $karyawan
            ];

            return view('pages/dashboard/laporan/index', $data);
        }
    }

    public function exportExcel()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            $db = \Config\Database::connect();
            $modelKaryawan = new KaryawanModel();

            // CHECK PARAMS
            $is_nama = $this->request->getVar("nama_filter");

            $tgl_start = $this->request->getVar("tgl_start");
            $tgl_end = $this->request->getVar("tgl_end");

            $bln_start = $this->request->getVar("bln_start");
            $bln_end = $this->request->getVar("bln_end");

            if(!is_null($is_nama)){
                $namaKaryawan = $modelKaryawan->where('id_finger', $is_nama)->first();
                $convertNamaKaryawan = $namaKaryawan['nama'];

                $datas = $db->query("SELECT b.nama, a.state, a.date FROM presensi a, karyawan b WHERE a.id_user = b.id_finger AND a.id_user = $is_nama")->getResult('array');
        
                $data = [
                    'title' => 'Laporan Presensi '.$convertNamaKaryawan,
                    'data' => $datas,
                ];

                return view('pages/dashboard/laporan/excel.php', $data);
            }
            
            if(!is_null($tgl_start) && !is_null($tgl_end)){
                $datas = $db->query("SELECT b.nama, a.state, a.date FROM presensi a, karyawan b WHERE a.id_user = b.id_finger AND DATE(a.date) BETWEEN DATE('$tgl_start') AND DATE('$tgl_end')")->getResult('array');
        
                $data = [
                    'title' => 'Laporan Presensi Tanggal '. date('d-M-Y', strtotime($tgl_start)) .' s/d '.  date('d-M-Y', strtotime($tgl_end)),
                    'data' => $datas,
                ];

                return view('pages/dashboard/laporan/excel.php', $data);
            }

            if(!is_null($bln_start) && !is_null($bln_end)){
                $datas = $db->query("SELECT b.nama, a.state, a.date FROM presensi a, karyawan b WHERE a.id_user = b.id_finger AND YEAR(a.date)= YEAR(CURRENT_DATE()) AND MONTH(a.date) BETWEEN $bln_start AND $bln_end")->getResult('array');
        
                $data = [
                    'title' => 'Laporan Presensi Bulan '. $bln_start .' s/d '. $bln_end,
                    'data' => $datas,
                ];

                return view('pages/dashboard/laporan/excel.php', $data);
            }
        }
    }

    public function filterTanggal() 
    {
        $db = \Config\Database::connect();
        $modelKaryawan = new KaryawanModel();

        // GET FIELD NAME YANG DIKIRIM
        $tgl_start = $this->request->getVar('tgl_start');
        $tgl_end = $this->request->getVar('tgl_end');
    
        $karyawan = $modelKaryawan->findAll();

        $datas = $db->query("SELECT b.nama, a.state, a.date FROM presensi a, karyawan b WHERE a.id_user = b.id_finger AND DATE(a.date) BETWEEN DATE('$tgl_start') AND DATE('$tgl_end')")->getResult('array');
        
        $data = [
            'title' => 'Laporan Presensi',
            'data' => $datas,
            'karyawan' => $karyawan
        ];

        return view('pages/dashboard/laporan/index', $data);
    }

    public function filterBulan() 
    {
        // GET FIELD NAME YANG DIKIRIM
        $db = \Config\Database::connect();
        $modelKaryawan = new KaryawanModel();
        
        $karyawan = $modelKaryawan->findAll();

        $bln_start = $this->request->getVar('bln_start');
        $bln_end = $this->request->getVar('bln_end');

        $datas = $db->query("SELECT b.nama, a.state, a.date FROM presensi a, karyawan b WHERE a.id_user = b.id_finger AND YEAR(a.date)= YEAR(CURRENT_DATE()) AND MONTH(a.date) BETWEEN $bln_start AND $bln_end")->getResult('array');
        
        $data = [
            'title' => 'Laporan Presensi',
            'data' => $datas,
            'karyawan' => $karyawan
        ];

        return view('pages/dashboard/laporan/index', $data);
    }

    public function filterNama() 
    {
        // GET FIELD NAME YANG DIKIRIM
        $db = \Config\Database::connect();
        $modelKaryawan = new KaryawanModel();
        
        $karyawan = $modelKaryawan->findAll();
        $nama_filter = $this->request->getVar('nama_filter');

        $datas = $db->query("SELECT b.nama, a.state, a.date FROM presensi a, karyawan b WHERE a.id_user = b.id_finger AND a.id_user = $nama_filter")->getResult('array');
        
        $data = [
            'title' => 'Laporan Presensi',
            'data' => $datas,
            'karyawan' => $karyawan
        ];

        return view('pages/dashboard/laporan/index', $data);
    }
}
