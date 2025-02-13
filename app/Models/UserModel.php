<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $allowedFields = ['nombre', 'email', 'rol_id', 'telefono', 'direccion', 'fecha_baja'];

    // Nueva función para obtener los usuarios con el nombre del rol
    public function getUsuariosConRoles()
    {
        return $this->select('usuarios.*, roles.nombre as nombre')
                    ->join('roles', 'usuarios.rol_id = roles.id')
                    ->findAll();
    }

    /**
     * Obtener información de usuario por email
     * 
     * @param string $email
     * @return array|null
     */
    public function findByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }
}
