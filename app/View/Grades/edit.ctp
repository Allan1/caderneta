<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Editar Nota'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="grades form">
        <?php echo $this->Form->create('Grade'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('value',array('label'=>'Valor'));
		echo $this->Form->input('evaluation_id',array('label'=>'Avaliação'));
		echo $this->Form->input('schoolclasses_student_id',array('label'=>'Estudante - Turma'));
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
