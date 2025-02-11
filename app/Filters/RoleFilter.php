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

        // Asegurarnos de que $arguments es un array
        if (is_null($arguments)) {
            $arguments = [];
        } elseif (is_string($arguments)) {
            $arguments = explode(',', $arguments);
        }

        // Verificar si el rol del usuario está permitido
        if (!in_array($userRole, $arguments)) {
            return redirect()->to('/no_permission'); // Ruta para acceso denegado
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Si no usas $request, $response o $arguments, puedes dejar este método vacío o usar 'unset'
        unset($request, $response, $arguments);
    }
}
