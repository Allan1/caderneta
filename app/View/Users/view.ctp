<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Usuário'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="users view">
        <table class="table table-striped">
        	<tr>		
          	<th><?php echo __('Id'); ?></th>
						<td>
							<?php echo h($user['User']['id']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>		
						<th><?php echo __('Nome'); ?></th>
						<td>
							<?php echo h($user['User']['name']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>		
						<th><?php echo __('Usuário'); ?></th>
						<td>
							<?php echo h($user['User']['username']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>		
						<th><?php echo __('Criado em'); ?></th>
						<td>
							<?php echo $this->Print->datetime($user['User']['created']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>		
						<th><?php echo __('Modificado em'); ?></th>
						<td>
							<?php echo $this->Print->datetime($user['User']['modified']); ?>
							&nbsp;
						</td>
					</tr>        
				</table>
      </div>
    </div>
  </div>
</div>