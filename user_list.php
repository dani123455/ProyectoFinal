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

    
    <div class="position-absolute top-0 start-0 mt-2 ms-2">
        <a href="<?= base_url('index.php') ?>" class="btn btn-primary">Volver</a>
    </div>



    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>
    <?php if (session()->get('rol_id') == 0): ?>
        <a href="<?= base_url('usuarios/save') ?>" class="btn btn-primary mb-3">Crear Usuario</a>
    <?php endif; ?>
    <!--Formulario de busqueda-->
    <form method="GET" action="<?=base_url('usuarios')?>">
    <div class="container d-flex mb-2">
        <div class="input-group w-auto">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?= isset($name) ? $name : '' ?>">
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?= isset($email) ? $email : '' ?>">
            <input type="text" name="rol" class="form-control" placeholder="Rol" value="<?= isset($rol) ? $rol : '' ?>">
            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="<?= isset($telefono) ? $telefono : '' ?>">
            <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="<?= isset($direccion) ? $direccion : '' ?>">
            <select name="status" class="form-control">
                <option value="">Todos</option>
                <option value="alta" <?= isset($status) && $status == 'alta' ? 'selected' : '' ?>>En Alta</option>
                <option value="baja" <?= isset($status) && $status == 'baja' ? 'selected' : '' ?>>Dado de Baja</option>
            </select>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>


    <?php if (!empty($usuarios) && is_array($usuarios)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><a href="<?=base_url('usuarios?sort=nombre&order=' . ($sort == 'nombre' && $order == 'asc' ? 'desc' : 'asc'))?>">Usuario</a></th>
                    <th><a href="<?=base_url('usuarios?sort=email&order=' . ($sort == 'email' && $order == 'asc' ? 'desc' : 'asc'))?>">Email</a></th>
                    <th><a href="<?=base_url('usuarios?sort=rol_nombre&order=' . ($sort == 'rol_nombre' && $order == 'asc' ? 'desc' : 'asc'))?>">Rol</a></th>
                    <th><a href="<?=base_url('usuarios?sort=telefono&order=' . ($sort == 'telefono' && $order == 'asc' ? 'desc' : 'asc'))?>">Teléfono</a></th>
                    <th><a href="<?=base_url('usuarios?sort=direccion&order=' . ($sort == 'direccion' && $order == 'asc' ? 'desc' : 'asc'))?>">Dirección</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= esc($usuario['nombre']) ?></td>
                        <td><?= esc($usuario['email']) ?></td>
                        <td><?= esc($usuario['rol_nombre']) ?></td>
                        <td><?= esc($usuario['telefono']) ?></td>
                        <td><?= esc($usuario['direccion']) ?></td>
                        <td>
                        <?php if (session()->get('rol_id') == 0): ?>
                            <a href="<?= base_url('usuarios/save/' . $usuario['id']) ?>" class="btn btn-warning">Editar</a>
                            <?php if (is_null($usuario['fecha_baja'])): ?>
                                <a href="<?= base_url('usuarios/archive/' . $usuario['id']) ?>" class="btn btn-danger">Archivar</a>
                            <?php else: ?>
                                <a href="<?= base_url('usuarios/unarchive/' . $usuario['id']) ?>" class="btn btn-success">Desarchivar</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!--Paginador-->
        <div class="mt-4">
            <?= $pager->only(['name'])->links('default','custom_pagination') ?>
        </div>
    <?php else: ?>
        <p class="text-center">No hay usuarios registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>
