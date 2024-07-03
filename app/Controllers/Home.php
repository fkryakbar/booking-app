<?php

namespace App\Controllers;

use App\Models\User;
use PHPUnit\Event\Telemetry\Duration;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home/home');
    }



    public function loginPage()
    {
        $session = session();
        // dd(session('auth'));
        return view('auth/login');
    }

    public function loginAttempt()
    {
        $session = session();
        $model = new User();
        if ($this->request->getMethod() === 'POST') {
            // Validasi input
            $validation = \Config\Services::validation();
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required'
            ];

            if (!$this->validate($rules)) {
                $session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->to('/login')->withInput();
            }

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = $model->where('email', $email)->first();
            if (is_array($password) || is_null($password)) {
                $session->setFlashdata('error', 'Invalid password input.');
                return redirect()->to('/login')->withInput();
            }
            if ($user && password_verify($password, $user['password'])) {
                $sessionData = [
                    'auth' => [
                        'user_id' => $user['id'],
                        'name'    => $user['name'],
                        'email'   => $user['email'],
                        'role'    => $user['role'],
                    ]
                ];
                $session->set($sessionData);
                if ($user['role'] == 'admin') {
                    return redirect()->to('admin/paket');
                }
                return redirect()->to('dashboard');
            } else {
                $session->setFlashdata('error', 'Email atau password salah.');
                return redirect()->to('/login')->withInput();
            }
        }
    }

    public function registerPage()
    {
        $session = session();
        $model = new User();

        if ($this->request->getMethod() === 'POST') {
            // Validasi input
            $validation = \Config\Services::validation();
            $rules = [
                'name'     => 'required|min_length[3]|max_length[255]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[3]',
                'password_confirmed' => 'required|max_length[255]|matches[password]',
            ];

            if (!$this->validate($rules)) {
                // Menyimpan data form dan error ke session flashdata
                $session->setFlashdata('errors', $this->validator->getErrors());

                return redirect()->to('/register')->withInput();
            }

            $postData = $this->request->getPost();


            $postData = $this->request->getPost();
            $postData['password'] = password_hash($postData['password'], PASSWORD_DEFAULT);
            $postData['role'] = 'customer';
            if ($model->insert($postData)) {
                $session->setFlashdata('success', 'Akun berhasil dibuat');

                return redirect()->to('/register');
            } else {
                return 'Terjadi kesalahan saat registrasi.';
            }
        }

        return view('auth/register');
    }

    public function logout()
    {
        // Load the session library
        $session = session();

        // Destroy the session
        $session->destroy();
        // dd(session('auth'));
        // Redirect to the login page or homepage
        return redirect()->to('/login')->with('message', 'You have been logged out.');
    }
}
