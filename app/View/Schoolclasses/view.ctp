<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Schoolclass'); ?>        </div>
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
			<th><?php echo __('Code'); ?></th>
			<td>
				<?php echo h($schoolclass['Schoolclass']['code']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Semester'); ?></th>
			<td>
				<?php echo h($schoolclass['Schoolclass']['semester']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Discipline'); ?></th>
			<td>
				<?php echo $this->Html->link($schoolclass['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $schoolclass['Discipline']['code'])); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
