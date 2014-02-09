<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Grade'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="grades view">
          	<table class="table table-striped">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<td>
				<?php echo h($grade['Grade']['id']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Value'); ?></th>
			<td>
				<?php echo h($grade['Grade']['value']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Evaluation'); ?></th>
			<td>
				<?php echo $this->Html->link($grade['Evaluation']['id'], array('controller' => 'evaluations', 'action' => 'view', $grade['Evaluation']['id'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Schoolclasses Estudante'); ?></th>
			<td>
				<?php echo $this->Html->link($grade['SchoolclassesStudent']['id'], array('controller' => 'schoolclasses_students', 'action' => 'view', $grade['SchoolclassesStudent']['id'])); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
