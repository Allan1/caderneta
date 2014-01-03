<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Add Grade'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="grades form">
        <?php echo $this->Form->create('Grade'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('value');
		echo $this->Form->input('evaluation_id');
		echo $this->Form->input('schoolclasses_student_id');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
