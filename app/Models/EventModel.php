<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'evento'; // Nombre de la tabla
    protected $primaryKey = 'pk_id_evento'; // Clave primaria
    protected $allowedFields = ['titulo', 'fecha_inicio', 'fecha_fin', 'descripcion_es', 'descripcion_eng', 'fecha_eliminacion']; // Campos que se pueden insertar y actualizar   
}
