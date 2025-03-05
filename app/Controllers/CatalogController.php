<?php

namespace App\Controllers;
use App\Models\CardModel;


class CatalogController extends BaseController
{
public function view(){
    return view('car/catalog');
}
}
?>