<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DiskonModel;

class AuthController extends BaseController
{
    protected $user;

    function __construct()
    {
        helper('form');
        $this->user = new UserModel();
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];

            if ($this->validate($rules)) {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $dataUser  = $this->user->where(['username' => $username])->first();

                if ($dataUser ) {
                    if (password_verify($password, $dataUser ['password'])) {
                        // Siapkan data session user
                        $sessionData = [
                            'username'   => $dataUser ['username'],
                            'role'       => $dataUser ['role'],
                            'isLoggedIn' => TRUE
                        ];

                        // -------------------------------
                        // Tambahan: Cek diskon hari ini
                        // -------------------------------
                        $diskonModel = new DiskonModel();
                        $diskonHariIni = $diskonModel->where('tanggal', date('Y-m-d'))->first();

                        if ($diskonHariIni) {
                            $sessionData['diskon_nominal'] = $diskonHariIni['nominal'];
                        } else {
                            $sessionData['diskon_nominal'] = 0;
                        }
                        // -------------------------------

                        // Simpan data session lengkap
                        session()->set($sessionData);

                        return redirect()->to(base_url('/'));
                    } else {
                        session()->setFlashdata('failed', 'Kombinasi Username & Password Salah');
                        return redirect()->back();
                    }
                } else {
                    session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', $this->validator->listErrors());
                return redirect()->back();
            }
        }

        return view('v_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
