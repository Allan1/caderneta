<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Edit Evaluation'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="evaluations form">
        <?php echo $this->Form->create('Evaluation'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('number');
		echo $this->Form->input('date');
		echo $this->Form->input('weight');
		echo $this->Form->input('schoolclasse_id');
		echo $this->Form->input('evaluationtype_id');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
