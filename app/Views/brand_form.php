<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($marca) ? 'Editar Marca' : 'Crear Marca' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= $isEdit ? 'Editar Marca' : 'Crear Marca' ?></h1>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="<?= isset($marca) ? base_url('marcas/save') . $marca['id'] : base_url('marcas/save') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="name" class="form-control" 
                value="<?= isset($marca) ? esc($marca['nombre']) : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-success"><?= isset($marca) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('marcas') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
