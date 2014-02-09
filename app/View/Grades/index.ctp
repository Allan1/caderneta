<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Grades'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="grades index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('adicionar',array('action'=>'add',$schoolclasses_student_id));?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
                      <th><?php echo $this->Paginator->sort('id'); ?></th>
                      <th><?php echo $this->Paginator->sort('value','Valor'); ?></th>
                      <th><?php echo $this->Paginator->sort('evaluation_id','Avaliação'); ?></th>
                      <th><?php echo $this->Paginator->sort('schoolclasses_student_id','Relação Turma Estudante'); ?></th>
                      <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($grades as $grade): ?>
	<tr>
		<td><?php echo h($grade['Grade']['id']); ?>&nbsp;</td>
		<td><?php echo h($grade['Grade']['value']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($grade['Evaluation']['id'], array('controller' => 'evaluations', 'action' => 'view', $grade['Evaluation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($grade['SchoolclassesStudent']['id'], array('controller' => 'schoolclasses_students', 'action' => 'view', $grade['SchoolclassesStudent']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $grade['Grade']['id']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i>'), array('action' => 'edit', $grade['Grade']['id']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $grade['Grade']['id']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$grade['Grade']['id']}?")); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>