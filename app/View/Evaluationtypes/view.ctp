<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Evaluationtype'); ?>        </div>
    </div>
    <div class="block-content collapse in">
      <div class="evaluationtypes view">
          	<table class="table table-striped">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<td>
				<?php echo h($evaluationtype['Evaluationtype']['id']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Name'); ?></th>
			<td>
				<?php echo h($evaluationtype['Evaluationtype']['name']); ?>
				&nbsp;
			</td>
		</tr>
	</table>
      </div>
    </div>
  </div>
</div>
