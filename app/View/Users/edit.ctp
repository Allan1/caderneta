<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Editar Usuário'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="users form">
        <?php echo $this->Form->create('User'); ?>
          <fieldset>
          <?php
            echo $this->Form->input('id');
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('cpf');
          ?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>
    </div>
  </div>
</div>
