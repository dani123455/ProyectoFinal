<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
<div class="container mt-5">
    <h1 class="text-center">Listado de Ventas</h1>

    
    <div class="position-absolute top-0 start-0 mt-2 ms-2">
        <a href="<?= base_url('index.php') ?>" class="btn btn-primary">Volver</a>
    </div>



    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('ventas/save') ?>" class="btn btn-primary mb-3">Crear Venta</a>
    <!--Formulario de busqueda-->
    <form method="GET" action="<?=base_url('ventas')?>">
    <div class="container d-flex mb-2">
        <div class="input-group w-auto">
            <input type="text" name="venta_nombre" class="form-control" placeholder="venta" value="<?= isset($venta_nombre) ? $venta_nombre : '' ?>">
            <input type="text" name="usuario_nombre" class="form-control" placeholder="Usuario" value="<?= isset($usuario_nombre) ? $usuario_nombre : '' ?>">
            <input type="number" name="fecha" class="form-control" placeholder="Fecha" value="<?= isset($fecha) ? $fecha : '' ?>">
            <input type="number" name="precio_venta" class="form-control" placeholder="Precio de venta" value="<?= isset($precio_venta) ? $precio_venta : '' ?>">
            <select name="status" class="form-control">
                <option value="">Todos</option>
                <option value="alta" <?= isset($status) && $status == 'alta' ? 'selected' : '' ?>>En Alta</option>
                <option value="baja" <?= isset($status) && $status == 'baja' ? 'selected' : '' ?>>Dado de Baja</option>
            </select>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>


    <?php if (!empty($ventas) && is_array($ventas)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><a href="<?=base_url('ventas?sort=venta_nombre&order=' . ($sort == 'marca_nombre' && $order == 'asc' ? 'desc' : 'asc'))?>">venta</a></th>
                    <th><a href="<?=base_url('ventas?sort=usuario_nombre&order=' . ($sort == 'modelo' && $order == 'asc' ? 'desc' : 'asc'))?>">Usuario</a></th>
                    <th><a href="<?=base_url('ventas?sort=fecha&order=' . ($sort == 'año' && $order == 'asc' ? 'desc' : 'asc'))?>">Fecha</a></th>
                    <th><a href="<?=base_url('ventas?sort=precio_venta&order=' . ($sort == 'precio' && $order == 'asc' ? 'desc' : 'asc'))?>">Precio de venta</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?= esc($venta['marca_nombre']) ?></td>
                        <td><?= esc($venta['usuario_nombre']) ?></td>
                        <td><?= esc($venta['fecha']) ?></td>
                        <td><?= esc($venta['precio_venta']) ?></td>
                        <td>
                            <a href="<?= base_url('ventas/save/' . $venta['id']) ?>" class="btn btn-warning">Editar</a>
                            <?php if (is_null($venta['fecha_baja'])): ?>
                                <a href="<?= base_url('ventas/archive/' . $venta['id']) ?>" class="btn btn-danger">Archivar</a>
                            <?php else: ?>
                                <a href="<?= base_url('ventas/unarchive/' . $venta['id']) ?>" class="btn btn-success">Desarchivar</a>
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
        <p class="text-center">No hay ventas registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>
