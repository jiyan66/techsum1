<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/tasks');
        }
        return view('auth/login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Locate user context by email row signature
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id'         => $user['id'],
                'username'   => $user['username'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/tasks');
        }

        return redirect()->back()->with('error', 'Incorrect configuration parameters or missing login credentials.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
