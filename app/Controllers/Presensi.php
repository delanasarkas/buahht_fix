<?php

namespace App\Controllers;
use App\Models\PresensiModel;
use App\Libraries\Zklibrary;

class Presensi extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            // JIKA MASUK DASHBOARD
            $db = \Config\Database::connect();

            $datas = $db->query("SELECT b.nama, a.state, a.date FROM presensi a, karyawan b WHERE a.id_user = b.id_finger AND DATE(a.date) = CURRENT_DATE()")->getResult('array');
            
            $data = [
                'title' => 'Data Presensi Hari Ini',
                'data' => $datas
            ];

            return view('pages/dashboard/presensi/index', $data);
        }
    }

    public function tarik(){
        // INISIAL MODEL PRESENSI
        $modelPresensi = new PresensiModel();

        $zk = new ZKLibrary('192.168.88.203', 4370);
        $zk->connect();
        $zk->disableDevice();

        $dataFingerPresensi = $zk->getAttendance();

        foreach($dataFingerPresensi as $data ) {
            $modelPresensi->replace([
                'uid' => $data[0],
                'id_user' => $data[1],
                'state' => $data[2],
                'date' => $data[3],
            ]);
        }

        $zk->enableDevice();
        $zk->disconnect();

        session()->setFlashdata('success', 'Tarik Data Berhasil');
        return redirect()->to('/presensi');
    }
}
