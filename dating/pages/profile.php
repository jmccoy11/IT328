<!DOCTYPE html>
<html>
  <!--
      Author: Jonnathon McCoy
      Filename: profile.html
      Description: HTML Form to retrieve email, state, seeking preference, and biography from user
  -->
  
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/heart-icon.png">
    <title>Profile</title>
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
      <div class="row panel panel-default content">
        <div class="header panel-heading">
          <h1><strong>Profile</strong></h1>
        </div>
      
        <div class="row panel-body">
          <form method="POST" action='<?php
            if(is_a($_SESSION['member'], 'PremiumMember')){
              echo "./interests";
            }
            else {
              echo "./profile_summary";
            }
            ?>'>
          
            <div class="col-sm-6">
              
                <!-- Email -->
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="text" class="form form-control" tabindex=1>
              </div>
              
                <!-- State -->
              <div class="form-group">
                <label>State</label> <br />
                <select class="form-control" name="state" tabindex=2>
                  <option value="Not Applicable">Select a State</option>
                  <option value="Alabama">Alabama</option>
                  <option value="Alaska">Alaska</option>
                  <option value="Arizona">Arizona</option>
                  <option value="Arkansas">Arkansas</option>
                  <option value="California">California</option>
                  <option value="Colorado">Colorado</option>
                  <option value="Connecticut">Connecticut</option>
                  <option value="Delaware">Delaware</option>
                  <option value="District Of Columbia">District Of Columbia</option>
                  <option value="Florida">Florida</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Hawaii">Hawaii</option>
                  <option value="Idaho">Idaho</option>
                  <option value="Illinois">Illinois</option>
                  <option value="Indiana">Indiana</option>
                  <option value="Iowa">Iowa</option>
                  <option value="Kansas">Kansas</option>
                  <option value="Kentucky">Kentucky</option>
                  <option value="Louisiana">Louisiana</option>
                  <option value="Maine">Maine</option>
                  <option value="Maryland">Maryland</option>
                  <option value="Massachusetts">Massachusetts</option>
                  <option value="Michigan">Michigan</option>
                  <option value="Minnesota">Minnesota</option>
                  <option value="Mississippi">Mississippi</option>
                  <option value="Missouri">Missouri</option>
                  <option value="Montana">Montana</option>
                  <option value="Nebraska">Nebraska</option>
                  <option value="Nevada">Nevada</option>
                  <option value="New Hampshire">New Hampshire</option>
                  <option value="New Jersey">New Jersey</option>
                  <option value="New Mexico">New Mexico</option>
                  <option value="New York">New York</option>
                  <option value="North Carolina">North Carolina</option>
                  <option value="North Dakota">North Dakota</option>
                  <option value="Ohio">Ohio</option>
                  <option value="Oklahoma">Oklahoma</option>
                  <option value="Oregon">Oregon</option>
                  <option value="Pennsylvania">Pennsylvania</option>
                  <option value="Rhode Island">Rhode Island</option>
                  <option value="South Carolina">South Carolina</option>
                  <option value="South Dakota">South Dakota</option>
                  <option value="Tennessee">Tennessee</option>
                  <option value="Texas">Texas</option>
                  <option value="Utah">Utah</option>
                  <option value="Vermont">Vermont</option>
                  <option value="Virginia">Virginia</option>
                  <option value="Washington">Washington</option>
                  <option value="West Virginia">West Virginia</option>
                  <option value="Wisconsin">Wisconsin</option>
                  <option value="Wyoming">Wyoming</option>
                </select>
              </div>
              
                <!-- Seeking -->
              <div class="form-group">
                <label>Seeking</label><span id='seekingErr' class='error'>&nbsp; &nbsp; * Required
                  (selecting both in a future update)</span> <br />
                <input id="seeking-male" class="form-inline" name="seeking" type="radio" value="Male" tabindex=3>
                  <label for="seeking-male" class="normal-text">&nbsp; Male &nbsp; &nbsp;</label>
                <input id="seeking-female" class="form-inline" name="seeking" type="radio" value="Female">
                  <label for="seeking-female" class="normal-text">&nbsp; Female</label><br />  
              </div>
            </div>
            
            <div class="col-sm-6">
              <label for="biography">Biography</label>
              <textarea id="biography" name="biography" class="col-sm-12" rows="7" tabindex=4></textarea>
            </div>
            
              <!-- Submit Button -->
            <div class="row col-sm-12">
              <input id="next" type='submit' value="Next >" class="btn btn-primary" tabindex=5>
            </div>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    
  </body>
</html>