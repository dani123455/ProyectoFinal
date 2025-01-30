<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['usuarios'] = $userModel->findAll(); // Obtener todos los usuarios
        
        $name = $this->request->getVar('nombre');
        $email = $this->request->getVar('email');///Obtener el termino de busqueda desde el formulario
        $query = $userModel;
        //Aplicar filtro si se introduce un nombre
        if($name){
            $query = $userModel->like('nombre', $name);
        }

        if($email){
            $query = $userModel->like('email', $email);
        }

        //Paginaciona
        $perPage = 10; // Número de elementos por página

        //Obtener usuarios paginados
        $data['usuarios'] = $query->paginate($perPage);
        
        //Pasar el objeto del paginador a la vista
        $data['pager'] = $userModel->pager;

        //Mantener el termino de busqueda en la vista
        $data['name'] = $name;
        $data['email'] = $email;
        
        //Cargar la vista con los datos
        return view('user_list', $data);
    }

    public function saveUser($id = null)
    {
        $userModel = new UserModel();
        helper(['form', 'url']);
        // Cargar datos del usuario si es edición
        $data['usuarios'] = $id ? $userModel->find($id) : null;
        $data['isEdit'] = $id ? true : false;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email',
                'rol_id' => 'required',
                'telefono' => 'required|numeric|min_length[10]|max_length[15]',
                'direccion' =>'required|min_length[10]|max_length[255]'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $userData = [
                    'nombre' => $this->request->getPost('nombre'),
                    'email' => $this->request->getPost('email'),
                    'rol_id' => $this->request->getPost('rol_id'),
                    'telefono' => $this->request->getPost('telefono'),
                    'direccion' => $this->request->getPost('direccion'),
                ];

                if ($id) {
                    // Actualizar usuario existente
                    $userModel->update($id, $userData);
                    $message = 'Usuario actualizado correctamente.';
                } else {
                    // Crear nuevo usuario
                    $userModel->save($userData);
                    $message = 'Usuario creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/usuarios')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('user_form', $data);

    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id); // Eliminar usuario
        return redirect()->to('/usuarios')->with('success', 'Usuario eliminado correctamente.');
    }
}