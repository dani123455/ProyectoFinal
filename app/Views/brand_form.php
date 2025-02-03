<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($marcas) ? 'Editar Marca' : 'Crear Marca' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= $isEdit ? 'Editar Marca' : 'Crear Marca' ?></h1>

    <!-- Mostrar mensajes de éxito -->
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success">
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>

    <!-- Mostrar mensajes de error -->
    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger">
            <?= session()->get('error') ?>
        </div>
    <?php endif; ?>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="<?= base_url('marcas/save/' . ($isEdit ? $marcas['id'] : '')) ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" 
                value="<?= isset($marcas) ? esc($marcas['nombre']) : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-success"><?= $isEdit ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('marcas') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
