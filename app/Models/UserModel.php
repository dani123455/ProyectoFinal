<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'password', 'email', 'rol_id', 'telefono', 'direccion', 'fecha_baja'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        // Solo aplicar hash si se proporciona una contraseña y no está vacía
        if (isset($data['data']['password']) && !empty($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        } else {
            // Si no hay contraseña, eliminarla del array para no actualizar este campo
            unset($data['data']['password']);
        }
        return $data;
    }

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