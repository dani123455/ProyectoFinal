<?php

namespace App\Controllers;

class CustomerController extends BaseController
{
    public function dashboard()
    {
        return view('customer/dashboard');
    }
}
