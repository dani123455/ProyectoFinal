<?php

namespace App\Controllers;

use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpParser\Node\Expr\NullsafeMethodCall;

class UserController extends BaseController
{
    public function index()
{
    $userModel = new UserModel();

    // Obtener el nombre del rol junto con los usuarios
    $data['usuarios'] = $userModel->getUsuariosConRoles();

    // Obtener los roles
    $data['roles'] = [
        ['id' => 1, 'nombre' => 'Admin'],
        ['id' => 2, 'nombre' => 'Empleado'],
        ['id' => 3, 'nombre' => 'Cliente']
    ];

    // Filtrar usuarios si se proporcionan nombre o email
    $name = $this->request->getVar('nombre');
    $email = $this->request->getVar('email');
    $rol = $this->request->getVar('rol');
    $telefono = $this->request->getVar('telefono');
    $direccion = $this->request->getVar('direccion');
    $sort = $this->request->getVar('sort');
    $order = $this->request->getVar('order') == 'desc' ? 'desc' : 'asc';
    $status = $this->request->getVar('status');

    $query = $userModel->select('usuarios.*, roles.nombre as rol_nombre')
                        ->join('roles', 'usuarios.rol_id = roles.id');

    // Filtrar según los parámetros
    if ($name) {
        $query = $query->like('usuarios.nombre', $name);
    }
    if ($email) {
        $query = $query->like('usuarios.email', $email);
    }
    if ($rol) {
        $query = $query->like('roles.nombre', $rol);
    }
    if ($telefono) {
        $query = $query->like('usuarios.telefono', $telefono);
    }
    if ($direccion) {
        $query = $query->like('usuarios.direccion', $direccion);
    }
    if ($sort && in_array($sort, ['nombre', 'email', 'rol_nombre', 'telefono', 'direccion'])) {
        $query = $query->orderBy($sort, $order);
    }
    if ($status == 'baja') {
        $query = $query->where('usuarios.fecha_baja IS NOT NULL');
    } elseif ($status == 'alta') {
        $query = $query->where('usuarios.fecha_baja IS NULL');
    }

    // Paginación
    $perPage = 10;
    $data['usuarios'] = $query->paginate($perPage);
    $data['pager'] = $userModel->pager;

    // Pasar filtros y otros parámetros
    $data['name'] = $name;
    $data['email'] = $email;
    $data['rol'] = $rol;
    $data['telefono'] = $telefono;
    $data['direccion'] = $direccion;
    $data['sort'] = $sort;
    $data['order'] = $order;
    $data['perPage'] = $perPage;
    $data['status'] = $status;

    // Pasar los roles a la vista
    return view('user/user_list', $data);
}

public function saveUser($id = null)
{
    $userModel = new UserModel();
    helper(['form', 'url']);

    $roles = [
        ['id' => 1, 'nombre' => 'Admin'],
        ['id' => 2, 'nombre' => 'Empleado'],
        ['id' => 3, 'nombre' => 'Cliente']
    ];
    
    // Cargar datos del usuario si es edición
    $data['usuario'] = $id ? $userModel->find($id) : null;
    $data['isEdit'] = $id ? true : false;
    $data['roles'] = $roles;

    if ($this->request->getMethod() == 'post') {

        // Reglas de validación
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
            'rol_id' => 'required',
            'telefono' => 'required|numeric|min_length[10]|max_length[15]',
            'direccion' => 'required|min_length[10]|max_length[255]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Mostrar errores de validación
            $data['validation'] = $validation;
        } else {
            // Preparar datos del formulario
            $userData = [
                'nombre' => $this->request->getPost('nombre'),
                'email' => $this->request->getPost('email'),
                'rol_id' => $this->request->getPost('rol_id'),
                'telefono' => $this->request->getPost('telefono'),
                'direccion' => $this->request->getPost('direccion'), 
            ];

            if ($id === null) {
                // Crear nuevo usuario
                $userModel->save($userData);
                $message = 'Usuario creado correctamente.';
            } else {
                
        // Actualizar usuario existente
                $userModel->update($id, $userData);
                $message = 'Usuario actualizado correctamente.';
            }

            // Redirigir al listado con un mensaje de éxito
            return redirect()->to('/usuarios')->with('success', $message);
        }
    }

    // Cargar la vista del formulario (crear/editar)
    return view('user/user_form', $data);
}


    public function archive($id)
    {
        $userModel = new UserModel();
    
        // Verificar que el ID existe
        $usuario = $userModel->find($id);
        if ($usuario) {
            // Obtener la fecha actual en el formato correcto
            $fecha_baja = date('Y-m-d H:i:s');
            
            // Preparar los datos para la actualización
            $data = [
                'fecha_baja' => $fecha_baja
            ];
    
            // Actualizar el usuario
            $userModel->update($id, $data);
            
            return redirect()->to('/usuarios')->with('success', 'Usuario archivado correctamente.');
        } else {
            return redirect()->to('/usuarios')->with('error', 'Usuario no encontrado.');
        }
    }

    public function unarchive($id)
{
    $userModel = new UserModel();

    // Verificar que el ID existe
    $usuario = $userModel->find($id);
    if ($usuario) {
        // Preparar los datos para la actualización
        $data = [
            'fecha_baja' => null
        ];

        // Actualizar el usuario
        $userModel->update($id, $data);
        
        return redirect()->to('/usuarios')->with('success', 'Usuario desarchivado correctamente.');
    } else {
        return redirect()->to('/usuarios')->with('error', 'Usuario no encontrado.');
    }
}

public function exportar()
{
    // Obtener la lista de usuarios desde tu modelo
    $userModel = new \App\Models\UserModel();
    $usuarios = $userModel->findAll();

    // Crear una nueva instancia de Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Encabezados de la tabla
    $sheet->setCellValue('A1', 'Name');
    $sheet->setCellValue('B1', 'Email');
    $sheet->setCellValue('C1', 'Rol');
    $sheet->setCellValue('D1', 'Phone');
    $sheet->setCellValue('E1', 'Address');

    // Llenar la hoja con los datos de los usuarios
    $row = 2; // Comenzar en la segunda fila (debajo de los encabezados)
    foreach ($usuarios as $usuario) {
        $sheet->setCellValue('A' . $row, $usuario['nombre']);
        $sheet->setCellValue('B' . $row, $usuario['email']);
        $sheet->setCellValue('C' . $row, $usuario['rol_id']);
        $sheet->setCellValue('D' . $row, $usuario['telefono']);
        $sheet->setCellValue('E' . $row, $usuario['direccion']);
        $row++;
    }

    // Crear un escritor para el archivo Excel
    $writer = new Xlsx($spreadsheet);

    // Enviar encabezados para forzar la descarga
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="user_list.xlsx"');
    header('Cache-Control: max-age=0');

    // Guardar el archivo en la salida (descargar)
    $writer->save('php://output');
    exit;
}
}
