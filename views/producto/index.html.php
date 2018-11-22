<?php
/**
 * Created by PhpStorm.
 * User: krcasasg
 * Date: 21/11/2018
 * Time: 10:33 AM
 */
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center"><?= $data_val['title'] ?></h1>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-12">
        <a href="?c=producto&a=create" class="btn btn-info float-right">Nuevo</a>
    </div>
</div>
<br>
<table class="table table-striped table-bordered ">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th colspan="3" scope="col">Opciones</th>
    </tr>

    </thead>
    <tbody>
    <?php foreach ($data_val['data'] as $d): ?>
        <tr>
            <td><?= $d->__GET('id') ?></td>
            <td><?= $d->__GET('nombre') ?></td>
            <td><?= $d->__GET('descripcion') ?></td>
            <td><?= $d->__GET('precio') ?></td>
            <td><a href="?c=producto&a=find&id=<?= $d->__GET('id') ?>">Ver</a></td>
            <td><a href="?c=producto&a=edit&id=<?= $d->__GET('id') ?>">Editar</a></td>
            <td><a href="?c=producto&a=delete&id=<?= $d->__GET('id') ?>">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


