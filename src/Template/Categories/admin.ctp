<div class="users index content">
<br>
<h1>Administracion de Categorias  <?= $this->Html->link(__('Agregar una Categoria'), ['action' => 'add'], ['class' => 'button float-right']) ?> </h1>

<table>
<div class="table-responsive">

    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Id Padre</th>
        <th>Fecha de creacion</th>
        <th>Opciones</th>
    </tr>

    <!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

    
    <?php foreach ($categories as $category ): ?>
    <tr>
        <td><?= $category->id 
            
        ?></td>
        <td>
            <?= $category->name ?>
        </td>
        <td>  <?= $category->parent_id ?>  </td>
        <td><?= $category->created->format("Y-m-d H:i:s") ?></td>
        <td class="actions">
            <?= $this->Html->link('Editar', ['action' => 'edit', $category->id]) ?>
            <?= $this->Form->postLink(
                'Eliminar',
                ['action' => 'delete', $category->id],
                ['confirm' => __('Estas seguro que deseas eliminar la categoria {0}?', $category->name)])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</div>


</table>

</body>
</div>
