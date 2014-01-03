<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Edit Professor'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="professors form">
        <?php echo $this->Form->create('Professor'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('siape');
		echo $this->Form->input('user_id');
		echo $this->Form->input('Schoolclass');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
