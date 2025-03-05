<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table = 'coches'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $allowedFields = ['marca_id', 'modelo', 'año', 'precio', 'disponible', 'fecha_baja','imagen'];

    // Función para obtener los coches con el nombre de la marca
    public function getCochesConMarca()
    {
        return $this->select('coches.*, marcas.nombre as nombre')
                    ->join('marcas', 'coches.marca_id = marcas.id')
                    ->findAll();
    }
}

