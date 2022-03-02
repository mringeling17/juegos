<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

use function PHPSTORM_META\type;

?>
<div class = 'div-with-bg'>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <br>
    <center>
        <h3>Ingresa los datos para tu nuevo usuario</h3>
        </center>
    <h4>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
        ?>
    </h4>
    </fieldset>
    <?= $this->Form->button(__('Registrarse')) ?>
    <?= $this->Form->end() ?>
</div>
