<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Students'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="students index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('adicionar',array('action'=>'add'));?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
                      <th><?php echo $this->Paginator->sort('enrolment'); ?></th>
                      <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                      <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($students as $student): ?>
	<tr>
		<td><?php echo h($student['Student']['enrolment']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($student['User']['name'], array('controller' => 'users', 'action' => 'view', $student['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $student['Student']['enrolment']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i>'), array('action' => 'edit', $student['Student']['enrolment']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $student['Student']['enrolment']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$student['Student']['enrolment']}?")); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>