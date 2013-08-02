<?php ?>
<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $pluralVar; ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="<?php echo $pluralVar; ?> form">
        <?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
          <fieldset>
            <legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
        <?php
            echo "\t<?php\n";
            foreach ($fields as $field) {
              if (strpos($action, 'add') !== false && $field == $primaryKey) {
                continue;
              } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                echo "\t\techo \$this->Form->input('{$field}');\n";
              }
            }
            if (!empty($associations['hasAndBelongsToMany'])) {
              foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                echo "\t\techo \$this->Form->input('{$assocName}');\n";
              }
            }
            echo "\t?>\n";
        ?>
          </fieldset>
        <?php
          echo "<?php echo \$this->Form->end(__('Submit')); ?>\n";
        ?>
      </div>
    </div>
  </div>
</div>
