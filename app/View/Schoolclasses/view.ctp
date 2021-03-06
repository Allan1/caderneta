<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Turma'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="schoolclasses view">
          	<table class="table table-striped">
							<tr>
								<th><?php echo __('Id'); ?></th>
								<td>
									<?php echo h($schoolclass['Schoolclass']['id']); ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<th><?php echo __('Código'); ?></th>
								<td>
									<?php echo h($schoolclass['Schoolclass']['code']); ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<th><?php echo __('Semestre'); ?></th>
								<td>
									<?php echo h($schoolclass['Schoolclass']['semester']); ?>
									&nbsp;
								</td>
							</tr>
							<tr>
								<th><?php echo __('Disciplina'); ?></th>
								<td>
									<?php echo $this->Html->link($schoolclass['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $schoolclass['Discipline']['code'])); ?>
									&nbsp;
								</td>
							</tr>
						</table>
						<?php echo $this->Html->link('Professores',array('controller'=>'professors_schoolclasses','action'=>'index',$schoolclass['Schoolclass']['id']),array('class'=>'btn btn-primary btn-small'));?>
						<?php echo $this->Html->link('Estudantes',array('controller'=>'schoolclasses_students','action'=>'index',$schoolclass['Schoolclass']['id']),array('class'=>'btn btn-primary btn-small'));?>
						
      </div>
    </div>
  </div>
</div>
