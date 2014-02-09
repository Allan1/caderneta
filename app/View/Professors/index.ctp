<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Professors'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="professors index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('adicionar',array('action'=>'add'));?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
                      <th><?php echo $this->Paginator->sort('siape'); ?></th>
                      <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                      <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($professors as $professor): ?>
	<tr>
		<td><?php echo h($professor['Professor']['siape']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($professor['User']['name'], array('controller' => 'users', 'action' => 'view', $professor['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $professor['Professor']['siape']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i>'), array('action' => 'edit', $professor['Professor']['siape']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $professor['Professor']['siape']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$professor['Professor']['siape']}?")); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>