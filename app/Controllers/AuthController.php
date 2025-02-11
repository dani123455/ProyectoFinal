<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        helper(['form', 'url']);

        if ($this->request->getMethod() == 'post') {
            // Reglas de validación
            $rules = [
                'nombre'     => 'required|min_length[3]|max_length[255]',
                'email'      => 'required|valid_email|is_unique[usuarios.email]',
                'password'   => 'required|min_length[8]|max_length[255]',
                'confpassword' => 'matches[password]',
                'rol_id'     => 'required',
                'telefono'   => 'required|min_length[10]|max_length[15]',
                'direccion'  => 'required|min_length[5]|max_length[255]',
            ];

            if ($this->validate($rules)) {
                $model = new UserModel();
                $data = [
                    'nombre' => $this->request->getPost('nombre'),
                    'email'    => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'rol_id'   => $this->request->getPost('rol_id'),
                    'telefono' => $this->request->getPost('telefono'),
                    'direccion'=> $this->request->getPost('direccion'),
                ];
                $model->save($data);
                return redirect()->to('/auth/login')->with('success', 'Cuenta creada con éxito.');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('auth/register', $data ?? []);
    }

    public function login()
    {
        helper(['form', 'url']);
    
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
            ];
    
            if ($this->validate($rules)) {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getPost('email'))->first();
    
                if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                    $this->setUserSession($user);
    
                    // Redirigir según el rol del usuario
                    switch ($user['rol_id']) {
                        case 1:
                            return redirect()->to('/admin/dashboard');
                        case 2:
                            return redirect()->to('/employee/dashboard');
                        case 3:
                            return redirect()->to('/customer/dashboard');
                        default:
                            return redirect()->to('/auth/login');
                    }
                } else {
                    $data['validation'] = 'Email o contraseña incorrectos.';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
    
        return view('auth/login', $data ?? []);
    }
    

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'nombre' => $user['nombre'],
            'email' => $user['email'],
            'rol_id' => $user['rol_id'],
            'telefono' => $user['telefono'],
            'direccion' => $user['direccion'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
