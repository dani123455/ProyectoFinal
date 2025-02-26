<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events'; // Nombre de la tabla
    protected $primaryKey = 'pk_id_evento'; // Clave primaria
    protected $allowedFields = ['titulo', 'fecha_inicio', 'fecha_fin', 'descripcion_es', 'descripcion_ing', 'fecha_eliminacion']; // Campos que se pueden insertar y actualizar
    protected $returnType = 'array'; // Devuelve los resultados como un array

    // Método para obtener eventos
    public function getEvents()
    {
        return $this->findAll(); // Recupera todos los eventos
    }

    // Método para agregar un evento
    public function addEvent($data)
    {
        return $this->insert($data); // Inserta un nuevo evento
    }

    // Método para eliminar un evento
    public function deleteEventById($id)
    {
        return $this->delete($id); // Elimina un evento por su ID
    }
}
