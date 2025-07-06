<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    function __construct()
    {
        $this->diskon = new DiskonModel();
    } 

    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak!');
        }
        $diskon = $this->diskon->findAll();
        $data['diskon'] = $diskon;

        return view('v_diskon', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak!');
        }

        $tanggal = $this->request->getPost('tanggal');

        // Cek apakah tanggal sudah ada
        $existing = $this->diskon->where('tanggal', $tanggal)->first();
        if ($existing) {
            return redirect()->back()->withInput()->with('error', 'Diskon untuk tanggal tersebut sudah ada.');
        }

        $dataForm = [
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->diskon->insert($dataForm);

        return redirect()->to(base_url('diskon'))->with('success', 'Data Berhasil Ditambah');
    } 

    public function edit($id)
    {
        $dataDiskon = $this->diskon->find($id);

        $dataForm = [
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->diskon->update($id, $dataForm);

        return redirect()->to(base_url('diskon'))->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataDiskon = $this->diskon->find($id);

        $this->diskon->delete($id);

        return redirect()->to(base_url('diskon'))->with('success', 'Data Berhasil Dihapus');
    }
}
