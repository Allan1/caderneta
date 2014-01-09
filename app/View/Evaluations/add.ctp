<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Adicionar Avaliação'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="evaluations form">
        <?php echo $this->Form->create('Evaluation'); ?>
          <fieldset>
        	<?php
        		echo $this->Form->input('number',array('label'=>'Número'));
        		echo $this->Form->input('date',array('label'=>'Data'));
        		echo $this->Form->input('weight',array('label'=>'Peso'));
        		echo $this->Form->input('schoolclasse_id',array('label'=>'Turma'));
        		echo $this->Form->input('evaluationtype_id',array('label'=>'Tipo'));
        	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
