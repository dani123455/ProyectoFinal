<?php

namespace App\Controllers;

class EmployeeController extends BaseController
{
    public function dashboard()
    {
        return view('employee/dashboard');
    }
}
