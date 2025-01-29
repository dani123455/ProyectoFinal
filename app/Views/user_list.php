<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
<div class="container mt-5">
    <h1 class="text-center">Listado de Usuarios</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('usuarios/save') ?>" class="btn btn-primary mb-3">Crear Usuario</a>

    <?php if (!empty($usuarios) && is_array($usuarios)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol_id</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= esc($usuario['id']) ?></td>
                        <td><?= esc($usuario['nombre']) ?></td>
                        <td><?= esc($usuario['email']) ?></td>
                        <td><?= esc($usuario['rol_id']) ?></td>
                        <td><?= esc($usuario['telefono']) ?></td>
                        <td><?= esc($usuario['direccion']) ?></td>
                        <td>
                            <a href="<?= base_url('usuarios/save/' . $usuario['id']) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?=base_url('usuarios/delete/') . esc($usuario['id']) ?>" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!--Paginador-->
        <div class="mt-4">
            <?= $pager->links('default','custom_pagination') ?>
        </div>
    <?php else: ?>
        <p class="text-center">No hay usuarios registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>
