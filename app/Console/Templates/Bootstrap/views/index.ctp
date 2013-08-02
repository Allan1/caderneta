<?php ?>
<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $pluralVar; ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="<?php echo $pluralVar; ?> index">
        <h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
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
          echo "\t\t\t<?php echo \$this->Html->link(__('Ver'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
          echo "\t\t\t<?php echo \$this->Html->link(__('Editar'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
          echo "\t\t\t<?php echo \$this->Form->postLink(__('Deletar'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
          echo "\t\t</td>\n";
        echo "\t</tr>\n";

        echo "<?php endforeach; ?>\n";
        ?>
        </table>
        <p>
        <?php echo "<?php
        echo \$this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>"; ?>
        </p>
        <div class="paging">
        <?php
          echo "<?php\n";
          echo "\t\techo \$this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));\n";
          echo "\t\techo \$this->Paginator->numbers(array('separator' => ''));\n";
          echo "\t\techo \$this->Paginator->next(__('próximo') . ' >', array(), null, array('class' => 'next disabled'));\n";
          echo "\t?>\n";
        ?>
        </div>
      </div>
    </div>
  </div>
</div>