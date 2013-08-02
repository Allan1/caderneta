<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">users</div>
    </div>
    <div class="block-content collapse in">
      <div class="users view">
        <h2><?php echo __('User'); ?></h2>
        <table class="table table-striped">
          <tr>		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<th><?php echo __('Username'); ?></th>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
</tr><tr>		<th><?php echo __('Password'); ?></th>
		<td>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</td>
</tr><tr>		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</td>
</tr>        </table>
      </div>
    </div>
  </div>
</div>
