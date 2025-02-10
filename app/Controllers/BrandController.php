<?php

namespace App\Controllers;

use App\Models\BrandModel;

class BrandController extends BaseController
{
    public function index()
    {
        $brandModel = new BrandModel();

        $data['marcas'] = $brandModel->findAll();

        // Filtrar marcas si se proporciona nombre
        $name = $this->request->getVar('nombre');
        $sort = $this->request->getVar('sort');
        $order = $this->request->getVar('order') == 'desc' ? 'desc' : 'asc';
        $status = $this->request->getVar('status');

        $query = $brandModel->select('marcas.*');

        if ($name) {
            $query = $query->like('marcas.nombre', $name);
        }

        if ($sort && in_array($sort, ['nombre'])) {
            $query = $query->orderBy($sort, $order);
        }

        if ($status == 'baja') {
            $query = $query->where('marcas.fecha_baja IS NOT NULL');
        } elseif ($status == 'alta') {
            $query = $query->where('marcas.fecha_baja IS NULL');
        }

        // Paginación
        $perPage = 10; // Número de elementos por página
        $data['marcas'] = $query->paginate($perPage);
        $data['pager'] = $brandModel->pager;

        $data['name'] = $name;
        $data['sort'] = $sort;
        $data['order'] = $order;
        $data['perPage'] = $perPage;
        $data['status'] = $status;

        return view('brand/brand_list', $data);
    }

    public function saveBrand($id = null)
    {
        $brandModel = new BrandModel();
        helper(['form', 'url']);
        
        // Cargar datos de la marca si es edición
        $data['marca'] = $id ? $brandModel->find($id) : null;
        $data['isEdit'] = $id ? true : false;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre' => 'required|min_length[3]|max_length[50]'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $brandData = [
                    'nombre' => $this->request->getPost('nombre')
                ];

                if ($id) {
                    // Actualizar marca existente
                    $brandModel->update($id, $brandData);
                    $message = 'Marca actualizada correctamente.';
                } else {
                    // Crear nueva marca
                    $brandModel->save($brandData);
                    $message = 'Marca creada correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/marcas')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('brand/brand_form', $data);
    }

    public function archive($id)
{
    $brandModel = new BrandModel();

    // Verificar que el ID existe 
    $marca = $brandModel->find($id);
    if ($marca) {
        // Obtener la fecha actual
        $fecha_baja = date('Y-m-d H:i:s');

        // Actualizar la marca sin verificar el array de datos
        $brandModel->set('fecha_baja', $fecha_baja)->where('id', $id)->update();
        
        return redirect()->to('/marcas')->with('success', 'Marca archivada correctamente.');
    } else {
        return redirect()->to('/marcas')->with('error', 'Marca no encontrada.');
    }
}


    public function unarchive($id)
    {
        $brandModel = new BrandModel();
    
        // Verificar que el ID existe
        $marca = $brandModel->find($id);
        if ($marca) {
            // Preparar los datos para la actualización
            $data = [
                'fecha_baja' => null
            ];
    
            // Actualizar la marca solo si el dataset no está vacío
            if (!empty($data)) {
                $brandModel->update($id, $data);
                return redirect()->to('/marcas')->with('success', 'Marca desarchivada correctamente.');
            } else {
                return redirect()->to('/marcas')->with('error', 'No hay datos para actualizar.');
            }
        } else {
            return redirect()->to('/marcas')->with('error', 'Marca no encontrada.');
        }
    }
}
