<?php
/**
 * Created by PhpStorm.
 * User: krcasasg
 * Date: 21/11/2018
 * Time: 11:02 PM
 */
?>
<div class="row">
    <form action="?c=producto&a=edit" method="post">

        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" class="form-control" value="<?= $data['id'] ?>" required readonly>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $data['nombre'] ?>" required readonly>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" readonly><?= $data['descripcion'] ?>"</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" min="0" value="<?= $data['precio'] ?>" required readonly>
        </div>

        <input type="hidden" name="crear" id="show">

        <a href="?c=producto" class="btn btn-danger">Volver</a>
        <button type="button" class="btn btn-warning" onclick='window.location.href = "?c=producto&a=edit&id=<?= $data['id'] ?>"' id="habilita">Editar Producto</button>

    </form>

</div>
