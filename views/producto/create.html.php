<div class="row">
    <form action="?c=producto&a=create" method="post">

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" min="0" required>
        </div>

        <input type="hidden" name="crear" id="crear">

        <a href="?c=producto" class="btn btn-danger">Volver</a>
        <button type="submit" class="btn btn-primary">Crear Producto</button>

    </form>

</div>
<div class="row">
    <?php if($data_val['output']= ''): ?>
    <div class="alert alert-primary" role="alert"><?= $data_val['output'] ?></div>
    <?php endif; ?>
</div>
