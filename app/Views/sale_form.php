<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($venta) ? 'Editar venta' : 'Crear venta' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"><?= $isEdit ? 'Editar venta' : 'Crear venta' ?></h1>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="<?= isset($venta) ? base_url('ventas/save/' . $venta['id']) : base_url('ventas/save') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="coche_id" class="form-label">Coche</label>
            <select name="coche_id" id="coche_id" class="form-control" required>
                <?php foreach($coches as $coche): ?>
                    <option value="<?= $coche['id'] ?>" <?= isset($venta['coche_id']) && $venta['coche_id'] == $coche['id'] ? 'selected' : '' ?>><?= $coche['modelo'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-control" required>
                <?php foreach($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>" <?= isset($venta['usuarios_id']) && $venta['usuarios_id'] == $usuario['id'] ? 'selected' : '' ?>><?= $usuario['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" 
                value="<?= isset($venta) ? esc($venta['fecha']) : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio de venta</label>
            <input type="number" name="precio_venta" id="precio_venta" class="form-control" 
                value="<?= isset($venta) ? esc($venta['precio_venta']) : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-success"><?= isset($venta) ? 'Actualizar' : 'Guardar' ?></button>
        <a href="<?= base_url('ventas') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
