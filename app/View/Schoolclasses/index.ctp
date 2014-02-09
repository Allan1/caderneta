<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Schoolclasses'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="schoolclasses index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('adicionar',array('action'=>'add'));?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
                      <th><?php echo $this->Paginator->sort('id'); ?></th>
                      <th><?php echo $this->Paginator->sort('code'); ?></th>
                      <th><?php echo $this->Paginator->sort('semester'); ?></th>
                      <th><?php echo $this->Paginator->sort('discipline_code'); ?></th>
                      <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($schoolclasses as $schoolclass): ?>
	<tr>
		<td><?php echo h($schoolclass['Schoolclass']['id']); ?>&nbsp;</td>
		<td><?php echo h($schoolclass['Schoolclass']['code']); ?>&nbsp;</td>
		<td><?php echo h($schoolclass['Schoolclass']['semester']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($schoolclass['Discipline']['name'], array('controller' => 'disciplines', 'action' => 'view', $schoolclass['Discipline']['code'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $schoolclass['Schoolclass']['id']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i>'), array('action' => 'edit', $schoolclass['Schoolclass']['id']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $schoolclass['Schoolclass']['id']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$schoolclass['Schoolclass']['id']}?")); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>