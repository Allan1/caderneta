<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"><?php echo __('Users'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="users index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('adicionar', array('action' => 'add')); ?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('username'); ?></th>
            <th><?php echo $this->Paginator->sort('password'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Ações'); ?></th>
          </tr>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
              <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
              <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
              <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
              <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
              <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
              <td class="actions">
                <?php echo $this->Html->link(__('<i class="icon-eye-open"></i> Ver'), array('action' => 'view', $user['User']['id']), array('class' => 'btn', 'escape' => false)); ?>
                <?php echo $this->Html->link(__('<i class="icon-pencil icon-white"></i> Editar'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                <?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i> Deletar'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger', 'escape' => false), __("Are you sure you want to delete # {$user['User']['id']}?")); ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
        <?php $this->Pagination->links($this->Paginator); ?>      </div>
    </div>
  </div>
</div>