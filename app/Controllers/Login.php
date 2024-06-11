<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;

class Login extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $users = new UsersModel();
        $email = $this->request->getVar('email');
        $pass = $this->request->getVar('password');

        $data = $users->where('email', $email)->first();
        if (!$data) {
            return $this->fail('Email is not registered');
        };

        if (!password_verify($pass, $data['password'])) {
            return $this->fail("Wrong password");
        };

        $datashow = [
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
        ];
        helper('jwt');
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Successfully authentication',
            ],
            'data' => $datashow,
            'token' => createJWT($data['id'], $data['name'], $email),
        ];

        return $this->respond($response);
    }
}
