<?php
  //if the $member object is a PremiumMember there will be
  //an interests portion
  if(is_a($member, 'PremiumMember')){
    $indoor = $member->getindoor();
    $outdoor = $member->getoutdoor();
  }
  
  $fname = $member->getfname();
  $lname = $member->getlname();
  $age = $member->getage();
  $gender = $member->getgender();
  $phone = $member->getphone();
  $email = $member->getemail();
  $state = $member->getstate();
  $seeking = $member->getseeking();
  $bio = $member->getbio();
?>
    
<!DOCTYPE html>
<html>
  <!--
      Author: Jonnathon McCoy
      Filename: profile_summary.php
      Description: Summary of all information entered on previous forms
  -->
  
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/heart-icon.png">
    <title>Personal Information</title>
    <meta name="description" content="Mock dating site for Green River College class IT328">
    <meta name="author" content="Jonnathon McCoy">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <!--Custom stylesheets -->
    <link rel="stylesheet" href="styles/styles.css">
    
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  
  <body>    
    <div class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="./">My Dating Website</a>
        </div>
        <div class="navbar-header pull-right">
          <a class="navbar-brand" href="./admin">Admin Login</a>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      <div id="content" class="row panel panel-default content">
        <div id="summary" class="col-sm-6">
          <p>Name: <?php echo $fname . " " . $lname ?></p>
          <p>Gender: <?php echo $gender ?></p>
          <p>Age: <?php echo $age ?></p>
          <p>Phone: <?php echo $phone ?></p>
          <p>Email: <?php echo $email ?></p>
          <p>State: <?php echo strtoupper($state) ?></p>
          <p>Seeking: <?php echo $seeking ?></p>
          <?php
            //if the $member object is a PremiumMember there will be
            //an interests portion
            if(is_a($member, 'PremiumMember'))
            {
              echo "<p>Interests: <br />";
            
              //if $indoor is not empty
              if(!empty($indoor))
              {
                echo "&nbsp; Indoor: ";
                foreach($indoor as $key=>$value)
                {
                  echo $value . ', ';
                }
                echo "<br />";
              }
              
              //if $outdoor is not empty
              if(!empty($outdoor))
              {
                echo "&nbsp; Outdoor: ";
                foreach($outdoor as $key=>$value)
                {
                  echo $value . ', ';
                }
              }
              
              echo "</p>";
            }
          ?>
        </div>
        
        <div id='contact' class='col-sm-6'>
          <img  class="img-responsive center-block" src='images/<?php
              if(!empty($gender))
              {
                if($gender == 'Male')
                {
                  echo 'unknown-male.png';
                }
                else if($gender == 'Female')
                {
                  echo 'unknown-female.png';
                }
              }
              else
              {
                echo 'unknown-male.png';
              }
            ?>
            ' alt='Unknown Contact'>
          
          <h3>Biography</h3>
          <p id="summary-bio" class="center"><?php echo $bio ?></p>
        </div>
      
        <div id="contactme" class="row col-sm-12">
          <form method="GET" action="./add">
            <input id="create" type='submit' value="Submit and Get Started!" class="btn btn-primary center-block">
          </form>
        </div>
      </div>
    </div>
    
    <!-- jQuery JavaScript -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
  </body>
</html>