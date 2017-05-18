<?php

  /*
   * Author: Jonnathon McCoy
   * Filename: index.php
   * Description: Controller for jmccoy.greenrivertech.net/328/dating
   */
  
  //require the autoload file
  require_once('vendor/autoload.php');
  session_start();
  
  //Create an instance of the Base class
  $f3 = Base::instance();
  
  //set debug level
  $f3->set('DEBUG', 3);
  
  //Declare and instantiate the DB
  $datingDB = new DatingDB();
  
  //Define a default route
  $f3->route('GET /', function() {
      $view = new View;
      echo $view->render
        ('pages/home.html');
  });
  
  //Define additional routes
  
  //GET /personal_info route
  $f3->route('GET /personal_info', function() {
    $view = new View;
    echo $view->render
      ('pages/personal_info.html');
  });
  
  //POST /profile route
  $f3->route('POST /profile', function() {
    
    //if premium is set, create a Premium Member
    if(isset($_POST['premium'])){
      $member = new PremiumMember(
        trim(htmlspecialchars($_POST['firstName'])),
        trim(htmlspecialchars($_POST['lastName'])),
        trim(htmlspecialchars($_POST['age'])),
        trim(htmlspecialchars($_POST['gender'])),
        trim(htmlspecialchars(($_POST['phoneNumber'])))
        );
    }
    else{ //otherwise, create a Member
      $member = new Member(
        trim(htmlspecialchars($_POST['firstName'])),
        trim(htmlspecialchars($_POST['lastName'])),
        trim(htmlspecialchars($_POST['age'])),
        trim(htmlspecialchars($_POST['gender'])),
        trim(htmlspecialchars(($_POST['phoneNumber'])))
        );
    }
    
    //place the Object into the SESSION variable
    $_SESSION['member'] = $member;
    
    $view = new View;
    echo $view->render
      ('pages/profile.php');
  }); //POST /profile route
  
  //POST /interests route
  $f3->route('POST /interests', function() {
    
    //pull the member object out of the SESSION variable
    $member = $_SESSION['member'];
    
    //Set the variables from the POST method from the profile.html
    $member->setemail(trim(htmlspecialchars($_POST['email'])));
    $member->setstate($_POST['state']);
    $member->setseeking($_POST['seeking']);
    $member->setbio(trim(htmlspecialchars($_POST['biography'])));
    
    //put the member object back into the SESSION variable
    $_SESSION['member'] = $member;

    $view = new View;
    echo $view->render
      ('pages/interests.html');
  }); //POST /interests route
  
  //POST /profile_summary route
  $f3->route('POST /profile_summary', function($f3) {
    
    //pull the member object out of the SESSION variable
    $member = $_SESSION['member'];
    
    //if the member object is an instance of the PremiumMember class
    if(is_a($member, 'PremiumMember')){
      
      //set the variables from the POST variable from the interests.html
      //and retrieve the object's values and set to local page variables
      if(isset($_POST['indoor']))
      {
        $member->setindoor($_POST['indoor']);
        $indoor = $member->getindoor();
      }
      
      if(isset($_POST['outdoor']))
      {
        $member->setoutdoor($_POST['outdoor']);
        $outdoor = $member->getoutdoor();
      }
    }
    else{
      /*
       * if member object is not an instance of the PremiumMember class
       * these variables were not set yet.  For a PremiumMember, these
       * variables were set on the interests.html page.
       */
      
      //set the variables from the POST variable from the profile.html
      $member->setemail(trim(htmlspecialchars($_POST['email'])));
      $member->setstate($_POST['state']);
      $member->setseeking($_POST['seeking']);
      $member->setbio(trim(htmlspecialchars($_POST['biography'])));
    }
    
    //Retrieve the object's values and set to local page variables
    $fname = $member->getfname();
    $lname = $member->getlname();
    $age = $member->getage();
    $gender = $member->getgender();
    $phone = $member->getphone();
    $email = $member->getemail();
    $state = $member->getstate();
    $seeking = $member->getseeking();
    $bio = $member->getbio();
    
    //set fat-free variable for $member object
    $f3->set('member', $member);
    
    $view = new View;
    echo $view->render
      ('pages/profile_summary.php');
  }); //POST /profile_summary route
  
  //POST /add route
  $f3->route('GET /add', function($f3) {
    
    //run add() method from datingDB Class
    $GLOBALS['datingDB']->add($_SESSION['member']);
    
    //reroute to home page
    $f3->reroute('/');
  }); //POST /add route
  
  //GET /admin route
  $f3->route('GET /admin', function($f3) {
    
    //retrieve the database contents using getDBContents() method
    //in DatingDB Class
    $dbcontents = $GLOBALS['datingDB']->getDBContents();
    
    //set fat-free variable
    $f3->set('dbcontents', $dbcontents);
    
    $view = new View;
    echo $view->render
    ('pages/admin-view.php');
  }); //GET /admin route
  
  //Run fat free
  $f3->run();