<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Edit Student'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="students form">
        <?php echo $this->Form->create('Student'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('enrolment');
		echo $this->Form->input('user_id');
		echo $this->Form->input('Schoolclass');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
