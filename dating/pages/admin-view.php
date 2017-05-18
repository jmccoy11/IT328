<!DOCTYPE html>
<html>
  <!--
      Author: Jonnathon McCoy
      Filename: admin-view.php
      Description: Mock dating site for Green River College class IT328
  -->
  
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/heart-icon.png">
    <title>The Dating Site</title>
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
    
    <div id="page" class="container-fluid">
      <div class="row">
        <div id="text" class="col-md-12">
          <h1><strong>The Dating Site</strong></h1>
          
          <h3><strong>Membership</strong></h3>
          
          <table class="table">
            <thead>
              <tr>
                <th>ID</th><th class="col-sm-2">Name</th><th>Age</th><th class="col-sm-2">Phone</th>
                <th>Email</th><th>State</th><th>Gender</th><th>Seeking</th>
                <th>Premium</th><th>Interests</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($dbcontents as $entry=>$row)
                {
                  echo "<tr>";
                  
                  foreach($row as $user=>$data)
                  {
                    if($user == 'lname')
                    {
                      echo "<td>$data, ";
                    }
                    else if($user == 'fname')
                    {
                      echo "$data</td>";
                    }
                    else if($user == 'premium')
                    {
                      if($data == 1)
                      {
                        echo "<td><img src='images/checkbox_full.png' alt='checked' /></td>";
                      }
                      else
                      {
                        echo "<td><img src='images/checkbox_empty.png' alt='unchecked' /></td>";
                      }
                    }
                    else if($user == 'phone')
                    {
                      if($data != "")
                      {
                        echo "<td>(" .
                        substr($data, 0,3) . ") " . substr($data, 3, 3) . "-" . substr($data, 5, -1) .
                        "</td>";
                      }
                      else
                      {
                        echo "<td>$data</td>";
                      }
                    }
                    else
                    {
                      echo "<td>$data</td>";
                    }
                  }
                  
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
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