
<div class = 'div-with-bg'>
    
<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <center>
        <h3>Ingrese sus datos para iniciar sesion</h3>
        </center>
    </legend>
        <h4>
        <?= $this->Form->control('email', ['class' => 'form-control']) ?>
        <?= $this->Form->control('password', ['class' => 'form-control']) ?>
        </h4>
    </fieldset>
<?= $this->Form->button(__('Iniciar sesion')); ?>
<?= $this->Form->end() ?>


<p>

<?=     $this->Html->link(
    'Volver al inicio',
    ['controller' => 'Articles', 'action' => 'index']); ?>

</p>

</div>