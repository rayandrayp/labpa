<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function register()
    {
        return view('pages/register');
    }

    public function login()
    {
        return view('pages/login');
    }

    public function logout()
    {
    }
}
