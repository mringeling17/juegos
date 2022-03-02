<?php
use Cake\ORM\TableRegistry;
echo $this->Html->css('comments');

?>


<br>
<div class = 'div-with-bg'>
    <center>
        <br>
    <h2> <?= h($article->title) ?> </h2>
    
    <?php echo $this->Html->image($article->photo,['alt'=>'Image', 'width' => '500','heigth' =>'500'])?>
    <h4> <?= h($article->subtitle) ?> </h4> 
    </center>
    <br>
<p>
<?php
    echo nl2br(h($article->body)); ?>
</p>
<h5> Categoria: <?= h($query['name']); ?>  <?= h($query2['name']); ?> </h5>

<h6> <center> <small>Publicado por: <b><?= $article->creator ?></b>, 
    <?= $article->created ?></small> </center> </h6> 

<footer>
</article>


<div class = 'div-with-bg'>
    <br>
    <?php if($this->request->getsession()->read('Auth')) { ?>

    <input type="button" value="Agregar comentario" onclick="window.open('/comments/addcomment/<?=$article->id ?>','popUpWindow','height=225,width=800,left=10,top=10,,scrollbars=yes,menubar=no'); return false;">
        <?php }else{ ?>
    <h4>Debes <a href="/users/login"> Iniciar Sesion </a> para comentar</h4> <?php }?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="be-comment-block">
	<h1 class="comments-title">Comentarios </h1>

<?php foreach($com as $comment): 
    $users = TableRegistry::getTableLocator()->get('users');
    $user = $users->get($comment['user_id'])['username'];
    $user_photo = $users->get($comment['user_id'])['profile_photo'];
    ?>
        <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">
                    <hr/>
                    <ul class="comments">
                    <li class="clearfix">
                    <?php echo $this->Html->image($user_photo,['class'=>'avatar','alt'=>''])?>
                    <div class="post-comments">
                        <p class="meta"> <?= h($comment['date'])?>
                            <?= h($user) ?>  says : <i class="pull-right"></i></p>
                        <p>
                            <?= h($comment['comment']) ?>
                        </p>
                    </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>




<center>
    <?= $this->Html->link(
    'Volver al inicio',
    ['controller' => 'Articles', 'action' => 'index']
) ?>
</center>

</footer>
</div>
