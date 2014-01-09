<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Editar Schoolclasses Estudante'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="schoolclassesStudents form">
        <?php echo $this->Form->create('SchoolclassesStudent'); ?>
          <fieldset>
        	<?php
      		echo $this->Form->input('id');
      		echo $this->Form->input('attendance');
      	?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
