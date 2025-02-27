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
        $events = $eventModel->findAll(); // Obtener todos los eventos
    
        // Reformatear los eventos para FullCalendar
        $formattedEvents = array_map(function($event) {
            return [
                'id' => $event['pk_id_evento'], 
                'title' => $event['titulo'],    
                'start' => $event['fecha_inicio'], 
                'end' => $event['fecha_fin'],   
                'description' => $event['descripcion_es'],  
                'description_eng' => $event['descripcion_eng'],
                'fecha_eliminacion' => $event['fecha_eliminacion'], 
            ];
        }, $events);
    
        return $this->response->setJSON($formattedEvents); 
    }
    
    



    // Agregar un evento
    public function addEvent()
    {
    
        $eventModel = new EventModel();
        
        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'fecha_fin' => $this->request->getPost('fecha_fin'),
            'descripcion_es' => $this->request->getPost('descripcion_es'),
            'descripcion_eng' => $this->request->getPost('descripcion_eng'),
            'fecha_eliminacion' => $this->request->getPost('fecha_eliminacion'),
        ];
        // Verificar si los campos obligatorios están presentes
        if (empty($data['titulo']) || empty($data['fecha_inicio'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'El título y la fecha de inicio son obligatorios.']);
        }
    
        // Insertar los datos del evento
        $eventModel->insert($data);
    
        return $this->response->setJSON(['status' => 'success']);
    }
    

    // Eliminar un evento
    public function deleteEvent($id)
    {
        $eventModel = new EventModel();
        $eventModel->delete($id); // Elimina el evento por su ID

        return $this->response->setJSON(['status'=>'success']); // Respuesta de éxito
    }
}
