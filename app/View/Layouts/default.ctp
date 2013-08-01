<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="no-js">
    <head>
      <meta http-equiv="Content-type" content="text/html;charset=UTF-8"></meta>
      <meta charset="UTF-8"></meta>
        <?php echo $this->Html->charset(); ?>
        <title>Template</title>
        <?php
          echo $this->Html->meta('icon');

          echo $this->Html->css('bootstrap.min');
          echo $this->Html->script('jquery-1.9.1.min');
          echo $this->Html->script('bootstrap.min');
          echo $this->fetch('meta');
          echo $this->fetch('css');
          echo $this->fetch('script');
        ?>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                  <a class="brand" href="<?php echo $this->webroot;?>"><?php echo 'logomarca';?></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                              <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo($this->Session->read('Auth.User.username'));?><i class="caret"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php echo $this->Html->link($this->Html->tag('i','',array('class' => 'icon-edit')) . ' perfil',array('controller'=>'users','action'=>'view'),array('tabindex'=>'-1','escape'=>false));?>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                      <?php echo $this->Html->link($this->Html->tag('i','',array('class' => 'icon-off')) . ' sair',array('controller'=>'users','action'=>'logout'),array('tabindex'=>'-1','escape'=>false));?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li id="Classifications-index">
                                <?php echo $this->Html->link($this->Html->tag('i','',array('class' => 'icon-home')) . ' inicio', array('controller' => 'pages', 'action' => 'home'),array('escape' => false)); ?>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
      <div id="off-navbar" style="margin-top: 50px;">
        <div class="container-fluid container-config">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                  <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse master-menu gradient">
                    <li>
                      <a href="#" class="tab-menu"><i class="icon-cog"></i> Menu</a>
                    </li>
                  </ul>
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse ">
                        <li>
                          <a href="#"><i class="icon-user"></i> Usuários<i class="icon-chevron-down pull-right"></i></a>
                          <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse submenu">
                              <li id="Logs-index" class="subitem"><?php echo $this->Html->link('listar', array('controller' => 'users', 'action' => 'index')); ?></li>
                          </ul>
                        </li>                        
                    </ul>
                </div>
                <div class="span9" id="content">
                  <div class="row-fluid">
                      <!--Flash-->
                      <?php echo $this->Session->flash();?>
                      <!--/Flash-->
                        <div class="navbar">
                            <div class="navbar-inner ">
															<div class="row-fluid">
                                <div class="span8">
                                  <ul class="breadcrumb" >
                                      <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                                      <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                                      <li>
                                          <?php echo $this->Html->link($this->Html->tag('i','',array('class' => 'icon-home')) . ' Inicio',array('controller'=>'pages','action'=>'home'),array('escape' => false));?> <span class="divider">/</span>	
                                      </li>
                                      <li class="active"><?php if(isset($label)) echo $label;?></li>
                                  </ul>
                                </div>
															</div>															
                            </div>
                        </div>
                    </div>
                    <!--Content-->
                    <?php echo $this->fetch('content'); ?>
                    <!--/Content-->
                    <?php //echo $this->element('sql_dump'); ?>
                </div>
            </div>
            <hr>
            <footer>
                <center>NNSolutions 2013</center>
            </footer>
        </div>
        <?php echo $this->Js->writeBuffer(); ?>
      </div>
    </body>
</html>
