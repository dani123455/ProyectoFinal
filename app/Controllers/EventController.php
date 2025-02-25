<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventController extends BaseController
{

    public function Calendar()
    {
        return view('fullcalendar/calendar.php');
    }

    public function fetchEvents()
    {
    
    }

    public function addEvent()
    {

    }

    public function deleteEvent($id)
    {

    }
}