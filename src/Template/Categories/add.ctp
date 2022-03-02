

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 * @var \Cake\Collection\CollectionInterface|string[] $parentCategories
 */
?>
    <div class = 'div-with-bg'>
    <br>
    <h2>Añadir Categoria</h2>
        <?php
            echo $this->Form->create($category);
            echo $this->Form->control('parent_id', ['options' => $parentCategories, 'empty' => false]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->button(__('Añadir'));
            echo $this->Form->end(); ?>
            
    </div>
        
    




