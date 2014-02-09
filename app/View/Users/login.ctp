<?php
echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => __('Login'),
    'email',
    'password'=>array('label'=>'Senha')
));
echo $this->Form->end('Login');
?>
