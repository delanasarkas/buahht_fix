<?php

namespace App\Controllers;
use App\Models\KaryawanModel;
use App\Libraries\Zklibrary;

class Karyawan extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            // JIKA MASUK DASHBOARD
            $modelKaryawan = new KaryawanModel();
            $datas = $modelKaryawan->findAll();

            $data = [
                'title' => 'Data Karyawan',
                'data' => $datas
            ];

            return view('pages/dashboard/karyawan/index', $data);
        }
    }

    public function tarik(){
        // INISIAL MODEL USERS
        $modelKaryawan = new KaryawanModel();

        $zk = new ZKLibrary('192.168.88.203', 4370);
        $zk->connect();
        $zk->disableDevice();

        $dataFingerKaryawan = $zk->getUser();

        foreach($dataFingerKaryawan as $key => $data ) {
            $modelKaryawan->replace([
                'uid' => $key,
                'id_finger' => $data[0],
                'nama' => $data[1],
                'level' => $data[2],
                'password' => $data[3],
            ]);
        }

        $zk->enableDevice();
        $zk->disconnect();

        session()->setFlashdata('success', 'Tarik Data Berhasil');
        return redirect()->to('/karyawan');
    }
}
