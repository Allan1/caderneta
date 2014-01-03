<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Edit Discipline'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="disciplines form">
        <?php echo $this->Form->create('Discipline'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('course_load');
		echo $this->Form->input('minimal_attendance');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
