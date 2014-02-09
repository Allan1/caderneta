<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Professor'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="professors view">
        	<table class="table table-striped">
						<tr>
							<th><?php echo __('Siape'); ?></th>
							<td>
								<?php echo h($professor['Professor']['siape']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<th><?php echo __('Usuário'); ?></th>
							<td>
								<?php echo $this->Html->link($professor['User']['name'], array('controller' => 'users', 'action' => 'view', $professor['User']['id'])); ?>
								&nbsp;
							</td>
						</tr>
					</table>
					<p>Turmas ministradas por esse(a) professor(a):</p>
					<table class="table table-striped">
						<tr>
							<th>Semestre</th>
							<th>Disciplina</th>
							<th>Código</th>
							<th>Açoes</th>
						</tr>
						<?php foreach($professor['Schoolclass'] as $value): ?>
							<tr>
								<td><?php echo $value['semester'];?></td>
								<td><?php echo $value['discipline_code'];?></td>
								<td><?php echo $value['code'];?></td>
								<td>
									<?php echo $this->Html->link('Avaliações',array('controller'=>'evaluations','action'=>'index',$value['id']),array('class'=>'btn btn-primary btn-small'));?>
									<?php echo $this->Html->link('Estudantes',array('controller'=>'schoolclasses_students','action'=>'index',$value['id']),array('class'=>'btn btn-primary btn-small'));?>
								</td>
							</tr>
						<?php endforeach;?>
					</table>
      </div>
    </div>
  </div>
</div>
