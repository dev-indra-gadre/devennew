<?php

$config['webserviceinfo'] = array(
 
     // 'url_path'=>'http://192.168.1.148/',
    
       //   'url_path'=>'http://117.247.83.43/',
      //  'url_folder'=>'GeoApi'
      //   'url_folder'=>'APIGeoTest'
        );

$config['menus']['Custom']['Candidate']= array(
        '1'=>array('Candidate List'  => array(
            'title_link' => 'Candidate List',
            'sidebar_link' => '1',
            'module'     =>'Candidate',
            'controller' => 'candidates',
            'action'     => 'index',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'1')
        ),
        '2'=>array('Registration'  => array(
            'title_link' => 'Registration',
            'sidebar_link' => '1',
            'module'     =>'Candidate',
            'controller' => 'candidates',
            'action'     => 'edit',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'2')
        ),
        '3'=>array('User List'  => array(
            'title_link' => 'User List',
            'sidebar_link' => '1',
            'module'     =>'Candidate',
            'controller' => 'Users',
            'action'     => 'index',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'3')
        ),
        
     ); 
$config['menus']['Custom']['Question']= array(
        '1'=>array('Question List'  => array(
            'title_link' => 'Question List',
            'sidebar_link' => '1',
            'module'     =>'Question',
            'controller' => 'Questions',
            'action'     => 'index',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'1')
        ),
        '2'=>array('Question Add'  => array(
            'title_link' => 'Question Add',
            'sidebar_link' => '1',
            'module'     =>'Question',
            'controller' => 'Questions',
            'action'     => 'add',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'2')
        ),
        
     ); 
$config['menus']['Custom']['Quizz']= array(
        '1'=>array('Quizz List'  => array(
            'title_link' => 'Quizz List',
            'sidebar_link' => '1',
            'module'     =>'Quizz',
            'controller' => 'Quizzes',
            'action'     => 'index',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'1')
        ),
        '2'=>array('Quizz Generate'  => array(
            'title_link' => 'Quizz Generate',
            'sidebar_link' => '1',
            'module'     =>'Quizz',
            'controller' => 'Quizzes',
            'action'     => 'generate',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'2')
        ),
        '3'=>array('Quizz Appear'  => array(
            'title_link' => 'Quizz Appear',
            'sidebar_link' => '1',
            'module'     =>'Quizz',
            'controller' => 'Quizzes',
            'action'     => 'appear',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'3')
        ),
        
     ); 


$config['menus']['Custom']['Setting']= array(
        '1'=>array('AccessRights'  => array(
            'title_link' => 'Access Rights',
            'sidebar_link' => '1',
            'module'     =>'Setting',
            'controller' => 'permissions',
            'action'     => 'index',
            'view'  =>'1',
            'edit'  =>'1',
            'order' =>'1')
        )
        
        
    );


?>

