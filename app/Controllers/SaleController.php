<?php

namespace App\Controllers;

use App\Models\SaleModel;

class SaleController extends BaseController
{
    public function index()
    {
        $saleModel = new SaleModel();

        $data['ventas'] = $saleModel->getVentaConCoche();

        // Filtrar coches si se proporciona nombre
        $coche_id = $this->request->getVar('coche_id');
        $cliente_id = $this->request->getVar('cliente_id');
        $fecha = $this->request->getVar('fecha');
        $precio_venta = $this->request->getVar('precio_venta');
        $sort = $this->request->getVar('sort');
        $order = $this->request->getVar('order') == 'desc' ? 'desc' : 'asc';
        $status = $this->request->getVar('status');

                $query = $saleModel->select('ventas.*, coches.nombre as coche_nombre')
                ->join('coches', 'ventas.coche_id = coches.id');
                            

        if ($coche_id) {
            $query = $query->like('coches.nombre', $coche_id);
        }

        if ($cliente_id) {
            $query = $query->like('usuarios.nombre', $cliente_id);
        }

        if ($fecha) {
            $query = $query->like('ventas.fecha', $fecha);
        }

        if ($precio_venta) {
            $query = $query->like('ventas.precio_venta', $precio_venta);
        }

        if ($sort && in_array($sort, ['coche_nombre','usuario_nombre','fecha','precio_venta'])) {
            $query = $query->orderBy($sort, $order);
        }

        if ($status == 'baja') {
            $query = $query->where('ventas.fecha_baja IS NOT NULL');
        } elseif ($status == 'alta') {
            $query = $query->where('ventas.fecha_baja IS NULL');
        }

        // Paginación
        $perPage = 10; // Número de elementos por página
        $data['ventas'] = $query->paginate($perPage);
        $data['pager'] = $saleModel->pager;

        $data['coche_id'] = $coche_id;
        $data['cliente_id'] = $cliente_id;
        $data['fecha'] = $fecha;
        $data['precio_venta'] = $precio_venta;
        $data['sort'] = $sort;
        $data['order'] = $order;
        $data['perPage'] = $perPage;
        $data['status'] = $status;

        return view('sale_list', $data);
    }

    public function saveSale($id = null)
    {
        $saleModel = new SaleModel();
        helper(['form', 'url']);
        
        // Cargar datos de el coche si es edición
        $data['venta'] = $id ? $saleModel->find($id) : null;
        $data['isEdit'] = $id ? true : false;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'coche_id' => 'required',
                'usuario_id' => 'required|min_length[3]|max_length[50]',
                'fecha' => 'required|numeric|exact_length[4]|greater_than_equal_to[1900]|less_than_equal_to['.date('Y').']',
                'precio_venta' => 'required|numeric|greater_than_equal_to[0]',

            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $saleData = [
                    'coche_id' => $this->request->getPost('marca_id'),
                    'usuario_id' => $this->request->getPost('modelo'),
                    'fecha' => $this->request->getPost('año'),
                    'precio_venta' => $this->request->getPost('precio'),
                ];

                if ($id) {
                    // Actualizar coche existente
                    $saleModel->update($id, $saleData);
                    $message = 'Venta actualizada correctamente.';
                } else {
                    // Crear nueva marca
                    $saleModel->save($saleData);
                    $message = 'Venta creada correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/ventas')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('sale_form', $data);
    }

    public function archive($id)
{
    $saleModel = new SaleModel();

    // Verificar que el ID existe 
    $venta = $saleModel->find($id);
    if ($venta) {
        // Obtener la fecha actual
        $fecha_baja = date('Y-m-d H:i:s');

        // Actualizar el coche sin verificar el array de datos
        $saleModel->set('fecha_baja', $fecha_baja)->where('id', $id)->update();
        
        return redirect()->to('/ventas')->with('success', 'Venta archivado correctamente.');
    } else {
        return redirect()->to('/ventas')->with('error', 'Venta no encontrado.');
    }
}


    public function unarchive($id)
    {
        $saleModel = new SaleModel();
    
        // Verificar que el ID existe
        $venta = $saleModel->find($id);
        if ($venta) {
            // Preparar los datos para la actualización
            $data = [
                'fecha_baja' => null
            ];
    
            // Actualizar el coche solo si el dataset no está vacío
            if (!empty($data)) {
                $saleModel->update($id, $data);
                return redirect()->to('/ventas')->with('success', 'Venta desarchivada correctamente.');
            } else {
                return redirect()->to('/ventas')->with('error', 'No hay datos para actualizar.');
            }
        } else {
            return redirect()->to('/ventas')->with('error', 'Venta no encontrada.');
        }
    }
}
