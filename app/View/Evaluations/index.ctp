<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Evaluations'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="evaluations index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('adicionar',array('action'=>'add'));?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
                      <th><?php echo $this->Paginator->sort('id'); ?></th>
                      <th><?php echo $this->Paginator->sort('number'); ?></th>
                      <th><?php echo $this->Paginator->sort('date'); ?></th>
                      <th><?php echo $this->Paginator->sort('weight'); ?></th>
                      <th><?php echo $this->Paginator->sort('schoolclasse_id'); ?></th>
                      <th><?php echo $this->Paginator->sort('evaluationtype_id'); ?></th>
                      <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($evaluations as $evaluation): ?>
	<tr>
		<td><?php echo h($evaluation['Evaluation']['id']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['number']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['date']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['weight']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evaluation['Schoolclasse']['id'], array('controller' => 'schoolclasses', 'action' => 'view', $evaluation['Schoolclasse']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evaluation['Evaluationtype']['name'], array('controller' => 'evaluationtypes', 'action' => 'view', $evaluation['Evaluationtype']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('<i class="icon-eye-open"></i>'), array('action' => 'view', $evaluation['Evaluation']['id']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>
			<?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i>'), array('action' => 'edit', $evaluation['Evaluation']['id']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), array('action' => 'delete', $evaluation['Evaluation']['id']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __("Tem certeza que deseja deletar # {$evaluation['Evaluation']['id']}?")); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator);?>      </div>
    </div>
  </div>
</div>