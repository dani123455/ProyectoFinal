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
    <h1 class="text-center">Listado de Coches</h1>

    
    <div class="position-absolute top-0 start-0 mt-2 ms-2">
        <a href="<?= base_url('index.php') ?>" class="btn btn-primary">Volver</a>
    </div>



    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('coches/save') ?>" class="btn btn-primary mb-3">Crear Coche</a>
    <!--Formulario de busqueda-->
    <form method="GET" action="<?=base_url('coches')?>">
    <div class="container d-flex mb-2">
        <div class="input-group w-auto">
            <input type="text" name="marca_nombre" class="form-control" placeholder="Marca" value="<?= isset($marca_nombre) ? $marca_nombre : '' ?>">
            <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="<?= isset($modelo) ? $modelo : '' ?>">
            <input type="number" name="año" class="form-control" placeholder="Año" value="<?= isset($año) ? $año : '' ?>">
            <input type="number" name="precio" class="form-control" placeholder="Precio" value="<?= isset($precio) ? $precio : '' ?>">
            <input type="number" name="disponible" class="form-control" placeholder="Disponible" value="<?= isset($disponible) ? $disponible : '' ?>">
            <select name="status" class="form-control">
                <option value="">Todos</option>
                <option value="alta" <?= isset($status) && $status == 'alta' ? 'selected' : '' ?>>En Alta</option>
                <option value="baja" <?= isset($status) && $status == 'baja' ? 'selected' : '' ?>>Dado de Baja</option>
            </select>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>


    <?php if (!empty($coches) && is_array($coches)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><a href="<?=base_url('coches?sort=marca_nombre&order=' . ($sort == 'marca_nombre' && $order == 'asc' ? 'desc' : 'asc'))?>">Marca</a></th>
                    <th><a href="<?=base_url('coches?sort=modelo&order=' . ($sort == 'modelo' && $order == 'asc' ? 'desc' : 'asc'))?>">Modelo</a></th>
                    <th><a href="<?=base_url('coches?sort=año&order=' . ($sort == 'año' && $order == 'asc' ? 'desc' : 'asc'))?>">Año</a></th>
                    <th><a href="<?=base_url('coches?sort=precio&order=' . ($sort == 'precio' && $order == 'asc' ? 'desc' : 'asc'))?>">Precio</a></th>
                    <th><a href="<?=base_url('coches?sort=disponible&order=' . ($sort == 'disponible' && $order == 'asc' ? 'desc' : 'asc'))?>">Disponible</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coches as $coche): ?>
                    <tr>
                        <td><?= esc($coche['marca_nombre']) ?></td>
                        <td><?= esc($coche['modelo']) ?></td>
                        <td><?= esc($coche['año']) ?></td>
                        <td><?= esc($coche['precio']) ?></td>
                        <td><?= esc($coche['disponible']) ?></td>
                        <td>
                            <a href="<?= base_url('coches/save/' . $coche['id']) ?>" class="btn btn-warning">Editar</a>
                            <?php if (is_null($coche['fecha_baja'])): ?>
                                <a href="<?= base_url('coches/archive/' . $coche['id']) ?>" class="btn btn-danger">Archivar</a>
                            <?php else: ?>
                                <a href="<?= base_url('coches/unarchive/' . $coche['id']) ?>" class="btn btn-success">Desarchivar</a>
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
        <p class="text-center">No hay coches registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>
