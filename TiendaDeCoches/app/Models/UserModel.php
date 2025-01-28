<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';//Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';//Clave primaria de la tabla

    protected $allowedFields = ['nombre', 'email', 'rol_id', 'telefono', 'direccion'];
}