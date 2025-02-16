<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function noPermission()
    {
        return view('errors/no_permission'); // Vista de acceso denegado
    }
}

