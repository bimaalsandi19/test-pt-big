<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use phpDocumentor\Reflection\Types\This;

class Register extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        helper(['form']);
        $data['title'] = 'Form Register';
        return view('register_view', $data);
    }

    public function proses()
    {
        helper(['form']);
        $rules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confpassword' => 'matches[password]'
        ];
        // if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        // $data = [
        //     'email' => $this->request->getVar('email'),
        //     'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        // ];
        // $usermodel = new UserModel();
        // $registered = $usermodel->save($data);
        // $this->respondCreated($registered);

        if ($this->validate($rules)) {
            $usermodel = new UserModel();
            $data = [
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $usermodel->save($data);
            return redirect()->to('/');
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Register Form';
            echo view('register_view', $data);
        }
    }
}
