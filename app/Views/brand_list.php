<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Marcas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
<div class="container mt-5">
    <h1 class="text-center">Listado de Marcas</h1>

    <div class="position-absolute top-0 start-0 mt-2 ms-2">
        <a href="<?= base_url('index.php') ?>" class="btn btn-primary">Volver</a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>

    <a href="<?= base_url('marcas/save') ?>" class="btn btn-primary mb-3">Crear Marca</a>
    <!-- Formulario de búsqueda -->
    <form method="GET" action="<?= base_url('marcas') ?>">
        <div class="container d-flex mb-2">
            <div class="input-group w-auto">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?= isset($name) ? $name : '' ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <?php if (!empty($marcas) && is_array($marcas)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><a href="<?= base_url('marcas?sort=nombre&order=' . ($sort == 'nombre' && $order == 'asc' ? 'desc' : 'asc')) ?>">Marca</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marcas as $marca): ?>
                    <tr>
                        <td><?= esc($marca['nombre']) ?></td>
                        <td>
                            <a href="<?= base_url('marcas/save/' . $marca['id']) ?>" class="btn btn-warning">Editar</a>
                            <?php if (isset($marca['fecha_baja']) && is_null($marca['fecha_baja'])): ?>
                                <a href="<?= base_url('marcas/archive/' . $marca['id']) ?>" class="btn btn-danger">Archivar</a>
                            <?php else: ?>
                                <a href="<?= base_url('marcas/unarchive/' . $marca['id']) ?>" class="btn btn-success">Desarchivar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Paginador -->
        <div class="mt-4">
            <?= $pager->only(['name'])->links('default', 'custom_pagination') ?>
        </div>
    <?php else: ?>
        <p class="text-center">No hay marcas registradas.</p>
    <?php endif; ?>
</div>
</body>
</html>
