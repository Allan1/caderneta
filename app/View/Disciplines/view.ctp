<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Discipline'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="disciplines view">
          	<table class="table table-striped">
		<tr>
			<th><?php echo __('Code'); ?></th>
			<td>
				<?php echo h($discipline['Discipline']['code']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Name'); ?></th>
			<td>
				<?php echo h($discipline['Discipline']['name']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Course Load'); ?></th>
			<td>
				<?php echo h($discipline['Discipline']['course_load']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Minimal Attendance'); ?></th>
			<td>
				<?php echo h($discipline['Discipline']['minimal_attendance']); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
