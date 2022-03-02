<div class="users index content">
<br>
<h1>Administracion de Articulos</h1>
<div class="table-responsive">
<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Fecha de creacion</th>
        <th>Opciones</th>
    </tr>

    <!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

    
    <?php foreach ($articles as $article ): ?>
    <tr>
        <td><?= $article->id 
            
        ?></td>
        <td>
            <?= $article->title ?>
        </td>
        <td><?= $article->created->format("Y-m-d H:i:s") ?></td>
        <td class="actions">
            <?= $this->Html->link('Editar', ['action' => 'edit', $article->id]) ?>
            <?= $this->Html->link('Comentarios',['action'=>'../comments/list',$article->id]) ?>
            <?= $this->Form->postLink( 'Eliminar',
                ['action' => 'delete', $article->id],
                ['confirm' => __('¿Seguro que desea eliminar el articulo {0}?', $article->title)])
            ?>
        </td>
    </tr>
</div>
    <?php endforeach; ?>



</table>

</body>
</div>