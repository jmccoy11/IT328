<?php
  
  class Dog extends Pet
  {
    //fields
    private $_breed;
    
    function fetch()
    {
      echo "<p>" . $this->name . " is fetching.</p>";
    }
    
    function talk()
    {
      echo $this->name . " is barking. </p>";
    }
  }