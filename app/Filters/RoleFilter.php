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

        // Obtener el rol del usuario
        $userRole = $session->get('rol_id');

        // Asegurarnos de que $arguments sea un array
        if (is_null($arguments)) {
            $arguments = [];
        } elseif (is_string($arguments)) {
            $arguments = explode(',', $arguments); // Convertir string a array si es necesario
        }

        // Verificar si el rol del usuario está permitido
        if (!in_array($userRole, $arguments)) {
            return redirect()->to('/no_permission'); // Redirige a página de sin permiso si no tiene el rol adecuado
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Este método no se usa en este caso, pero podría dejarse vacío
        unset($request, $response, $arguments);
    }


    
}

