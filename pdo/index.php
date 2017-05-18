<?php
  //load credentials
  require "/home/jmccoy/config.php";
  
  try {
    //Instantiate a database object
    $dbc = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'Connected to database!';
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
  
  //Define the query
  $sql = "INSERT INTO pets(type, name, color) VALUES (:type, :name, :color)";
            
  //Prepare the statment
  $statement = $dbc->prepare($sql);
  
  //Bind the parameters
  $type = 'kangaroo';
  $name = 'Joey';
  $color = 'purple';
  $statement->bindParam(':type', $type, PDO::PARAM_STR);
  $statement->bindParam(':name', $name, PDO::PARAM_STR);
  $statement->bindParam(':color', $color, PDO::PARAM_STR);
  
  //Execute
  $statement->execute();
  
  //Bind the parameters
  $type = 'snake';
  $name = 'Slytherin';
  $color = 'green';
  $statement->bindParam(':type', $type, PDO::PARAM_STR);
  $statement->bindParam(':name', $name, PDO::PARAM_STR);
  $statement->bindParam(':color', $color, PDO::PARAM_STR);
  
  //Execute
  $statement->execute();
  
  $id = $dbc->lastInsertId();
  echo "<p>Pet $id inserted successfully.</p>";
  
  
  
  //Define the query
  $sql = "DELETE FROM pets WHERE id = :id";
  
  //Prepare the statement
  $statement = $dbc->prepare($sql);
  
  //Bind the parameters
  //$statement = bindParam(':id', 6, PDO::);
  
  //execute the statment
  $statement->execute();
  
  
  //Define the query
  $sql = "SELECT * from PETS wHERE id = :id";
  
  //Prepare the statement
  $statement = $dbc->prepare($sql);
  
  //Bind parameters
  $statement->bindParam(':id', 3, PDO::PARAM_INT);
  
  //Execute the statement
  $statment->execute();
  
  //Process the result
  $row = $statment->fetch(PDO::FETCH_ASSOC);
  
  echo $row['name']. ", " . $row['type'] . ", " . $row['color'];
  
  //Define the query
  $sql = "SELECT * FROM pets";
  
  //Prepare the statement
  $statement->prepare($sql);
  
  //Bind the parameters
  
  //Execute the statement
  $statement->execute();
  
  //Process the result
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row) {
    echo $row['name'] . ", " . $row['type'] . ", " . $row['color'];
  }
  
  echo "<br/>It worked!!";