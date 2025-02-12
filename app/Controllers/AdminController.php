<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        // Verifica si el usuario está autenticado y tiene el rol de administrador
        if (!session()->get('isLoggedIn') || session()->get('rol_id') != 1) {
            return redirect()->to('/auth/login');
        }

        // Aquí va el código para mostrar el dashboard del administrador
        return view('admin/dashboard');
    }
}
