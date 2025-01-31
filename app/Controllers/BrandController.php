<?php

namespace App\Controllers;

use App\Models\BrandModel;

class BrandController extends BaseController
{
    public function index()
    {
        $brandModel = new BrandModel();

        // Obtener el nombre de las marcas
        $data['marcas'] = $brandModel->findAll();

        // Filtrar marcas si se proporcionan nombre 
        $name = $this->request->getVar('nombre');
        $sort = $this->request->getVar('sort');
        $order = $this->request->getVar('order') == 'desc' ? 'desc' : 'asc';

        $query = $brandModel;

        if ($name) {
            $query = $query->like('marcas.nombre', $name);
        }

        if ($sort && in_array($sort, ['nombre'])) {
            $query = $query->orderBy($sort, $order);
        }


        // Paginación
        $perPage = 10; // Número de elementos por página
        $data['marcas'] = $query->paginate($perPage);
        $data['pager'] = $brandModel->pager;

        $data['name'] = $name;
        $data['sort'] = $sort;
        $data['order'] = $order;
        $data['perPage'] = $perPage;

        return view('brand_list', $data);
    }

    public function saveBrand($id = null)
    {
        $brandModel = new BrandModel();
        helper(['form', 'url']);
    
        // Cargar datos de la marca si es edición
        $data['marcas'] = $id ? $brandModel->find($id) : null;
        $data['isEdit'] = $id ? true : false;


    
        if ($this->request->getMethod() == 'GET'|| true) {
    
    
            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre' => 'required',
            ]);
      
    
            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $brandData = [
                    'nombre' => $this->request->getPost('nombre'),
                ];
    
                $data['validation'] = $validation;
                $brandModel->save($brandData);
                $message = 'Marca creada correctamente.';
            } else {
                // Preparar datos del formulario
                $brandData = [
                    'nombre' => $this->request->getPost('nombre'),
                ];
    
                if ($id) {
                    // Actualizar marca existente
                    $brandModel->update($id, $brandData);
                    $message = 'Marca actualizada correctamente.';
                } else {
                    // Crear nuevo marca
                    $brandModel->save($brandData);
                    $message = 'Marca creada correctamente.';
                }
    
                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/marcas')->with('success', $message);
            }
        }

        
        // Cargar la vista del formulario (crear/editar)
        return view('brand_form', $data);
    }

    public function delete($id)
    {
        $brandModel = new BrandModel();
        
        // Verificar que el ID existe antes de eliminar
        if ($brandModel->find($id)) {
            $brandModel->delete($id);
            return redirect()->to('/marcas')->with('success', 'Marca eliminada correctamente');
        } else {
            return redirect()->to('/marcas')->with('error', 'Marca no encontrada');
        }
    }
}
