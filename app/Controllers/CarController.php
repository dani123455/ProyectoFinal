<?php

namespace App\Controllers;

use App\Models\CarModel;
use App\Models\BrandModel;

class CarController extends BaseController
{
    public function index()
    {
        $brandModel = new BrandModel();
        $carModel = new CarModel();

        $data['coches'] = $carModel->getCochesConMarca();
        $data['marcas'] = $brandModel->findAll();

        // Filtrar coches si se proporciona nombre
        $marca_id = $this->request->getVar('marca_id');
        $modelo = $this->request->getVar('modelo');
        $año = $this->request->getVar('año');
        $precio = $this->request->getVar('precio');
        $disponible = $this->request->getVar('disponible');
        $sort = $this->request->getVar('sort');
        $order = $this->request->getVar('order') == 'desc' ? 'desc' : 'asc';
        $status = $this->request->getVar('status');

        $query = $carModel->select('coches.*, marcas.nombre as marca_nombre')
                        ->join('marcas', 'coches.marca_id = marcas.id');

        if ($marca_id) {
            $query = $query->like('marcas.nombre', $marca_id);
        }

        if ($modelo) {
            $query = $query->like('coches.modelo', $modelo);
        }

        if ($año) {
            $query = $query->like('coches.año', $año);
        }

        if ($precio) {
            $query = $query->like('coches.precio', $precio);
        }

        if ($disponible) {
            $query = $query->like('coches.disponible', $disponible);
        }

        if ($sort && in_array($sort, ['marca_nombre', 'modelo', 'año', 'precio', 'disponible'])) {
            $query = $query->orderBy($sort, $order);
        }

        if ($status == 'baja') {
            $query = $query->where('coches.fecha_baja IS NOT NULL');
        } elseif ($status == 'alta') {
            $query = $query->where('coches.fecha_baja IS NULL');
        }

        // Paginación
        $perPage = 10; // Número de elementos por página
        $data['coches'] = $query->paginate($perPage);
        $data['pager'] = $carModel->pager;

        $data['marca_id'] = $marca_id;
        $data['modelo'] = $modelo;
        $data['año'] = $año;
        $data['precio'] = $precio;
        $data['disponible'] = $disponible;
        $data['sort'] = $sort;
        $data['order'] = $order;
        $data['perPage'] = $perPage;
        $data['status'] = $status;

        return view('car_list', $data);
    }

    public function saveCar($id = null)
    {
        $carModel = new CarModel();
        $brandModel = new BrandModel(); // Añadido para obtener las marcas
        helper(['form', 'url']);

        // Cargar datos del coche si es edición
        $data['coche'] = $id ? $carModel->find($id) : null;
        $data['isEdit'] = $id ? true : false;
        $data['marcas'] = $brandModel->findAll(); // Pasar las marcas a la vista

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'marca_id' => 'required',
                'modelo' => 'required|min_length[3]|max_length[50]',
                'año' => 'required|numeric|exact_length[4]|greater_than_equal_to[1900]|less_than_equal_to[' . date('Y') . ']',
                'precio' => 'required|numeric|greater_than_equal_to[0]',
                'disponible' => 'required|numeric'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $carData = [
                    'marca_id' => $this->request->getPost('marca_id'),
                    'modelo' => $this->request->getPost('modelo'),
                    'año' => $this->request->getPost('año'),
                    'precio' => $this->request->getPost('precio'),
                    'disponible' => $this->request->getPost('disponible')
                ];

                if ($id) {
                    // Actualizar coche existente
                    $carModel->update($id, $carData);
                    $message = 'Coche actualizado correctamente.';
                } else {
                    // Crear nuevo coche
                    $carModel->save($carData);
                    $message = 'Coche creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/coches')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('car_form', $data);
    }

    public function archive($id)
{
    $carModel = new CarModel();

    // Verificar que el ID existe 
    $coche = $carModel->find($id);
    if ($coche) {
        // Obtener la fecha actual
        $fecha_baja = date('Y-m-d H:i:s');

        // Actualizar el coche sin verificar el array de datos
        $carModel->set('fecha_baja', $fecha_baja)->where('id', $id)->update();
        
        return redirect()->to('/coches')->with('success', 'Coche archivado correctamente.');
    } else {
        return redirect()->to('/coches')->with('error', 'Coche no encontrado.');
    }
}


    public function unarchive($id)
    {
        $carModel = new CarModel();
    
        // Verificar que el ID existe
        $coche = $carModel->find($id);
        if ($coche) {
            // Preparar los datos para la actualización
            $data = [
                'fecha_baja' => null
            ];
    
            // Actualizar el coche solo si el dataset no está vacío
            if (!empty($data)) {
                $carModel->update($id, $data);
                return redirect()->to('/coches')->with('success', 'Coche desarchivado correctamente.');
            } else {
                return redirect()->to('/coches')->with('error', 'No hay datos para actualizar.');
            }
        } else {
            return redirect()->to('/coches')->with('error', 'Coche no encontrado.');
        }
    }
}
