<?php

class Dog extends Pet 
{
    protected $breed;

    function __construct($name="?", $gender="N", $breed="mutt") {
        
        //Pass name and gender to the superclass (Pet) constructor
	parent::__construct($name, $gender);
        
	$this->breed = $breed;		
    }
    
    function fetch() 
    {
        echo "<p>" . $this->name . " is fetching.</p>";
    }
} // End of Dog class.