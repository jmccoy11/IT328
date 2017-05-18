<?php
  //include the class definition
  //require 'classes/pet.php';
  
  //Instantiate the class
  
  echo "<pre>";
  
  $pet1 = new Pet("Bodach", "black");
  $pet2 = new Pet("Fido");
  $pet3 = new Pet();
  $pet4 = new Pet("", "maroon");
  $pet4->setName("Freddy");
  
  //Tell the pet to eat
  $pet1->eat();
  $pet1->talk();
  $pet1->sleep();
  
  echo "<br/>";
  
  print_r($pet1);
  print_r($pet2);
  print_r($pet3);
  print_r($pet4);
  
  $dog1 = new Dog("Kohl", "black");
  $dog1->eat(); echo "<br>";
  $dog1->fetch();
  $dog1->talk();
  
  echo "</pre>";