<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">users</div>
    </div>
    <div class="block-content collapse in">
      <div class="users form">
        <?php echo $this->Form->create('User'); ?>
          <fieldset>
            <legend><?php echo __('Add User'); ?></legend>
        	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
          </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
      </div>
    </div>
  </div>
</div>
