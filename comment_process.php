<!DOCTYPE html>
<html>
<head>
	<title>processing</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	
	include('classes/database.php');
	$database = new Database;
	$database->connect();


	//- - - Comment - - - 

        // define sensible test values

        // First, prepare the SQL
  $sql = "INSERT INTO comments (
              comment,
              commented_from,
              commented_to
            ) 
      VALUES (?,?,?)";
  
  // Secondly, add values
  $values = array(
    $_POST['comment'],
    "flash99@yahoooooo.com",
    $_POST['commented_to']
  );

        // execute prepared statement
        $update_stmt = $database->prepared($sql, $values);

?>
<p class="notice success">Comment added!
	<a href="index.php" class="notice">Back</a>
</p>
</body>
</html>