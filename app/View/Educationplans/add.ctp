<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Add Educationplan'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="educationplans form">
        <?php echo $this->Form->create('Educationplan'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('content');
		echo $this->Form->input('disciplines_code');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
