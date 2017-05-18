<?php
  /* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
  
  /**
   * File defines the class for creating a standard member.
   *
   * Standard member's profiles will have only the first name, last name,
   * gender, age, phone number, email, state, what they are seeking, a
   * profile picture, and their biography available. Getters and Setters
   * are provided for retrieving the data within the class.
   *
   * PHP version 5
   *
   * @category   CategoryName
   * @package    PackageName
   * @author     Jonnathon McCoy <jmccoy11@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.1
   */
  
  /**
   * Class for creating a standard member
   *
   * Standard members will have access to their first name, last name,
   * gender, age, phone number, email, state, what they are seeking, a
   * profile picture, and their biography. Getters and Setters are
   * provided for retrieving the data within the class.
   *
   * @category   CategoryName
   * @package    PackageName
   * @author     Jonnathon McCoy <jmccoy11@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.1
   */
  class Member
  {
    // {{{ properties
    
    /**
     * Member's first name.
     *
     * @var       string;
     * @access    protected;
     */
    protected $fname;
    
    /**
     * Member's last name.
     *
     * @var string;
     * @access protected;
     */
    protected $lname;
    
    /**
     * Member's age name.
     *
     * @var int;
     * @access protected;
     */
    protected $age;
    
    /**
     * Member's gender.
     *
     * @var string;
     * @access protected;
     */
    protected $gender;
    
    /**
     * Member's phone number.
     *
     * @var string;
     * @access protected;
     */
    protected $phone;
    
    /**
     * Member's email.
     *
     * @var string;
     * @access protected;
     */
    protected $email;
    
    /**
     * Member's state of residence.
     *
     * @var string;
     * @access protected;
     */
    protected $state;
    
    /**
     * What gender of partner the member is seeking.
     *
     * @var string;
     * @access protected;
     */
    protected $seeking;
    
    /**
     * Member's biography.
     *
     * @var string;
     * @access protected;
     */
    protected $bio;
    
    //}}}
    
    //{{{ __construct()
    
    /**
     * Constructor for the Member Class
     *
     * @param string  $fname    Member's first name.
     * @param string  $lname    Member's last name.
     * @param int     $age      Member's age.
     * @param string  $gender   Member's gender.
     * @param string  $phone    Member's phone number.
     *
     * @access public
     */
    function __construct($fname, $lname, $age, $gender, $phone)
    {
      $this->setfname($fname);
      $this->setlname($lname);
      $this->setage($age);
      $this->gender = $gender;
      $this->setphone($phone);
    }
    
    // }}}
    
    // {{{ getfname()
    
    /**
     * Retrieve the member's first name.
     *
     * @return string The member's first name.
     * @access public
     */
    function getfname()
    {
      return $this->fname;
    }
    
    //}}}
    
    // {{{ setfname()
    
    /**
     * Set the first name of the member. Checks to make sure
     * first name is not set to an empty string.
     *
     * @param string  $fname  Member's first name.
     * @access public
     */
    function setfname($fname)
    {
      if($fname != "")
      {
        $this->fname = $fname;
      }
    }
    
    //}}}
    
    // {{{ getlname()
    
    /**
     * Retrieve the member's last name.
     *
     * @return string The member's last name.
     * @access public
     */
    function getlname()
    {
      return $this->lname;
    }
    
    //}}}
    
    // {{{ setlname()
    
    /**
     * Set the last name of the member. Checks to make sure
     * last name is not set to an empty string.
     *
     * @param string  $lname  Member's last name.
     * @access public
     */
    function setlname($lname)
    {
      if($lname != "")
      {
        $this->lname = $lname;
      }
    }
    
    //}}}
    
    // {{{ getage()
    
    /**
     * Retrieve the member's age.
     *
     * @return int The member's age.
     * @access public
     */
    function getage()
    {
      return $this->age;
    }
    
    //}}}
    
    // {{{ setage()
    
    /**
     * Set the age of the member. Checks to make sure that the
     * age is a positive number between 18 and 125.
     *
     * @param int  $age  Member's last name.
     * @access public
     */
    function setage($age)
    {
      if(is_numeric($age) && $age > 0 && $age > 18 && $age < 125)
      {
        $this->age = $age;
      }
    }
    
    //}}}
    
    // {{{ getgender()
    
    /**
     * Retrieve the member's gender.
     *
     * @return string The member's gender.
     * @access public
     */
    function getgender()
    {
      return $this->gender;
    }
    
    //}}}
    
    // {{{ setgender()
    
    /**
     * Set the gender of the member.
     *
     * @param string  $gender  Member's gender
     * @access public
     */
    function setgender($gender)
    {
      $this->gender = $gender;
    }
    
    //}}}
    
    // {{{ getPhone()
    
    /**
     * Retrieve the member's phone number.
     *
     * @return string The member's phone number
     * @access public
     */
    function getphone()
    {
      
      return $this->phone;
    }
    
    //}}}
    
    // {{{ setPhone()
    
    /**
     * Set the phone number of the member. Checks to ensure phone number
     * is a 10 digit number
     *
     * @param string  $phone  Member's phone number
     * @access public
     */
    function setphone($phone)
    {
      if ($phone == "" || (is_numeric($phone) && strlen($phone) == 10))
      {
        $this->phone = $phone;
      }
    }
    
    //}}}
    
    // {{{ getemail()
    
    /**
     * Retrieve the member's email address.
     *
     * @return string The member's email address
     * @access public
     */
    function getemail()
    {
      return $this->email;
    }
    
    //}}}
    
    // {{{ setemail()
    
    /**
     * Set the email address of the member.
     *
     * @param string  $email  Member's email.
     * @access public
     */
    function setemail($email)
    {
      $this->email = $email;
    }
    
    //}}}
    
    // {{{ getstate()
    
    /**
     * Retrieve the member's state of residence.
     *
     * @return string The member's state of residence.
     * @access public
     */
    function getstate()
    {
      return $this->state;
    }

    //}}}
    
    // {{{ setstate()
    
    /**
     * Set the state of residence of the member.
     *
     * @param string  $state  Member's state of residence
     * @access public
     */
    function setstate($state)
    {
      $this->state = $state;
    }
    
    //}}}
    
    // {{{ getseeking()
    
    /**
     * Retrieve what gender of partner the member is seeking. 
     *
     * @return string The member's partner gender preference.
     * @access public
     */
    function getseeking()
    {
      return $this->seeking;
    }
    
    //}}}
    
    // {{{ setseeking()
    
    /**
     * Set the gender of partner the member is seeking.
     *
     * @param string  $seeking  Member's partner gender preference.
     * @access public
     */
    function setseeking($seeking)
    {
      $this->seeking = $seeking;
    }
    
    //}}}
    
    // {{{ getbio()
    
    /**
     * Retrieve the member's biography.
     *
     * @return string The member's biography.
     * @access public
     */
    function getbio()
    {
      return $this->bio;
    }
    
    //}}}
    
    // {{{ setbio()
    
    /**
     * Set the biography of the member.
     *
     * @param string  $bio  Member's biography.
     * @access public
     */
    function setbio($bio)
    {
      $this->bio = $bio;
    }
  }