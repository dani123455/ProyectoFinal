<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('usuarios', 'UserController::index');//Listar usuarios
$routes->get( 'usuarios/save', 'UserController::saveUser');//Mostrar formulario para crear usuario
$routes->get( 'usuarios/save/(:num)', 'UserController::saveUser/$1');//Mostrar formulario para editar usuario
$routes->post('usuarios/save', 'UserController::saveUser');//Crear usuario(POST)
$routes->post('usuarios/save/(:num)', 'UserControler::saveUser/$1');//Editar usuario (POST)
$routes->get('usuarios/delete(:num)', 'UserController::delete/$1');//Eliminar usuario

