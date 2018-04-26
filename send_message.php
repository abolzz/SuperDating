<!DOCTYPE html>
<html>
<head>
	<title>SuperDating | Send message</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	
	include('classes/database.php');
	$database = new Database;
	$database->connect();

	//- - - Likes - - - 

        // define sensible test values

        // First, prepare the SQL
  $sql = "INSERT INTO messages (
              message,
              message_from,
              message_to
            ) 
      VALUES (?,?,?)";
  
  // Secondly, add values
  $values = array(
    $_POST['message'],
    "flash99@yahoooooo.com",
    $_POST['message_to']
  );

          $update_stmt = $database->prepared($sql, $values);
          ?>
          <p class="notice success">Message sent!
            <a href="index.php" class="notice">Back</a>
          </p>
</body>
</html>