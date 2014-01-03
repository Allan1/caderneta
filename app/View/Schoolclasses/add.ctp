<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Add Schoolclass'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="schoolclasses form">
        <?php echo $this->Form->create('Schoolclass'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('semester');
		echo $this->Form->input('discipline_code');
		echo $this->Form->input('Professor');
		echo $this->Form->input('Student');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
