<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Evaluation'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="evaluations view">
          	<table class="table table-striped">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<td>
				<?php echo h($evaluation['Evaluation']['id']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Number'); ?></th>
			<td>
				<?php echo h($evaluation['Evaluation']['number']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Date'); ?></th>
			<td>
				<?php echo h($evaluation['Evaluation']['date']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Weight'); ?></th>
			<td>
				<?php echo h($evaluation['Evaluation']['weight']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Schoolclasse'); ?></th>
			<td>
				<?php echo $this->Html->link($evaluation['Schoolclasse']['id'], array('controller' => 'schoolclasses', 'action' => 'view', $evaluation['Schoolclasse']['id'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Evaluationtype'); ?></th>
			<td>
				<?php echo $this->Html->link($evaluation['Evaluationtype']['name'], array('controller' => 'evaluationtypes', 'action' => 'view', $evaluation['Evaluationtype']['id'])); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
