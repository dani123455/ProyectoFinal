<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'ventas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla

    protected $allowedFields = ['coche_id', 'usuarios_id', 'fecha', 'precio_venta', 'disponible', 'fecha_baja'];

    // Función para obtener los coches con el nombre de la marca
    public function getVentaConCoche()
    {
        return $this->select('ventas.*, coches.modelo as coche_modelo')
                    ->join('coches', 'ventas.coche_id = coches.id')
                    ->findAll();
    }

    // Función para obtener las ventas con el nombre del usuario
    public function getVentasConUsuarios()
    {
        return $this->select('ventas.*, usuarios.nombre as usuarios_nombre')
                    ->join('usuarios', 'ventas.usuarios_id = usuarios.id')
                    ->findAll();
    }
}

