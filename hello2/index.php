<?php

  //Require autoload
  require_once('vendor/autoload.php');
  session_start();
  

  
  //Create an instance of the Base class
  $f3 = Base::instance();
  
  //Set our debug level
  $f3->set('DEBUG', 3); 
  
  //define the default route
  $f3->route('GET /',
             function(){
              echo 'Hello world';
              });
  
  $f3->route('GET /page1',
            function(){
              echo 'This is page 1';
            });
  
  $f3->route('GET /page1/subpage-a',
            function(){
              echo 'This is page 1, Subpage A';
            });
    
  $f3->route('GET /hi/@first/@last',
               function($f3, $params){
                
                /*
                  echo '<pre>';
                  print_r($params);
                  echo '</pre>';
                  echo 'Hi, '.$params['first']." ".$params['last'];
                */
                
                $f3->set('firstName', $params['first']);
                $f3->set('lastname', $params['last']);
                $f3->set('message', 'Howdy');
                
                $view = new View;
                echo $view->render('pages/howdy.html');
               });

  $f3->route('GET /language/@lang',
             function($f3, $params){
              switch($params['lang']){
                case 'swahili':
                  echo 'Jumbo!'; break;
                case 'spanish':
                  echo 'Hola!'; break;
                case 'farsi':
                  echo 'Salam!'; break;
                case 'english':
                  $f3->reroute('/');
                default:
                  $f3->error(404);
              };
             });
  
  $f3->route('GET /pages/form1',
             function(){
              $view = new View;
              echo $view->render('pages/form1.html');
             });
  
  $f3->route('POST /pages/form2',
             function(){
              $_SESSION['animal'] = $_POST['animal'];
              $view = new View;
              echo $view->render('pages/form2.html');
             });
  
  $f3->route('POST /pages/form3',
             function(){
              $_SESSION['color'] = $_POST['color'];
              $view = new View;
              echo $view->render('pages/form3.html');
              });
 
  $f3->route('POST /pages/results',
             function(){
              $_SESSION['date'] = $_POST['date'];
              $view = new View;
              echo $view->render('pages/results.html');
              });
  
  //Run fat-free
  $f3->run();