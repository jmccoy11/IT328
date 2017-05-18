<?php
  /* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
  
  /**
   * File defines the class for creating a Premium Member.
   *
   * In addition to what standard members have access to (first name, last
   * name, gender, age, phone number, email, state, what they are seeking,
   * a profile picture, and their biography), Premium Members have the
   * ability to show what their Indoor and Outdoor interests are. Getters
   * and Setters are provided for retrieving the data within the class.
   *
   * PHP version 5
   *
   * @category   CategoryName
   * @package    PackageName
   * @author     Jonnathon McCoy <jmccoy11@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.0
   */
  
  /**
   * Class for creating a Premium Member.
   *
   * In addition to what standard members have access to (first name, last
   * name, gender, age, phone number, email, state, what they are seeking,
   * a profile picture, and their biography), Premium Members have the
   * ability to show what their Indoor and Outdoor interests are. Getters
   * and Setters are provided for retrieving the data within the class.
   *
   * @category   CategoryName
   * @package    PackageName
   * @author     Jonnathon McCoy <jmccoy11@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.0
   */
class PremiumMember extends Member
{
  // {{{ properties
    
  /**
   * Array of Indoor Interests.
   * Options include: tv, puzzles, movies, reading, cooking, playing
   * cards, board games, and video games
   *
   * @var       string[];
   * @access    private;
   */
  private $_inDoorInterests;
  
  /**
   * Array of Outdoor Interests.
   * Options include: hiking, walking, biking, climbing, swimming, and
   * collecting.
   *
   * @var       string[];
   * @access    private;
   */
  private $_outDoorInterests;
  
  //}}}
  
  //{{{ __construct()
  
  /**
   * Constructor for the PremiumMember Class.
   *
   * Premium Member Class extends from the Member class and requires all
   * the same parameters for the parent constructor as well as holding
   * arrays for indoor and outdoor interest.
   *
   * @param string    $fname    Member's first name.
   * @param string    $lname    Member's last name.
   * @param int       $age      Member's age.
   * @param string    $gender   Member's gender.
   * @param string    $phone    Member's phone number.
   *
   * @access public
   */
  function __construct($fname, $lname, $age, $gender,
                         $phone)
  {
    parent::__construct($fname, $lname, $age, $gender, $phone);
  }
  
  //}}}
   
  // {{{ getfname()
  
  /**
   * Retrieve the array with the member's indoor interests.
   *
   * @return string[] The member's indoor interests.
   * @access public
   */
  function getindoor()
  {
    return $this->_inDoorInterests;
  }
    
  //}}}
   
  // {{{ setindoor()
  
  /**
   * Set the array with the member's indoor interests.
   *
   * @param string[]  $indoor  Member's indoor interests.
   * @access public
   */
  function setindoor($indoor)
  {
    $this->_inDoorInterests = $indoor;
  }

  //}}}
   
  // {{{ getoutdoor()
  
  /**
   * Retrieve the array with the member's outdoor interests.
   *
   * @return string[] The member's outdoor interests.
   * @access public
   */
  function getoutdoor()
  {
    return $this->_outDoorInterests;
  }

  //}}}
   
  // {{{ setoutdoor()
  
  /**
   * Set the array with the member's outdoor interests.
   *
   * @param string[]  $outdoor  Member's outdoor interests.
   * @access public
   */
  function setoutdoor($outdoor)
  {
    $this->_outDoorInterests = $outdoor;
  }
}