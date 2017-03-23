<?php
use Cake\ORM\TableRegistry;

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LIMS EXAM PORTAL</title>

     <?php
     
     echo $this->Html->meta('icon');

        

        echo $this->fetch('meta');   
      //echo $this->Html->css(array(
    //                             'bootstrap',
    //                             'bootstrap-responsive.min',
    //                             'font-awesome.min',
    //                             'custom',
    //                             'styleless',
    //                             'jquery-ui-timepicker-addon',
    //                             'jquery.autocomplete',
    //                             )); ?>
<?php
        // echo $this->Html->script(array(
                                
        //                         'jquery',
        //                         'bootstrap.min',
        //                         'jquery.validate.min',
        //                         'jquery-ui-1.9.2.custom.min',
        //                         'jquery-ui-timepicker-addon',
        //                         'jquery.autocomplete.min',
                                
                                
        //                         )); 



        // echo $this->Html->css('bootstrap');
        // echo $this->Html->css('bootstrap-responsive.min');
        // echo $this->Html->css('font-awesome.min');
        // echo $this->Html->css('custom'); //costom css
        // echo $this->Html->css('styleless'); //dynamic css
        // echo $this->Html->css('start/jquery-ui');
        // echo $this->Html->css('jquery-ui-timepicker-addon');
        // echo $this->Html->css('jquery.autocomplete');
        
        // echo $this->Html->script('jquery');
        // echo $this->Html->script('bootstrap.min');
        // echo $this->Html->script('jquery.validate.min');
        // echo $this->Html->script('jquery-ui-1.9.2.custom.min');
        // echo $this->Html->script('jquery-ui-timepicker-addon');
        // echo $this->Html->script('jquery.autocomplete.min');


        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-responsive.min');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('custom'); //costom css
        echo $this->Html->css('styleless'); //dynamic css
        echo $this->Html->css('start/jquery-ui');
        echo $this->Html->css('jquery-ui-timepicker-addon');
        echo $this->Html->css('jquery.autocomplete');
        
        echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('jquery.validate.min');
        echo $this->Html->script('jquery-ui-1.9.2.custom.min');
        echo $this->Html->script('jquery-ui-timepicker-addon');
        echo $this->Html->script('jquery.autocomplete.min');
        echo $this->Html->script('common');







                                ?>


    
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php echo $this->Html->scriptBlock("var basePath='../'");
        echo $this->Html->scriptBlock("var  baseUrl = '<?php echo Router::url('/', true)?>'"); ?>
 
</head>




 <style type="text/css">
      body {
        padding-bottom: 0px;
        background-color:#fffaee;
      }
      
     .masthead .nav {
        margin-bottom: 10px;
     }
     .navbar-search {
        margin-top:0px;
     }
      a.btn {
        button.btn
      }
     .nav > li > a.no-hover:hover {
        text-decoration:none;
        background: transparent;
        color:rgb(0,136,204);
        background-image: none;
     }
     .dropdown:hover .dropdown-menu {
    /*display: block;*/
    }
    .copyright .dropup {
        display:inline-block;
    }


    </style>
    

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
  
  <?php 


   ?>
    <div class="navbar navbar-static-top">
        <div class="navbar-inner zhen-nav">
            <div class="container"><div class="logo">
        <!--    <a class="brand muted" href="<?php //echo $this->Html->url(array('plugin'=>'','controller'=>'customers','action'=>'dashboard')); ?>">
    
                <h4>LIMS Customer Portal <?php //echo "<pre>"; print_r($this->Session->read('Auth.User.customer_name')); ?></h4></a> -->

 <?php echo $this->Html->image('load.gif', array('alt' => 'CakePHP', 'border' => '0', 'data-src' => 'img/load.gif')); ?>



<?php 

 //echo $this->Html->link($this->Html->image("/img/limscustomlogo.png", array('width' => '98px', 'height' => '180px','style'=>'mask:20px;')),
// array('escape' => false, 'class' => 'colorphoto')); 
?>
<?php
                // $image_url = $this->webroot.'files/our_division/image/'.$result['OurDivision']['id'].'/'.$result['OurDivision']['image'];
                 ?>
             <!-- <img src="<?php //echo $image_url;?>" alt= "<?php //echo $result['OurDivision']['location']; ?>"/> -->

        </div>
                
                
                    <ul class="nav pull-right">
                <ul class="nav">    
                <?php 

   
      
                        
                         if($this->request->session()->check('Auth.User.id')){

                        $adminStatus =$this->request->session()->read('Auth.User.admin'); 
                ?>

   <?php
        $Profile_submenu = TableRegistry::get('Permissions');
        $Profile_submenu = $Profile_submenu->find('all',
                            [
                                'conditions' => [
                                   'Permissions.view'=>'1', 
                                   'Permissions.module'=>'Profile',
                                   'Permissions.sidebar_link'=>1,
                                   'Permissions.designation_id'=>$adminStatus,
                                ],
                                'order' => ['Permissions.order_sequence'=>'ASC']
                            ]
            );
       $Profile_submenu =$Profile_submenu->toArray();

        $Candidate_submenu = TableRegistry::get('Permissions');
        $Candidate_submenu = $Candidate_submenu->find('all',
                            [
                                'conditions' => [
                                   'Permissions.view'=>'1', 
                                   'Permissions.module'=>'Candidate',
                                   'Permissions.sidebar_link'=>1,
                                   'Permissions.designation_id'=>$adminStatus,
                                ],
                                'order' => ['Permissions.order_sequence'=>'ASC']
                            ]
            );
       $Candidate_submenu =$Candidate_submenu->toArray();

        $Question_submenu  = TableRegistry::get('Permissions');
        $Question_submenu  = $Question_submenu ->find('all',
                            [
                                'conditions' => [
                                   'Permissions.view'=>'1', 
                                   'Permissions.module'=>'Question',
                                   'Permissions.sidebar_link'=>1,
                                   'Permissions.designation_id'=>$adminStatus,
                                ],
                                'order' => ['Permissions.order_sequence'=>'ASC']
                            ]
            );
       $Question_submenu  = $Question_submenu->toArray();
       $Quizz_submenu  = TableRegistry::get('Permissions');
        $Quizz_submenu  = $Quizz_submenu ->find('all',
                            [
                                'conditions' => [
                                   'Permissions.view'=>'1', 
                                   'Permissions.module'=>'Quizz',
                                   'Permissions.sidebar_link'=>1,
                                   'Permissions.designation_id'=>$adminStatus,
                                ],
                                'order' => ['Permissions.order_sequence'=>'ASC']
                            ]
            );
       $Quizz_submenu  = $Quizz_submenu->toArray();

        $setting_submenu  = TableRegistry::get('Permissions');
        $setting_submenu  = $setting_submenu ->find('all',
                            [
                                'conditions' => [
                                   'Permissions.view'=>'1', 
                                   'Permissions.module'=>'Setting',
                                   'Permissions.sidebar_link'=>1,
                                   'Permissions.designation_id'=>$adminStatus,
                                ],
                                'order' => ['Permissions.order_sequence'=>'ASC']
                            ]
            );
       $setting_submenu  = $setting_submenu->toArray();

 ?>



        
</ul>
</li>
<li class="dropdown">
<a class="xxdropdown-toggle" data-toggle="xxdropdown" href="Users/dashboard"><span><i class="icon-list"></i></span>Home<i class="xxicon-angle-down"></i>
</a>

</li>
<?php if(!empty($Profile_submenu)){ ?>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><span><i class="icon-list"></i></span>My Profile<i class="icon-angle-down"></i>
</a>
<ul class="dropdown-menu" style="text-align:left;">
<?php foreach($Profile_submenu as $Profile_submenu){ ?>
<li><?php echo $this->Html->link($Profile_submenu->title_link,['controller' => $Profile_submenu->controller, 'action' => $Profile_submenu->action, '_full'=>true],['escape' => false]); ?></li>
<?php } ?>
</ul>
</li>
  <?php }  ?>

  <?php if(!empty($Candidate_submenu)){ ?>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><span><i class="icon-list"></i></span>Candidates<i class="icon-angle-down"></i>
</a>
<ul class="dropdown-menu" style="text-align:left;">
<?php foreach($Candidate_submenu as $Candidate_submenu){ ?>
<li><?php echo $this->Html->link($Candidate_submenu->title_link,['controller' => $Candidate_submenu->controller, 'action' => $Candidate_submenu->action, '_full'=>true],['escape' => false]); ?></li>
<?php } ?>
</ul>
</li>
  <?php }  ?>

  <?php if(!empty($Question_submenu)){ ?>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><span><i class="icon-list"></i></span>Questions<i class="icon-angle-down"></i>
</a>
<ul class="dropdown-menu" style="text-align:left;">
<?php foreach($Question_submenu as $Question_submenu){ ?>
<li><?php echo $this->Html->link($Question_submenu->title_link,['controller' => $Question_submenu->controller, 'action' => $Question_submenu->action, '_full'=>true],['escape' => false]); ?></li>
<?php } ?>
</ul>
</li>
  <?php }  ?>


  <?php if(!empty($Quizz_submenu)){ ?>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><span><i class="icon-list"></i></span>Quizzes<i class="icon-angle-down"></i>
</a>
<ul class="dropdown-menu" style="text-align:left;">
<?php foreach($Quizz_submenu as $Quizz_submenu){ ?>
<li><?php echo $this->Html->link($Quizz_submenu->title_link,['controller' => $Quizz_submenu->controller, 'action' => $Quizz_submenu->action, '_full'=>true],['escape' => false]); ?></li>
<?php } ?>
</ul>
</li>
  <?php }  ?>
    <?php if(!empty($setting_submenu)){ ?>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""><span><i class="icon-list"></i></span>Setting<i class="icon-angle-down"></i>
</a>
<ul class="dropdown-menu" style="text-align:left;">
<?php foreach($setting_submenu as $setting_submenu){ ?>
<li><?php echo $this->Html->link($setting_submenu->title_link,['controller' => $setting_submenu->controller, 'action' => $setting_submenu->action, '_full'=>true],['escape' => false]); ?></li>
<?php } ?>
</ul>
</li>
  <?php }  ?>

  





</li>

  

        </li>

    <li class="dropdown">
                <a class="dropdown-toggle"
                 data-toggle="dropdown"
                 href="#"><span><i class=""></i></span>
                  Hi, <?php
                   $userName = $this->request->session()->read('Auth.User.username');
                   echo $userName; ?><br> <?php if(!empty($adminStatus)){ echo '(Admin)';} else { echo '(Customer)'; } ?>
                  <i class="xxicon-angle-down"></i>
              </a>
     
              </li>
<?php if ($this->request->session()->check('Auth.User.id')){  ?>
    <li><?php  echo $this->Html->link('<span><i class="icon-lock"></i></span>Logout',['controller'=>'Users', 'action'=>'logout','_full'=>true], ['escape' => false]  // important 
         ); ?></li>
            <?php }else { ?>

            <li class="<?php if($this->params['controller']=='users' && $this->params['action']=='login') echo 'active'; ?>"><a href="<?php echo $this->Html->url(array('plugin'=>'','controller'=>'users','action'=>'login')); ?>"><span><i class="icon-lock"></i></span>Login</a></li>

            <?php } ?>
                               
                <?php } ?>   
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="container main-wraper">
          <?= $this->Flash->render() ?>
    
        <?php //echo $this->Session->flash('flash',array('element'=>'alert')); ?>
        <?php //echo $this->Session->flash('auth',array('element'=>'alert')); ?>
        <?php //echo $this->fetch('content'); ?>
        <?= $this->fetch('content'); ?>

    </div> <!-- /container -->
     <div class="footer">
      <div class="copyright">
      Copyright &copy; <?php echo date('Y'); ?> <span style="color: rgb(17, 119, 255);"></span>&nbsp;&nbsp;
      <div class="dropup">
          <a class="dropdown-toggle supported-by"  href="http://www.enitsol.com" target="_blank"></a>
        <li><a href="http://www.enitsol.com" target="_blank">Enable IT Solutions Pvt. Ltd.</a></li>
          <!--<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
           
            
          </ul>-->
        </div>
      </div>
      </div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php
    echo $this->Html->script('bootstrap-transition');
    echo $this->Html->script('bootstrap-alert');
    echo $this->Html->script('bootstrap-modal');
    echo $this->Html->script('bootstrap-dropdown');
    //echo $this->Html->script('bootstrap-scrollspy');
    echo $this->Html->script('bootstrap-tab');
    echo $this->Html->script('bootstrap-tooltip');
    //echo $this->Html->script('bootstrap-popover');
    echo $this->Html->script('bootstrap-button');
    echo $this->Html->script('bootstrap-collapse');
    //echo $this->Html->script('bootstrap-carousel');
    echo $this->Html->script('bootstrap-typeahead');
    ?>
    <script>
    $(document).ready(function(){
         $('.dropdown-toggle').dropdown();
    //Add Hover effect to menus
        jQuery('ul.nav li.dropdown').hover(function() {
          jQuery(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn();
        }, function() {
          jQuery(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
        });
        
        jQuery('.dropup').hover(function() {
          jQuery('div.dropup').find('.dropdown-menu').stop(true, true).delay(50).fadeIn();
        }, function() {
          jQuery('div.dropup').find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
        });
    });
    </script>
  </body>
</html>
