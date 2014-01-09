<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Professors Schoolclasses'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="professorsSchoolclasses index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('adicionar',array('action'=>'add'));?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
                      <th><?php echo $this->Paginator->sort('id'); ?></th>
                      <th><?php echo $this->Paginator->sort('professor_siape'); ?></th>
                      <th><?php echo $this->Paginator->sort('schoolclasse_id'); ?></th>
                      <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($professorsSchoolclasses as $professorsSchoolclass): ?>
	<tr>
		<td><?php echo h($professorsSchoolclass['ProfessorsSchoolclass']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($professorsSchoolclass['Professor']['siape'], array('controller' => 'professors', 'action' => 'view', $professorsSchoolclass['Professor']['siape'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($professorsSchoolclass['Schoolclasse']['id'], array('controller' => 'schoolclasses', 'action' => 'view', $professorsSchoolclass['Schoolclasse']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $professorsSchoolclass['ProfessorsSchoolclass']['id']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i>'), array('action' => 'edit', $professorsSchoolclass['ProfessorsSchoolclass']['id']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $professorsSchoolclass['ProfessorsSchoolclass']['id']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$professorsSchoolclass['ProfessorsSchoolclass']['id']}?")); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>