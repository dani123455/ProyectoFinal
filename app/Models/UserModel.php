<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'password', 'email', 'rol_id', 'telefono', 'direccion', 'fecha_baja'];

    public function getUsuariosConRoles()
    {
        return $this->select('usuarios.*, roles.nombre as nombre_rol')
                    ->join('roles', 'usuarios.rol_id = roles.id')
                    ->findAll();
    }

    public function findByEmail(string $email)
    {
        return $this->where('email', $email)
                    ->where('fecha_baja IS NULL')  // Solo usuarios activos
                    ->first();
    }
}