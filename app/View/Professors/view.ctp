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
			<th><?php echo __('User'); ?></th>
			<td>
				<?php echo $this->Html->link($professor['User']['name'], array('controller' => 'users', 'action' => 'view', $professor['User']['id'])); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
