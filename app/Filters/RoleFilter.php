<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Verificar si el usuario está logueado
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }

        // Obtener el rol del usuario
        $userRole = $session->get('rol_id');

        // Verificar si el rol del usuario está permitido
        if ($arguments && !in_array($userRole, $arguments)) {
            return redirect()->to('/no_permission'); // Ruta para acceso denegado
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No hacer nada después del procesamiento
    }
}
