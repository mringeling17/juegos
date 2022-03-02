<div class = 'div-with-bg'>
    <br>
<h2>Añadir una Entrada</h2>
<?php
    echo $this->Form->create($article,['type'=>'file']);
    echo $this->Form->control('category_id', ['options' => $categories]);
    echo $this->Form->control('title');
    echo $this->Form->control('subtitle');
    echo $this->Form->control('photo',['type'=>'file']);
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Guardar Articulo'));
    echo $this->Form->end();
?>




<footer>
    <?=
    $this->Html->link(
    'Volver al inicio',
    ['controller' => 'Articles', 'action' => 'index']
) ?>



</footer>

</div>