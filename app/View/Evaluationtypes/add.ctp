<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Adicionar Tipo de Avaliação'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="evaluationtypes form">
        <?php echo $this->Form->create('Evaluationtype'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('name');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
