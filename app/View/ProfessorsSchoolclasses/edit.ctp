<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Editar Relação de Ministrar'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="professorsSchoolclasses form">
        <?php echo $this->Form->create('ProfessorsSchoolclass'); ?>
          <fieldset>
        	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('professor_siape',array('options'=>$professors));
		echo $this->Form->input('schoolclasse_id',array('label'=>'Turma'));
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
