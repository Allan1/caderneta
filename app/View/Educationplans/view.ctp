<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Educationplan'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="educationplans view">
          	<table class="table table-striped">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<td>
				<?php echo h($educationplan['Educationplan']['id']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Content'); ?></th>
			<td>
				<?php echo h($educationplan['Educationplan']['content']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Discipline'); ?></th>
			<td>
				<?php echo $this->Html->link($educationplan['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $educationplan['Discipline']['code'])); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
