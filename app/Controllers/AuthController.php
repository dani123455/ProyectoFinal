<?php

namespace App\Controllers;

use App\Models\UserModel; // Importamos el modelo de usuarios para interactuar con la base de datos.

class AuthController extends BaseController
{
    /**
     * Muestra el formulario de registro de usuario.
     */
    public function register()
    {
        return view('auth/register'); // Carga y retorna la vista del formulario de registro.
    }

    /**
     * Procesa el registro de un nuevo usuario.
     */
    public function processRegister()
    {
        helper(['form', 'url']); // Carga los helpers necesarios para trabajar con formularios y URLs.

        // Configuración de las reglas de validación del formulario.
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[50]', // El nombre es obligatorio y debe tener entre 3 y 50 caracteres.
            'email' => 'required|valid_email|is_unique[usuarios.email]', // El correo debe ser válido y único en la tabla `usuarios`.
            'password' => 'required|min_length[8]', // La contraseña debe ser obligatoria y tener al menos 8 caracteres.
            'confpassword' => 'required|matches[password]', // La confirmación de la contraseña debe coincidir con la contraseña.
            'rol_id' => 'required', // El rol del usuario es obligatorio.
            'telefono' => 'required|min_length[10]|max_length[15]', // El teléfono es obligatorio y debe tener entre 10 y 15 caracteres.
            'direccion' => 'required|min_length[5]|max_length[255]', // La dirección es obligatoria y debe tener entre 5 y 255 caracteres.
        ];

        // Si la validación pasa, procedemos a guardar el usuario en la base de datos.
        $userModel = new UserModel();
        $userModel->save([
            'nombre' => $this->request->getPost('nombre'), // Obtenemos el nombre del formulario.
            'email' => $this->request->getPost('email'), // Obtenemos el correo del formulario.
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Encriptamos la contraseña antes de guardarla.
            'rol_id' => $this->request->getPost('rol_id'), // Obtenemos el rol del formulario.
            'telefono' => $this->request->getPost('telefono'), // Obtenemos el teléfono del formulario.
            'direccion' => $this->request->getPost('direccion'), // Obtenemos la dirección del formulario.
        ]);

        // Redirigimos al formulario de inicio de sesión con un mensaje de éxito.
        return redirect()->to('/auth/login')->with('success', 'Usuario registrado correctamente.');
    }

    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function login()
    {
        return view('auth/login'); // Carga y retorna la vista del formulario de inicio de sesión.
    }

    /**
     * Procesa el inicio de sesión del usuario.
     */
    public function processLogin()
    {
        helper(['form', 'url']); // Carga los helpers necesarios para trabajar con formularios y URLs.
        $session = session(); // Inicia una sesión para el usuario.

        // Configuración de las reglas de validación del formulario.
        $rules = [
            'email' => 'required|valid_email', // El correo es obligatorio y debe ser válido.
            'password' => 'required|min_length[8]', // La contraseña es obligatoria y debe tener al menos 8 caracteres.
        ];

        // Si la validación falla, volvemos a mostrar el formulario con los errores.
        if (!$this->validate($rules)) {
            return view('auth/login', [
                'validation' => $this->validator, // Pasamos los errores de validación a la vista.
            ]);
        }

        // Si la validación pasa, verificamos las credenciales.
        $userModel = new UserModel();
        $user = $userModel->findByEmail($this->request->getPost('email')); // Buscamos al usuario por su correo.

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            // Si las credenciales son correctas, guardamos datos del usuario en la sesión.
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
                    return redirect()->to('/auth/login')->with('error', 'Rol de usuario no válido.');
            }
        } else {
            return redirect()->to('/auth/login')->with('error', 'Correo o contraseña incorrectos.');
        }
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout()
    {
        $session = session(); // Inicia o accede a la sesión.
        $session->destroy(); // Destruye todos los datos de la sesión.

        // Redirige al formulario de inicio de sesión con un mensaje de éxito.
        return redirect()->to('/')->with('success', 'Has cerrado sesión correctamente.');
    }

    /**
     * Establece los datos de la sesión del usuario.
     */
    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],           // ID del usuario.
            'nombre' => $user['nombre'],   // Nombre del usuario.
            'email' => $user['email'],     // Correo del usuario.
            'rol_id' => $user['rol_id'],   // Rol del usuario.
            'telefono' => $user['telefono'], // Teléfono del usuario.
            'direccion' => $user['direccion'], // Dirección del usuario.
            'isLoggedIn' => true,          // Bandera para indicar que está logueado.
        ];

        session()->set($data);
        return true;
    }
}
