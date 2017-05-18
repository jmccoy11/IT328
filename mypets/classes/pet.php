<?php
  class Pet
  {
    //declare attributes
    protected $name, $color;
    protected $id;
    
    //Declare a static attribute
    private static $_counter = 0;
    
    //default constructor
    /*
     *function __construct()
    {
      $this->_name = "unknown";
      $this->_color = "?";
    }
    */
    
    function __construct($name="unknown", $color="?")
    {
      $this->name = $name;
      self::$_counter++;
      $this->id = self::$_counter;
      $this->color = $color;
    }
    
    function eat()
    {
      echo $this->name . " is eating...";
    }
    
    function talk()
    {
      echo $this->name . " is talking...";
    }
    
    function sleep()
    {
      echo $this->name . " is sleeping...";
    }
    
    function setName($name)
    {
      $this->name = $name;
    }
    
    function getName()
    {
      return $this->name;
    }
    
    function getColor()
    {
      return $this->color;
    }
    
    function setColor($color)
    {
      $this->color = $color;
    }
  }