<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <?php 
        $turma = '';
        if(isset($schoolclass)) 
          $turma = $schoolclass['Schoolclass']['semester'].' '.$schoolclass['Schoolclass']['discipline_code'].' '.$schoolclass['Schoolclass']['code'];
      ?>
        <div class="muted pull-left"><?php echo __('Estudantes da Turma '.$turma); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="schoolclassesStudents index">
        <?php if($isAdmin):?>
          <div class="btn-group">
            <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><?php echo $this->Html->link('adicionar',array('action'=>'add'));?></li>
            </ul>
          </div>
        <?php endif;?>
        <table class="table table-striped ">
          <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('schoolclasse_id','Turma'); ?></th>
            <th><?php echo $this->Paginator->sort('student_enrolment','Matrícula'); ?></th>
            <th><?php echo $this->Paginator->sort('attendance','Presenças'); ?></th>
            <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($schoolclassesStudents as $schoolclassesStudent): ?>
	<tr>
		<td><?php echo h($schoolclassesStudent['SchoolclassesStudent']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($schoolclassesStudent['Schoolclass']['semester'].' '.$schoolclassesStudent['Schoolclass']['discipline_code'].' '.$schoolclassesStudent['Schoolclass']['code'], array('controller' => 'schoolclasses', 'action' => 'view', $schoolclassesStudent['Schoolclass']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($schoolclassesStudent['Student']['enrolment'], array('controller' => 'students', 'action' => 'view', $schoolclassesStudent['Student']['enrolment'])); ?>
		</td>
		<td><?php echo h($schoolclassesStudent['SchoolclassesStudent']['attendance']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $schoolclassesStudent['SchoolclassesStudent']['id']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
      <?php if(!$isAdmin):?>
      <?php echo $this->Html->link(__('<i class="icon-list icon-white"></i>'), array('controller'=>'grades','action' => 'index', $schoolclassesStudent['SchoolclassesStudent']['id']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'notas')); ?>
      <?php echo $this->Html->link(__('<i class="icon-ok icon-white"></i>'), array('action' => 'attendance', $schoolclassesStudent['SchoolclassesStudent']['id'],$schoolclassesStudent['SchoolclassesStudent']['schoolclasse_id']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'presenças')); ?>
      <?php else:?>
			 <?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $schoolclassesStudent['SchoolclassesStudent']['id']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$schoolclassesStudent['SchoolclassesStudent']['id']}?")); ?>
      <?php endif;?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>