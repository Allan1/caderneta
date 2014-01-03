<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Caderneta Eletrônica</title>
        <?php
        echo $this->Html->meta('favicon.ico', $this->webroot.'webroot/favicon.ico', array('type' => 'icon')); 
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->script('jquery-1.9.1.min');
        echo $this->Html->script('bootstrap.min');
        //echo $this->fetch('meta');
        //echo $this->fetch('css');
        ?>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
  <body id="login">
    <div class="navbar ">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                </a>
              <a class="brand" href="#" style="padding-top: 5px;padding-bottom: 5px;"><?php ?></a>
                <div class="nav-collapse collapse">
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;">
      <?php echo $this->Session->flash(); ?>
       <?php echo $this->fetch('content'); ?>
      

    </div> <!-- /container -->
  </body>
</html>