<?php ?>
<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?>
        </div>
    </div>
    <div class="block-content collapse in">
      <div class="<?php echo $pluralVar; ?> view">
          <?php
            echo "\t<table class=\"table table-striped\">\n";
          foreach ($fields as $field) {
            echo "\t\t<tr>\n";
            $isKey = false;
            if (!empty($associations['belongsTo'])) {
              foreach ($associations['belongsTo'] as $alias => $details) {
                if ($field === $details['foreignKey']) {
                  $isKey = true;
                  echo "\t\t\t<th><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></th>\n";
                  echo "\t\t\t<td>\n\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t&nbsp;\n\t\t\t</td>\n";
                  break;
                }
              }
            }
            if ($isKey !== true) {
              echo "\t\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
              echo "\t\t\t<td>\n\t\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t\t&nbsp;\n\t\t\t</td>\n";
            }
            echo "\t\t</tr>\n";
          }
          echo "\t</table>\n";
          ?>
      </div>
    </div>
  </div>
</div>
