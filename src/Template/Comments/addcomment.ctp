<div class = 'div-with-bg'>
    <br>
<?php
    echo $this->Form->create($comment);
    echo $this->Form->control('comment', ['rows' => '4']);
    echo $this->Form->button(__('Comentar'));
    echo $this->Form->end();
    
?>
</div>