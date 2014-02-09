<?php
App::uses('AppHelper','View/Helper');

class PaginationHelper extends AppHelper {
	
  public function links($paginator) {
    $params = $paginator->params();
    echo '<div class="span12 ">';
      echo '<p>'.$paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registro(s) de um total de {:count}, iniciando em registro {:start}, terminando em {:end}.'))).'</p>';
      echo '<div class="btn-group">';
      if($params['prevPage']){
        echo $paginator->link('<i class="icon-fast-backward"></i> ',array('page' => (1)),array('class'=>'btn','escape'=>false,'title'=>'primeira página'));
        echo $paginator->link('<i class="icon-backward"></i> ',array('page' => ($params['page']-1)),array('class'=>'btn','escape'=>false,'title'=>'página anterior'));
      }
      else
        echo '<div class="btn" title="primeira página"><i class="icon-fast-backward"></i></div><div class="btn" title="página anterior"><i class="icon-backward"></i></div> ';
      echo $paginator->numbers(array('separator' => ''));
      if($params['nextPage']){
        echo $paginator->link(' <i class="icon-forward"></i>',array('page' => ($params['page']+1)),array('class'=>'btn','escape'=>false,'title'=>'próxima página'));
        echo $paginator->link(' <i class="icon-fast-forward"></i>',array('page' => ($params['pageCount'])),array('class'=>'btn','escape'=>false,'title'=>'última página'));
      }
      else
        echo ' <div class="btn" title="próxima página"><i class="icon-forward"></i></div><div class="btn" title="última página"><i class="icon-fast-forward"></i></div>';
      echo '</div>';
    echo '</div>';
  }

}
?>
