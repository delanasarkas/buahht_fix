<?php

namespace App\Controllers;
use App\Models\IpModel;

class Ip extends BaseController
{
    public function index()
    {
        if(is_null(session()->get('logged_in'))){
            return redirect()->to('/login');
        } else {
            // JIKA MASUK DASHBOARD
            $modelIp = new IpModel();
            $datas = $modelIp->first();

            $data = [
                'title' => 'Setting IP Address',
                'data' => $datas
            ];

            return view('pages/dashboard/settings/ipaddress/index', $data);
        }
    }

    public function ubah($id)
    {
        // INISIAL MODEL IP
        $modelIp = new IpModel();

        // GET FIELD NAME YANG DIKIRIM
        $ipaddress = $this->request->getVar('ipaddress');

        // VALIDASI
        $validator = $this->validate([
            'ipaddress' => 'required',
        ]);
        
        if(!$validator){
            // JIKA MASUK DASHBOARD
            $modelIp = new IpModel();
            $datas = $modelIp->first();

            $data = [
                'title' => 'Setting IP Address',
                'data' => $datas,
                'validation' => $this->validator
            ];

            return view('pages/dashboard/settings/ipaddress/index', $data);
        } else {
            $modelIp->update($id,[
                'address' => $ipaddress,
            ]);
            session()->setFlashdata('success', 'Ubah ip berhasil');
            return redirect()->to('/settings/ip');
        }


    }
}
