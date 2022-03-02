<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class = 'div-with-bg'>
<?= $this->Form->create($user,['type'=>'file']) ?>
<fieldset>
        <br>
    <center>
        <h3>Edita los campos que requieras: </h3>
        </center>
    <h4>
        <?php
            $user_photo = $user->get('profile_photo');
            echo $this->Html->image($user_photo,['alt'=>'Image', 'width' => '250','heigth' =>'250']);
            echo $this->Form->control('email');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('photo',['type'=>'file']);


        ?>
    </h4>
    </fieldset>
    <?= $this->Form->button(__('Modificar')) ?>
    <?= $this->Form->end() ?>
</div>
