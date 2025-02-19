<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session(); // Obtenemos la sesión del usuario

        // Verificar si el usuario está logueado
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/auth/login');  // Redirige al login si no está logueado
        }

        // Asegurarnos de que $arguments sea un array
        if (is_null($arguments)) {
            $arguments = [];
        } elseif (is_string($arguments)) {
            $arguments = explode(',', $arguments); // Convertir string a array si es necesario
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        unset($request, $response, $arguments);
    }


    
}

