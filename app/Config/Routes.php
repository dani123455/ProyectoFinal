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
$routes->get('marcas', 'BrandController::index'); // Listar marcas
$routes->get('marcas/save', 'BrandController::saveBrand'); // Mostrar formulario para crear marca
$routes->get('marcas/save/(:num)', 'BrandController::saveBrand/$1'); // Mostrar formulario para editar marca
$routes->post('marcas/save', 'BrandController::saveBrand'); // Crear marca (POST)
$routes->post('marcas/save/(:num)', 'BrandController::saveBrand/$1'); // Editar marca (POST)
$routes->get('marcas/archive/(:num)', 'BrandController::archive/$1'); // Archivar marca
$routes->get('marcas/unarchive/(:num)', 'BrandController::unarchive/$1'); // Desarchivar marca
//Coches
$routes->get('coches', 'CarController::index'); // Listar coches
$routes->get('coches/save', 'CarController::saveCar'); // Mostrar formulario para crear coche
$routes->get('coches/save/(:num)', 'CarController::saveCar/$1'); // Mostrar formulario para editar coche
$routes->post('coches/save', 'CarController::saveCar'); // Crear marca (POST)
$routes->post('coches/save/(:num)', 'CarController::saveCar/$1'); // Editar marca (POST)
$routes->get('coches/archive/(:num)', 'CarController::archive/$1'); // Archivar marca
$routes->get('coches/unarchive/(:num)', 'CarController::unarchive/$1'); // Desarchivar marca
//Ventas
$routes->get('ventas', 'SaleController::index'); // Listar coches
$routes->get('ventas/save', 'SaleController::saveSale'); // Mostrar formulario para crear coche
$routes->get('ventas/save/(:num)', 'SaleController::saveSale/$1'); // Mostrar formulario para editar coche
$routes->post('ventas/save', 'SaleController::saveSale'); // Crear marca (POST)
$routes->post('ventas/save/(:num)', 'SaleController::saveSale/$1'); // Editar marca (POST)
$routes->get('ventas/archive/(:num)', 'SaleController::archive/$1'); // Archivar marca
$routes->get('ventas/unarchive/(:num)', 'SaleController::unarchive/$1'); // Desarchivar marca
//Inicio de sesion y registro
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::register');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');
//Roles
$routes->get('admin/dashboard', 'AdminController::dashboard', ['filter' => 'role:1']);
$routes->get('employee/dashboard', 'EmployeeController::dashboard', ['filter' => 'role:2']);
$routes->get('customer/dashboard', 'CustomerController::dashboard', ['filter' => 'role:3']);

