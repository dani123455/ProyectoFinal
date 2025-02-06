<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($coche) ? 'Editar Coche' : 'Crear Coche' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= $isEdit ? 'Editar Coche' : 'Crear Coche' ?></h1>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="<?= isset($coche) ? base_url('coches/save/' . $coche['id']) : base_url('coches/save') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="marca_id" class="form-label">Marca</label>
            <input type="text" name="marca_id" id="marca" class="form-control" 
                value="<?= isset($coche) ? esc($coche['marca_id']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" 
                value="<?= isset($coche) ? esc($coche['modelo']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="año" class="form-label">Año</label>
            <input type="number" name="año" id="año" class="form-control" 
                value="<?= isset($coche) ? esc($coche['año']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" 
                value="<?= isset($coche) ? esc($coche['precio']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="disponible" class="form-label">Disponible</label>
            <input type="number" name="disponible" id="disponible" class="form-control" 
                value="<?= isset($coche) ? esc($coche['disponible']) : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-success"><?= isset($coche) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('coches') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
