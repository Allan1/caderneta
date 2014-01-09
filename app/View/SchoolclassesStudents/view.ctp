<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Schoolclasses Estudante'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="schoolclassesStudents view">
          	<table class="table table-striped">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<td>
				<?php echo h($schoolclassesStudent['SchoolclassesStudent']['id']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Schoolclasse'); ?></th>
			<td>
				<?php echo $this->Html->link($schoolclassesStudent['Schoolclasse']['id'], array('controller' => 'schoolclasses', 'action' => 'view', $schoolclassesStudent['Schoolclasse']['id'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Student'); ?></th>
			<td>
				<?php echo $this->Html->link($schoolclassesStudent['Student']['enrolment'], array('controller' => 'students', 'action' => 'view', $schoolclassesStudent['Student']['enrolment'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Attendance'); ?></th>
			<td>
				<?php echo h($schoolclassesStudent['SchoolclassesStudent']['attendance']); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
