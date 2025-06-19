<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

    class FaqRedirectController extends BaseController
    {
        public function index()
        {
            //
        }
        function __construct()
        {
            helper('form');
        }
        // public function login()
        // {
        //     if ($this->request->getPost()) {
        //         $username = $this->request->getVar('username');
        //         $password = $this->request->getVar('password');

        //         $userModel = new UserModel();
        //         $user = $userModel->where('username', $username)->first();

        //         if ($username == $dataUser['username']) {
        //             if (md5($password) == $dataUser['password']) {
        //                 session()->set([
        //                     'username' => $dataUser['username'],
        //                     'role' => $dataUser['role'],
        //                     'isLoggedIn' => TRUE
        //                 ]);

        //                 return redirect()->to(base_url('/faq'));
        //             } else {
        //                 session()->setFlashdata('failed', 'Username & Password Salah');
        //                 return redirect()->back();
        //             }
        //         } else {
        //             session()->setFlashdata('failed', 'Username Tidak Ditemukan');
        //             return redirect()->back();
        //         }
        //     } else {
        //         return view('v_login');
        //     }
        // }
        public function login()
    {
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user) {
                // Jika password disimpan dengan hash (gunakan password_hash saat insert ke DB)
                if (password_verify($password, $user['password'])) {
                    session()->set([
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'isLoggedIn' => TRUE
                    ]);
                    return redirect()->to(base_url('/faq'));
                } else {
                    session()->setFlashdata('failed', 'Password salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username tidak ditemukan');
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
