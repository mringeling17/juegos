
<div class = 'div-with-bg'>
                        <br>
    <h3>   Plataformas Disponibles:   </h3> 
        <?php foreach ($categories as $category): 
            
            if(empty($category->parent_id)) :

            ?>              
             <h3> <?= $this->Html->link(__($category->name), ['action' => 'view', $category->id]) ?> </h3> 
        <?php 
        endif;
    endforeach; ?>
            <br>
            <br>
            <h4>
        <?= $this->Html->link(
                'Volver al inicio',
                ['controller' => 'Articles', 'action' => 'index']
            ) ?>
            </h4>



</div>




