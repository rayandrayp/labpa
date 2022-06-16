<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('auth/login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $this->decrypt($data['password'], 'ITrstds123#');
            // $verify_pass = password_verify($password, $pass);
            if ($password == $pass) {
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_fullname' => $data['fullname'],
                    'user_id_rs'    => $data['id_rs'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/auth');
            }
        } else {
            $session->setFlashdata('msg', 'User not Found or not Active');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth');
    }
}
