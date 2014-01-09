<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Disciplinas'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="disciplines index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('adicionar',array('action'=>'add'));?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
                      <th><?php echo $this->Paginator->sort('code','Código'); ?></th>
                      <th><?php echo $this->Paginator->sort('name','Nome'); ?></th>
                      <th><?php echo $this->Paginator->sort('course_load','Carga horária'); ?></th>
                      <th><?php echo $this->Paginator->sort('minimal_attendance','Frequência minima'); ?></th>
                      <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($disciplines as $discipline): ?>
	<tr>
		<td><?php echo h($discipline['Discipline']['code']); ?>&nbsp;</td>
		<td><?php echo h($discipline['Discipline']['name']); ?>&nbsp;</td>
		<td><?php echo h($discipline['Discipline']['course_load']); ?>&nbsp;</td>
		<td><?php echo h($discipline['Discipline']['minimal_attendance']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $discipline['Discipline']['code']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i>'), array('action' => 'edit', $discipline['Discipline']['code']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $discipline['Discipline']['code']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$discipline['Discipline']['code']}?")); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>