<div class = 'div-with-bg'>
            <br>
            <div>
            <h2> <mark> <?= h($category->name); ?> </mark>            
            <mark> <?= h($category->parent_category['name']); ?> </mark> </h2>
            
            </div>
           
    <div class = 'row'>
                <?php if (!empty($category->articles)) : ?>
                
                        
                        <?php foreach ($category->articles as $articles) : ?>
                            <div class = 'column'>
                            <h3><?= $this->Html->link($articles->title,   ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?></h3>
                            <?php echo $this->Html->image($articles->image_link, array('width=400 height=200')); ?>
                            <h4><?= h($articles->subtitle) ?></h4>
                            <h6> Publicado por: <?= $articles->creator ?></h6>
                            <h6> A las: <?= $articles->created->format("Y-m-d H:i:s") ?></h6>
                        <?php endforeach; ?>
                            </div>
                
                <?php endif; 
                if (empty($category->articles)) :
                ?>
                    <center>
                <h5> Actualmente no hay articulos para esta categoria...</h5>
                <?php endif; ?>
                </center>
            
        
    </div>

</div>
