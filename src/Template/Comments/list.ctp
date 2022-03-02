<?php
    use Cake\ORM\TableRegistry;


    ?>


<div class="users index content">
<br>
<h1>Administracion de Comentarios</h1>
<div class="table-responsive">
<table>
    <tr>
        <th>Id</th>
        <th>Usuario</th>
        <th>Comentario</th>
        <th>Fecha de creacion</th>
        <th>Opciones</th>
    </tr>

    <?php
        $users = TableRegistry::getTableLocator()->get('Users');
    ?>



    <?php foreach ($comments as $com ):
        if($com['post_id'] == $id): ?>
    <tr>
        <td><?= h($com['id']); ?></td>
        <td> <?= h($users->get($com['user_id'])->username);?></td>
        <td>
            <?= $com->comment ?>
        </td>
        <td><?= $com->date->format("Y-m-d H:i:s") ?></td>
        <td class="actions">
            <?= $this->Form->postLink(
                'Eliminar',
                ['action' => 'delete', $com->id],
                ['confirm' => __('¿Seguro que desea eliminar el comentario {0}?', $com->id)])
            ?>
        </td>
    </tr>
</div>
    <?php endif;
        endforeach; ?>



</table>

</body>
</div>