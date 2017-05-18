<?php
  session_start();
  
  $animals = array('panda', 'alpaca', 'boa');
  
  $flavors = array(
    "grasshopper" => "The Grasshopper",
    "maple" => "Whiskey Maple Bacon",
    "carrot" => "Carrot Walnut",
    "caramel" => "Salted Caramel Cupcake",
    "velvet" => "Red Velvet",
    "lemon" => "Lemon Drop",
    "tiramisu" => "Tiramisu"
  );
  
  function add(&$array, $new)
  {
    $new_add = true;
    
    foreach($array as $key => $value)
    {
      if(strtolower($new) == strtolower($value))
      {
        return true;
      }
    }
    
    array_push($array, $new);
    sort($array);
  }
  
  function printArray($array)
  {
    for($i = 0; $i < count($array); $i++)
    {
      echo $array[$i] . " ";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta charset="utf-8">
      <title>Arrays and Functions</title>
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="">
       
      <!-- bootstrap -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
              integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
       
      <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="shortcut icon" href="">
  </head>
   
  <body>
    <br />
    <?php
      echo '<pre>';
      echo '<p>Original array...</p>';
      echo '<p>'.printArray($animals).'</p>';
      
      echo '<br />';
      
      echo '<p>Sorted array...</p>';
      sort($animals);
      echo '<p>'.printArray($animals).'</p>';
      
      echo '<br />';
      
      echo '<p>Adding "goat"...</p>';
      add($animals, 'goat');
      echo '<p>'.printArray($animals).'</p>';
      
      echo '<br />';
      
      echo '<p>Attempting to add "Boa"...</p>';
      add($animals, 'Boa');
      echo '<p>'.printArray($animals).'</p>';
      echo '</pre>';
    ?>
  
    <br />
    
    <form>
      <?php
      foreach($flavors as $key => $value)
      {
        echo "<input name='flavors[]' type='checkbox' value='$key'> $value <br />";
      }
    ?>
    </form>
    
  </body>
</html>