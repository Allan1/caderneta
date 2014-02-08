<div class="row-fluid">
  <div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo __('Alunos Reprovados Por Falta'); ?></div>
    </div>
    <div class="block-content collapse in">
      <div class="form">
        <?php echo $this->Form->create('User'); ?>
          <fieldset>
          <?php
            echo $this->Form->input('semester',array('label'=>'Semestre'));
            echo $this->Form->input('discipline_code',array('label'=>'Disciplina','options'=>$disciplines));
            echo $this->Form->input('code',array('label'=>'Código da Turma','type'=>'number'));
          ?>
          </fieldset>
        <?php echo $this->Form->end(__('Enviar')); ?>
      </div>

      <div>
        <table class="table table-striped ">
          <tr>
                      <th>Código da Disciplina</th>
                      <th>Semestre</th>
                      <th>Código da Turma</th>
                      <th>Nome</th>
                      <th>Matrícula</th>
                      <th>Número de Presenças</th>
                      <th>Número Mínimo de Presenças</th>
          </tr>
          <?php foreach ($results as $value): ?>
          <tr>
            <td><?php echo h($value['view1']['discipline_code']); ?>&nbsp;</td>
            <td><?php echo h($value['view1']['semester']); ?>&nbsp;</td>
            <td><?php echo h($value['view1']['code']); ?>&nbsp;</td>
            <td><?php echo h($value['view1']['name']); ?>&nbsp;</td>
            <td><?php echo h($value['view1']['enrolment']); ?>&nbsp;</td>
            <td><?php echo h($value['view1']['attendance']); ?>&nbsp;</td>
            <td><?php echo h($value['view1']['minimal_attendance']); ?>&nbsp;</td>
          </tr>
        <?php endforeach; ?>
                </table>
      </div>
    </div>
  </div>
</div>
