<?php ?>
<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="<?php echo $pluralVar; ?> index">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">Opções <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><?php echo "<?php echo \$this->Html->link('adicionar',array('action'=>'add'));?>";?></li>
          </ul>
        </div>
        <table class="table table-striped ">
          <tr>
          <?php foreach ($fields as $field): ?>
            <th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
          <?php endforeach; ?>
            <th class="actions"><?php echo "<?php echo __('Ações'); ?>"; ?></th>
          </tr>
          <?php
          echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
          echo "\t<tr>\n";
            foreach ($fields as $field) {
              $isKey = false;
              if (!empty($associations['belongsTo'])) {
                foreach ($associations['belongsTo'] as $alias => $details) {
                  if ($field === $details['foreignKey']) {
                    $isKey = true;
                    echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                    break;
                  }
                }
              }
              if ($isKey !== true) {
                echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
              }
            }

            echo "\t\t<td class=\"actions\">\n";
            echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"icon-eye-open\"></i>'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'btn btn-small','escape'=>false,'title'=>'ver')); ?>\n";
            echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"icon-pencil icon-white\"></i>'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'btn btn-primary btn-small','escape'=>false,'title'=>'editar')); ?>\n";
            echo "\t\t\t<?php echo \$this->Form->postLink(__('<i class=\"icon-remove icon-white\"></i>'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'btn btn-danger btn-small','escape'=>false,'title'=>'deletar'), __(\"Tem certeza que deseja deletar # {\${$singularVar}['{$modelClass}']['{$primaryKey}']}?\")); ?>\n";
            echo "\t\t</td>\n";
          echo "\t</tr>\n";

          echo "<?php endforeach; ?>\n";
          ?>
        </table>
        <?php echo '<?php $this->Pagination->links($this->Paginator);?>';?>
      </div>
    </div>
  </div>
</div>