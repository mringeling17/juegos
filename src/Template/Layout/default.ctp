<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use App\Model\Entity\User;

$cakeDescription = 'Oxus-Juegos';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Juegos</span>.Oxus</a>
        </div>
        <div class="top-nav-links">
<?php
if($this->request->getsession()->read('Auth')) {
    echo ("Bienvenido, "); echo ($this->request->getSession()->read('Auth.User.username'));
    
   // user is logged in, show logout..user menu etc
   echo $this->Html->link('Cerrar sesion', array('controller' => 'users', 'action' => 'logout')); ?>
    <br>
   <?php
} else {
   // the user is not logged in
   echo $this->Html->link('Iniciar sesion', array('controller' => 'users', 'action' => 'login'));
   echo ("\n");
   echo $this->Html->link('Registrarse', array('controller' => 'users', 'action' => 'add'));
}
?>

        </div>
    </nav>


    <main class="main">
        <div class="container">
        <div class = "nav_menu">
    <div>

    <?php
    if($this->request->getsession()->read('Auth')) {
   // user is logged in, show logout..user menu etc
   echo $this->Html->link('Inicio', ['controller' => 'Articles', 'action' => 'index']);
   echo $this->Html->link('Añadir Entrada', ['controller' => 'Articles', 'action' => 'add']);
   echo $this->Html->link('PS4', ['controller' => 'Categories', 'action' => 'view/6']);
   echo $this->Html->link('PS5', ['controller' => 'Categories', 'action' => 'view/7']);
   echo $this->Html->link('Switch', ['controller' => 'Categories', 'action' => 'view/8']);
   echo $this->Html->link('PC', ['controller' => 'Categories', 'action' => 'view/9']);
   echo $this->Html->link('Xbox One', ['controller' => 'Categories', 'action' => 'view/10']);
   echo $this->Html->link('Xbox Series X/S', ['controller' => 'Categories', 'action' => 'view/11']);
   echo $this->Html->link('Modificar Mis Datos', ['controller' => 'Users', 'action' => 'change', $uid = $this->request->getsession()->read('Auth.User.id')]);
        if ($this->request->getsession()->read('Auth.User.role')=='admin') {
            echo $this->Html->link('Administracion', ['controller' => 'Articles', 'action' => 'admin']);
        }
} else {
    echo $this->Html->link('Inicio', ['controller' => 'Articles', 'action' => 'index']);
   echo $this->Html->link('Añadir Entrada', ['controller' => 'Articles', 'action' => 'add']);
   echo $this->Html->link('PS4', ['controller' => 'Categories', 'action' => 'view/6']);
   echo $this->Html->link('PS5', ['controller' => 'Categories', 'action' => 'view/7']);
   echo $this->Html->link('Switch', ['controller' => 'Categories', 'action' => 'view/8']);
   echo $this->Html->link('PC', ['controller' => 'Categories', 'action' => 'view/9']);
   echo $this->Html->link('Xbox One', ['controller' => 'Categories', 'action' => 'view/10']);
   echo $this->Html->link('Xbox Series X/S', ['controller' => 'Categories', 'action' => 'view/11']);
}

?>
    


    </div>
</div>

            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>



</body>

<footer>
<br><br><br><br>


</footer>
</html>
