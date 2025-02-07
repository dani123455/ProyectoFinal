<?php

namespace App\Controllers;

use App\Models\SaleModel;
use App\Models\CarModel;
use App\Models\UserModel;

class SaleController extends BaseController
{
    public function index()
    {
        $saleModel = new SaleModel();
        $userModel = new UserModel();
        $carModel = new CarModel();

        $data['ventas'] = $saleModel->findAll();
        $data['coches'] = $carModel->findAll();
        $data['usuarios'] = $userModel->findAll();

        // Filtrar coches si se proporciona nombre
        $coche_id = $this->request->getVar('coche_id');
        $usuarios_id = $this->request->getVar('usuarios_id');
        $fecha = $this->request->getVar('fecha');
        $precio_venta = $this->request->getVar('precio_venta');
        $sort = $this->request->getVar('sort');
        $order = $this->request->getVar('order') == 'desc' ? 'desc' : 'asc';
        $status = $this->request->getVar('status');

        $query = $saleModel->select('ventas.*, coches.modelo as coche_modelo, usuarios.nombre as usuario_nombre')
                ->join('coches', 'ventas.coche_id = coches.id')
                ->join('usuarios', 'ventas.usuarios_id = usuarios.id'); // Cambiar a usuarios_id

        if ($coche_id) {
            $query = $query->like('coches.modelo', $coche_id);
        }

        if ($usuarios_id) {
            $query = $query->like('usuarios.nombre', $usuarios_id);
        }

        if ($fecha) {
            $query = $query->like('ventas.fecha', $fecha);
        }

        if ($precio_venta) {
            $query = $query->like('ventas.precio_venta', $precio_venta);
        }

        if ($sort && in_array($sort, ['coche_modelo', 'usuario_nombre', 'fecha', 'precio_venta'])) {
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
        $data['usuarios_id'] = $usuarios_id;
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
        $userModel = new UserModel();
        $carModel = new CarModel();

        helper(['form', 'url']);

        $data['venta'] = $id ? $saleModel->find($id) : null;
        $data['isEdit'] = $id ? true : false;
        $data['usuarios'] = $userModel->findAll();
        $data['coches'] = $carModel->findAll();

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'fecha' => 'required|valid_date[Y-m-d]',
                'precio_venta' => 'required|numeric|greater_than_equal_to[0]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $saleData = [
                    'coche_id' => $this->request->getPost('coche_id'),
                    'usuarios_id' => $this->request->getPost('usuarios_id'),
                    'fecha' => $this->request->getPost('fecha'),
                    'precio_venta' => $this->request->getPost('precio_venta'),
                ];

                if ($id) {
                    // Actualizar venta existente
                    $saleModel->update($id, $saleData);
                    $message = 'Venta actualizada correctamente.';
                } else {
                    // Crear nueva venta
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

            // Actualizar la venta sin verificar el array de datos
            $saleModel->set('fecha_baja', $fecha_baja)->where('id', $id)->update();
            
            return redirect()->to('/ventas')->with('success', 'Venta archivada correctamente.');
        } else {
            return redirect()->to('/ventas')->with('error', 'Venta no encontrada.');
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
    
            // Actualizar la venta solo si el dataset no está vacío
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


