<?php

/* This is v2, supports inheritance
 */

class Pet 
{
    // Declare the class attributes
    //private $_name, $_gender;
    protected $name, $color;

    /*
    //Default constructor
    function __construct() 
    {
        $this->_name = "unknown";
        $this->_gender = "?";
    }
    */
    
    /*
    //Parameterized constructor
    function __construct($name, $gender) 
    {
        $this->_name = $name;
        $this->_gender = $gender;
    }
    */
    
    //Parameterized constructor with default values
    function __construct( $name = "unknown", $color = "?")
    {
        $this->name = $name;
        $this->color = $color;
    }
    
    function eat() 
    {
        echo "<p>$this->name is eating.</p>";
    }
    
    function getName() 
    {
        return $this->name;
    }

    function setName($name)
    {
        $name = strip_tags($name);
        $this->name = $name;
    }
    
    function setColor($color)
    {
        $validColors = ['purple', 'pink', 'green', 'blue'];
        if(in_array($color, $validColors)) {
            $this->color = $color;
        } else {
            throw new InvalidArgumentException;
        }
    }
    
    function getColor()
    {
        return $this->color;
    }

} // End of Pet class
