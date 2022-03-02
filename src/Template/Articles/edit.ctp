<br>
<h3>Editar Articulo</h3>
<?php
    echo $this->Form->create($article,['type'=>'file']);
    // Hard code the user for now.
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('category_id');
    echo $this->Form->control('title');
    echo $this->Form->control('subtitle');
    echo $this->Form->control('photo',['type'=>'file']);
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Actualizar Articulo'));
    echo $this->Form->end();
?>


<footer>


    <?= $this->Html->link(
    'Volver al inicio',
    ['controller' => 'Articles', 'action' => 'index']
) ?>



</footer>