<?php

  /*
   *  Author: Jonnathon McCoy
   *  Description: Controller for jmccoy.greenrivertech.net/328/mypets
   *  Filename: 
   */
  
  //require the autoload file
  require_once("vendor/autoload.php");
  
  session_start();
  
  //Create an instance of the Base class
  $f3 = Base::instance();
  
  //set debug level
  $f3->set('DEBUG', 3);
  
  //create the default route
  $f3->route('GET /',
             function(){
              $view = new View;
              echo $view->render
                ('pages/my_pets.php');
              });
    
  $f3->route('GET /create',
             function(){
              $view = new View;
              echo $view->render
                ('pages/form1.html');
              });
  
  $f3->route('POST /form2',
             function(){
              //Create a pet object
              $p = new Pet();
              $p->setName($_POST['pet-name']);
              $_SESSION['pet'] = $p;
              
              $view = new View;
              echo $view->render
                ('pages/form2.html');
                echo "<pre>"; print_r($_SESSION); echo "</pre>";
              });
  
  $f3->route('POST /results',
             function($f3){
              //Set the pet's color
              $p = $_SESSION['pet'];
              $p->setColor($_POST['color']);
              
              $f3->set('name', $p->getName());
              $f3->set('color', $p->getColor());
              
              $view = new View;
              echo $view->render
                ('pages/results.html');
                
                //echo "<pre>"; print_r($_SESSION); echo "</pre>";
              });
    
  //run fat-free
  $f3->run();
  