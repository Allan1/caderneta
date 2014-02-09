<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Adicionar Professor'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="professors form">
        <?php echo $this->Form->create('Professor'); ?>
          <fieldset>
        	<?php
        		echo $this->Form->input('user_id',array('label'=>'Usuário'));
            echo $this->Form->input('siape',array('type'=>'text'));
        	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
