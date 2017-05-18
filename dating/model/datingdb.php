<?php

  /**
   * Provides CRUD access to My Dating Website Database
   *
   * PHP version 5
   *
   * Table creation sql query:
   * 
   CREATE TABLE users
    (
      userid        INT           AUTO_INCREMENT PRIMARY KEY,
      fname         VARCHAR(30)   NOT NULL,
      lname         VARCHAR(30)   NOT NULL,
      age           SMALLINT      NOT NULL,
      phone         CHAR(10),
      gender        VARCHAR(6),
      email         VARCHAR(255),
      region        CHAR(2),
      seeking       VARCHAR(6),
      bio           VARCHAR(500),
      premium       TINYINT(1) DEFAULT 0,
      image         VARCHAR(255),
      interestsHTML  VARCHAR(255)
      
      ##, CONSTRAINT ck_age CHECK (age > 18 && age < 125)   ## mysql does not support check constraints
    );
    
    CREATE TABLE interests
    (
      interestid  INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
      interest    VARCHAR(40),
      type        VARCHAR(7)
    );
    
    CREATE TABLE user_interests_junc
    (
      userid      INT,
      interestid  INT,
      
      FOREIGN KEY (userid) REFERENCES users(userid),
      FOREIGN KEY (interestid) REFERENCES interests(interestid),
      
      CONSTRAINT PK_userinterestid PRIMARY KEY (userid, interestid)
    );
    
    INSERT INTO interests
    (interest, type)
    VALUES
    ('TV', 'indoor'),
    ('puzzles', 'indoor'),
    ('movies', 'indoor'),
    ('reading', 'indoor'),
    ('cooking', 'indoor'),
    ('playing Cards', 'indoor'),
    ('board Games', 'indoor'),
    ('video Games', 'indoor'),
    ('hiking', 'outdoor'),
    ('walking', 'outdoor'),
    ('biking', 'outdoor'),
    ('climbing', 'outdoor'),
    ('swimming', 'outdoor'),
    ('collecting', 'outdoor');
    
    
   * @category   CategoryName
   * @package    PackageName
   * @author     Jonnathon McCoy <jmccoy11@mail.greenriver.edu>
   * @copyright  2017
   * @version    1.0
   */
  class DatingDB
  {
    /**
     * PHP Data Object
     */
    private $_pdo;
    
    // {{{ __construct()
    
    /**
     * Constructor for the DatingDB Class
     *
     * @access public
     */
    function __construct()
    {
        //Require configuration file
        require_once '/home/jmccoy/dating-config.php';
        
        try {
            //Establish database connection
            $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
            
            //Keep the connection open for reuse to improve performance
            $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true );
            
            //Throw an exception whenever a database error occurs
            $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            die( "Error!: " . $e->getMessage());
        }
    }
    
    //}}}
    
    //{{{ add($member)
    
    /**
     * Add a Member or Premium Member object to the database.
     *
     * @param Member A Member or PremiumMember
     */
    
    function add($member)
    {
      //check if $member is a PremiumMember
      $isPremium = $this->isPremium($member);
      
      //set default values
      $premium = 0;
      $imagePath = $this->getImagePath($member);
      $interests = "";
      
      //change defaults based on whether $member is PremiumMember
      if($isPremium)
      {
        $interests =$this->interestsToString($member);
        $premium = 1;
      }
      
      //Define the query
      $query = "INSERT INTO users (fname, lname, age, phone,
        gender, email, region, seeking, bio, premium, image, interestsHTML)
        VALUES
        (:fname, :lname, :age, :phone, :gender, :email, :region,
        :seeking, :bio, :premium, :image, :interests);";
    
      //Prepare the statement
      $statement = $this->_pdo->prepare($query);
      
      //Bind parameters
      $statement->bindParam(':fname', $member->getfname(), PDO::PARAM_STR);
      $statement->bindParam(':lname', $member->getlname(), PDO::PARAM_STR);
      $statement->bindParam(':age', $member->getage(), PDO::PARAM_INT);
      $statement->bindParam(':phone', $member->getphone(), PDO::PARAM_STR);
      $statement->bindParam(':gender', $member->getgender(), PDO::PARAM_STR);
      $statement->bindParam(':email', $member->getemail(), PDO::PARAM_STR);
      $statement->bindParam(':region', $member->getstate(), PDO::PARAM_STR);
      $statement->bindParam(':seeking', $member->getseeking(), PDO::PARAM_STR);
      $statement->bindParam(':bio', $member->getbio(), PDO::PARAM_STR);
      $statement->bindParam(':premium', $premium, PDO::PARAM_INT);
      $statement->bindParam(':image', $imagePath, PDO::PARAM_STR);
      $statement->bindParam(':interests', $interests, PDO::PARAM_STR);
      
      //Execute
      $statement->execute();
      
      //if PremiumMember, then it may have interests which will need to
      //be placed into the user_interests_junc table
      if($isPremium)
      {
        $id = $this->_pdo->lastInsertID();
        $this->insertIntoJunction($member, $id);
      }
    }
    
    //}}}
    
    //{{{ getDBContents()
    
    /**
     * Getter for retrieving the contents of the database.
     *
     * @access public
     * @return associative array Contents of dating database
     */
    function getDBContents()
    {
      //Define Query
      $query = "SELECT userid, lname, fname, age, phone, email, region, gender, seeking, premium, interestsHTML
        FROM users ORDER BY lname ASC, fname ASC";
      
      //Prepare statement
      $statement = $this->_pdo->prepare($query);
      
      //Execute Statement
      $statement->execute();
      
      //Retrieve Results
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
      
      return $results;
    }
    
    //}}}
    
    //{{{ insertIntoJunction($member, $id)
    
    /*
     * Insert interests into the junction table with userID.
     *
     * @access public
     */
    function insertIntoJunction($member, $id)
    {
      //Define query
      $query = "INSERT INTO user_interests_junc (userid, interestid)
        VALUES ($id, :value)";
      
      //Prepare statement
      $statement = $this->_pdo->prepare($query);
      
      //Retrieve Interests table from database
      $interestsTable = $this->selectInterests();
      
      //retrieve the indoor and outdoor arrays
      $indoor = $member->getindoor();
      $outdoor = $member->getoutdoor();
      
      //for each interest in the Interests table
      foreach($interestsTable as $row)
      {
        //if $indoor is not empty
        if(isset($indoor))
        {
          //for each interest in indoor[]
          foreach($indoor as $interest)
          {
            //if the interest matches one in the database
            if($row['interest'] == $interest)
            {
              //bind the Parameters and grab the interestid of the matching
              //interest
              $statement->bindParam(':value', $row['interestid'], PDO::PARAM_INT);
              
              //insert the entry into the junction table.
              $statement->execute();
            }
          }
        }
        
        //if $outdoor is not empty
        if(isset($outdoor))
        {
          //for each interest in outdoorp[]
          foreach($outdoor as $interest)
          {
            //if the interest matches one in the database
            if($row['interest'] == $interest)
            {
              //bind the parameters and grab the interest id of the matching
              //interest
              $statement->bindParam(':value', $row['interestid'], PDO::PARAM_INT);
              
              //insert the entry into the junction table
              $statement->execute();
            }
          }
        }
      }
    } //insertIntoJunction()
    
    //}}}
    
    //{{{  selectInterests()
    
    /*
     * Getter for interests table
     *
     * @access  public
     * @return  associative array   Data from interests table.
     */
    function selectInterests()
    {
      //Define query
      $query = "SELECT * FROM interests";
      
      //prepare statement
      $statement = $this->_pdo->prepare($query);
      
      //execute
      $statement->execute();
      
      //return the results
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    } // selectInterests()
    
    //}}}
    
    //{{{  isPremium($member)
    
    /*
     * Checks if Member is Premium
     *
     * @access  public
     * @return  boolean   Returns true object is of the PremiumMember
     * class. Otherwise returns false.
     */
    function isPremium($member)
    { 
      if(is_a($member, 'PremiumMember'))
      {
        return true;
      }
      
      return false;
    } //isPremium()
    
    //}}}
    
    //{{{  getImagePath()
    
    /*
     * Getter for ImagePath
     *
     * @access    public
     * @return    String    Pathname for the image.
     */
    function getImagePath($member)
    {
      if($member->getgender() == "Male")
      {
        return "/images/unknown-male.png";
      }
      else if($member->getgender() == "Female")
      {
        return "/images/unknown-female.png";
      }
      
      return "/images/unknown-male.png";
    } // getImagePath()
    
    //}}}
    
    //{{{  interestsToString($member)
    
    /*
     * Create a toString Method of Member Objects interest.
     *
     * @access    public
     * @return    String    Returns String representation of the member's
     * interests.
     */
    function interestsToString($member)
    {
      //start with an empty variable
      $toString = "";
      
      //grab the arrays from the member object
      $indoor = $member->getindoor();
      $outdoor = $member->getoutdoor();
      
      //if $indoor is not empty
      if(isset($indoor))
      {
        $toString .= "Indoor: ";
        
        for($i = 0; $i < count($indoor); $i++)
        {
          //if $indoor[$i] is the last element in the list we don't want
          //to add a comma at the end of it.
          if($i == count($indoor)-1)
          {
            $toString .= $indoor[$i];
          }
          else //otherwise just add a comma and a space and continue
          {
            $toString .= $indoor[$i] . ", ";
          }
        }
      }
      
      if(isset($outdoor))
      {
        $toString .= " | Outdoor: ";
        
        for($i = 0; $i < count($outdoor); $i++)
        {
          if($i == count($outdoor)-1)
          {
            $toString .= $outdoor[$i];
          }
          else
          {
            $toString .= $outdoor[$i] . ", ";
          }
        }
      }
      
      return $toString;
    } //interestsToString()
    
    //}}}
    
  } //DatingDB
  
    