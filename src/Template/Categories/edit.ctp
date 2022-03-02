<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 * @var string[]|\Cake\Collection\CollectionInterface $parentCategories
 */
?>

            <?= $this->Form->create($category) ?>
            <br>
            <fieldset>
                <h3>Editar Categoria</h3>
                <?php
                    echo $this->Form->control('parent_id', ['options' => $parentCategories, 'empty' => true]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar')) ?>
            <?= $this->Form->end() ?>

            <?= $this->Html->link(
    'Volver al administrador de categorias',
    ['controller' => 'Categories', 'action' => 'admin']
) ?>

