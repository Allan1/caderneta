<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Student'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="students view">
          	<table class="table table-striped">
		<tr>
			<th><?php echo __('Enrolment'); ?></th>
			<td>
				<?php echo h($student['Student']['enrolment']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('User'); ?></th>
			<td>
				<?php echo $this->Html->link($student['User']['name'], array('controller' => 'users', 'action' => 'view', $student['User']['id'])); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
