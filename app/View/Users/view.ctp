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
				<th><?php echo __('Email'); ?></th>
				<td>
					<?php echo h($user['User']['email']); ?>
					&nbsp;
				</td>
			</tr>
			<tr>		
				<th><?php echo __('Cpf'); ?></th>
				<td>
					<?php echo ($user['User']['cpf']); ?>
					&nbsp;
				</td>
			</tr>
			<?php if (isset($user['Student']['enrolment'])):?>
				<tr>		
					<th>Estudante</th>
					<td>
						<?php echo $this->Html->link('Ver perfil',array('controller'=>'students','action'=>'view',$user['Student']['enrolment']),array('class'=>'btn btn-primary btn-small')); ?>
						&nbsp;
					</td>
				</tr>
			<?php endif;?>
			<?php if (isset($user['Professor']['siape'])):?>
				<tr>		
					<th>Professor</th>
					<td>
						<?php echo $this->Html->link('Ver perfil',array('controller'=>'professores','action'=>'view',$user['Professor']['siape']),array('class'=>'btn btn-primary btn-small')); ?>
						&nbsp;
					</td>
				</tr>
			<?php endif;?>
		</table>
      </div>
    </div>
  </div>
</div>