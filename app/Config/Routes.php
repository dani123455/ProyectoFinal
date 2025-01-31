<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//Usuarios
$routes->get('usuarios', 'UserController::index');//Listar usuarios
$routes->get( 'usuarios/save', 'UserController::saveUser');//Mostrar formulario para crear usuario
$routes->get( 'usuarios/save/(:num)', 'UserController::saveUser/$1');//Mostrar formulario para editar usuario
$routes->post('usuarios/save', 'UserController::saveUser');//Crear usuario(POST)
$routes->post('usuarios/save/(:num)', 'UserController::saveUser/$1');//Editar usuario (POST)
$routes->get('usuarios/archive/(:num)', 'UserController::archive/$1'); //Archivar usuario
$routes->get('usuarios/unarchive/(:num)', 'UserController::unarchive/$1'); //Desarchivar usuario
//Marcas
$routes->get('marcas', 'BrandController::index');//Listar marcas
//$routes->get( 'marcas/save', 'BrandController::saveBrand');//Mostrar formulario para crear marca
$routes->get( 'marcas/save/(:num)', 'BrandController::saveBrand/$1');//Mostrar formulario para editar marca
$routes->post('marcas/save', 'BrandController::saveBrand');//Crear marca(POST)
$routes->post('marcas/save/(:num)', 'BrandController::saveBrand/$1');//Editar marca (POST)
$routes->get('marcas/delete/(:num)', 'BrandController::delete/$1'); //eliminar marca

