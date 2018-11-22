<?php
/**
 * Created by PhpStorm.
 * User: krcasasg
 * Date: 22/11/2018
 * Time: 12:30 AM
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
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $data['nombre'] ?>" required >
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" ><?= $data['descripcion'] ?>"</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" min="0" value="<?= $data['precio'] ?>" required >
        </div>

        <input type="hidden" name="edit" id="edit">

        <a href="?c=producto" class="btn btn-danger">Volver</a>
        <button type="submit" class="btn btn-primary" id="edit" >Guardar Producto</button>


    </form>

</div>
