<?php
use Cake\ORM\TableRegistry;

?>


<div class = 'div-with-bg'>
<center>
    <h2>
    <br>
       <mark>
        Ultimas Publicaciones
       </mark>
    </h2>

        <br>


    <div class = 'row'>
    
        <!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

    
        <?php foreach ($articles as $article ): ?>
        <div class = 'column'>
            <h3>
                <div>
                    <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
                </div>
            </h3>
            <?php echo $this->Html->image($article->photo,['alt'=>'Image', 'width' => '400','heigth' =>'400'])?>
                 <h4>
                <div class = 'mini'>
                <?= $article->subtitle ?>
                </div>
                </h4>
         <h6> Publicado por: <?= $article->creator ?></h6>
            




         <h6> A las: <?= $article->created->format("Y-m-d H:i:s") ?></h6>
         <br>
          <?php endforeach; ?>
        </div>


    </div>
</center>
</div>


