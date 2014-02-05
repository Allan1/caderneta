<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Professors Schoolclass'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="professorsSchoolclasses view">
          	<table class="table table-striped">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<td>
				<?php echo h($professorsSchoolclass['ProfessorsSchoolclass']['id']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Professor'); ?></th>
			<td>
				<?php echo $this->Html->link($professorsSchoolclass['Professor']['siape'], array('controller' => 'professors', 'action' => 'view', $professorsSchoolclass['Professor']['siape'])); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Schoolclass'); ?></th>
			<td>
				<?php echo $this->Html->link($professorsSchoolclass['Schoolclass']['id'], array('controller' => 'schoolclasses', 'action' => 'view', $professorsSchoolclass['Schoolclass']['id'])); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
