<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventController extends BaseController
{
    public function Calendar()
    {
        return view('fullcalendar/calendar.php'); // Muestra la vista con el calendario
    }

    // Cargar eventos
    public function fetchEvents()
{
    $eventModel = new EventModel();
    $events = $eventModel->getEvents(); // Obtener todos los eventos

    // Convertir los eventos a un formato adecuado para FullCalendar
    $data = [];
    foreach ($events as $event) {
        $data[] = [
            'id' => $event['pk_id_evento'],
            'title' => $event['titulo'],
            'start' => $event['fecha_inicio'],
            'end' => $event['fecha_fin'],
            'description' => $event['descripcion_es'],
        ];
    }

    return $this->$data; 
}


    // Agregar un evento
    public function addEvent()
    {
      
        return $this->response->setJSON(['status'=>'ok']); // Respuesta de éxito
    }

    // Eliminar un evento
    public function deleteEvent($id)
    {
        $eventModel = new EventModel();
        $eventModel->deleteEventById($id); // Elimina el evento por su ID

        return $this->response->setStatusCode(200); // Respuesta de éxito
    }
}
