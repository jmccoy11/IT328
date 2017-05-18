<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Pet form</title>
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
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Our Pets
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Type</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                    <?php
                                        //Display all pets
                                        foreach ($pets as $pet) {
                                            $id = $pet['id'];
                                            $name = $pet['name'];
                                            $color = $pet['color'];
                                            $type = $pet['type'];
                                            
                                            echo "<tr><td>$id</td>
                                                    <td>$name</td>
                                                    <td>$color</td>
                                                    <td>$type</td>
                                                    <td><a href='./delete/$id'>delete</a></td>
                                                  </tr>";
                                        } 
                                    ?>
                                        
                                </tbody>
                            </table>
                            
                            <a href="./add">Add a Pet</a>
                        </div> <!-- end panel-body -->
                                            
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
    