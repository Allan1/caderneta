<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <?php 
        $turma = '';
        if(isset($schoolclass)) {
          $turma = $schoolclass['Schoolclass']['semester'].' '.$schoolclass['Schoolclass']['discipline_code'].' '.$schoolclass['Schoolclass']['code'];
          $schoolclasse_id = $schoolclass['Schoolclass']['id'];
        }
        else
          $schoolclasse_id = null;
      ?>
      <div class="muted pull-left"><?php echo __('Professores da Turma '.$turma); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="professorsSchoolclasses index">
        <?php if($isAdmin):?>
          <div class="btn-group">
            <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><?php echo $this->Html->link('adicionar',array('action'=>'add',$schoolclasse_id));?></li>
            </ul>
          </div>
        <?php endif;?>
        <table class="table table-striped ">
          <tr>
                      <th><?php echo $this->Paginator->sort('id'); ?></th>
                      <th><?php echo $this->Paginator->sort('professor_siape'); ?></th>
                      <th><?php echo $this->Paginator->sort('schoolclasse_id','Turma'); ?></th>
                      <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($professorsSchoolclasses as $professorsSchoolclass): ?>
	<tr>
		<td><?php echo h($professorsSchoolclass['ProfessorsSchoolclass']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($professorsSchoolclass['Professor']['siape'], array('controller' => 'professors', 'action' => 'view', $professorsSchoolclass['Professor']['siape'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($professorsSchoolclass['Schoolclass']['id'], array('controller' => 'schoolclasses', 'action' => 'view', $professorsSchoolclass['Schoolclass']['id'])); ?>
		</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $professorsSchoolclass['ProfessorsSchoolclass']['id']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
      <?php if($isAdmin):?>
  			<?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i>'), array('action' => 'edit', $professorsSchoolclass['ProfessorsSchoolclass']['id']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>
  			<?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $professorsSchoolclass['ProfessorsSchoolclass']['id'],$schoolclasse_id),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$professorsSchoolclass['ProfessorsSchoolclass']['id']}?")); ?>
      <?php endif;?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>