<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
   
        <div class = 'div-with-bg'>
            <br>
            <p> <h2> <?= h($category->name) ?></h2>  </p>
            <?php 
            
            if ($category->name == 'PS4') :
                ?> <center>
                <img src="https://as01.epimg.net/meristation/imagenes/2021/07/04/reportajes/1625384254_450777_1625386173_noticia_normal.jpg" alt="PS4">
                </center>
            <?php 
            endif;
            if ($category->name == 'PS5') :
                ?>
                <center>
                <img src="https://i.blogs.es/0cf846/mejores-juegos-ps5-2021/1366_2000.jpeg" alt="PS5">
                </center>
            <?php 
            endif;
            if ($category->name == 'Switch') :
                ?>
                <center>
                <img src="https://as01.epimg.net/meristation/imagenes/2020/05/11/noticias/1589174348_346460_1589174412_noticia_normal.jpg" alt="Switch">
                </center>
            <?php 
            endif;
            if ($category->name == 'PC') :
                ?>
                <center>
                <img src="https://media.vandal.net/i/1200x630/9-2020/202091011373350_1.jpg" alt="PC">
                </center>
            <?php 
            endif;
            if ($category->name == 'Xbox One') :
                ?>
                <center>
                <img src="https://compass-ssl.xbox.com/assets/1f/96/1f96e66b-c69a-461e-9f74-c797ad8c74ad.jpg?n=XGP-Getting-Started_Super-Hero-1400_1920x1080_04.jpg" alt="Xbox One">
                </center>
            <?php 
            endif;
            if ($category->name == 'Xbox Series X/S') :
                ?>
                <center>
                <img src="https://images.purexbox.com/46d00d1c31704/best-xbox-series-x-games-to-play-right-now.large.jpg" alt="Xbox Series X/S">
                </center>
                <?php 
            endif; ?>

            <p> <h4>  <?= h($category->description) ?>   </h4>   </p>
            
            <div class="related">
                <h3><?= __('Categorias disponibles:') ?></h3>
                <?php if (!empty($category->child_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        
                        <?php foreach ($category->child_categories as $childCategories) : ?>
                        <tr>
                       <h3> <?= $this->Html->link(h($childCategories->name), ['controller' => 'Categories', 'action' => 'related', $childCategories->id]) ?> </h3>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; 
                if (empty($category->child_categories)) :
                    ?>
    
                    <h5> Actualmente no hay categorias disponibles para la plataforma seleccionada...</h5>
                    <?php endif; ?>
            
            </div>
            

            <?= $this->Html->link(
    'Volver al listado de categorias',
    ['controller' => 'Categories', 'action' => 'index']
) ?>

</div>

