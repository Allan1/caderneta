<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Editar Turma'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="schoolclasses form">
        <?php echo $this->Form->create('Schoolclass'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code',array('label'=>'Código'));
    echo $this->Form->input('semester',array('label'=>'Semestre'));
    echo $this->Form->input('discipline_code',array('label'=>'Disciplina','options'=>$disciplines));
    echo $this->Form->input('Professor',array('label'=>'Professores'));
    echo $this->Form->input('Student',array('label'=>'Estudantes'));
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
