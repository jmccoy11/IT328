<?php

//Require autoload
require_once('vendor/autoload.php');

//Make sure session start comes after autoload
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

//Instantiate the database class
$petsDB = new PetsDB();

//Define a default route
$f3->route('GET /',
 function($f3) {
  
  //Get all pets from the database
  $pets = $GLOBALS['petsDB']->allPets();
  
  //Assign the pets to an f3 variable
  $f3->set('pets', $pets);
  
  //Render a view
  $view = new View;
  echo $view->render('pages/all-pets.php');
});
 
//The name form
$f3->route('GET /add',
  function() {
   $view = new View;
   echo $view->render('pages/add-pet.html');
  });

//Process results and redirect to home page
$f3->route('POST /results',
  function($f3) {

   //Get the form data
   $name = $_POST['pet-name'];
   $type = $_POST['pet-type'];
   $color = $_POST['pet-color'];

   //Store the pet in the database and get the id
   $GLOBALS['petsDB']->addPet($name, $type, $color);
   
   //Redirect to the index page
   $f3->reroute('/');
  });

//Delete page
$f3->route('GET /delete/@id',
 function($f3, $params) {
  
  $GLOBALS['petsDB']->deletePet($params['id']);
  
  $f3->reroute('/');
 });


//Run fat-free
$f3->run();