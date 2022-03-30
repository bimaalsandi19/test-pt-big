<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;


class Login extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $data = [
            'title' => 'Form Login'
        ];
        return view('login_view', $data);
    }
    public function proses()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|valid_email|',
            'password' => 'required|min_length[6]'
        ];
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $usermodel = new UserModel();
        $user = $usermodel->where('email', $this->request->getVar('email'))->first();
        if (!$user) return $this->failNotFound('Email tidak ditemukan');

        $verify = password_verify($this->request->getVar("password"), $user['password']);
        if (!$verify) return $this->fail('Password salah');

        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            'uid' => $user['id'],
            'email' => $user['email']
        );
        $token = JWT::encode($payload, $key, 'HS256');

        return $this->respond($token);

        // return view('dashboard_view');
    }

    public function auth()
    {
        $session = session();
        $usermodel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $usermodel->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
