<!DOCTYPE html>
<html>
<head>
	<title>SuperDating | Like</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	
	// check what is received through POST
	// var_dump($_POST); die();
	include('classes/database.php');
	$database = new Database;
	$database->connect();

  // Select the number of rows in the table "likes" where the receiver's email matches the one on who's profile is clicked
    $others_likes = $database->query("SELECT COUNT(*) FROM likes
                  WHERE liked_to = '". $_POST['liked_to']."'");

	//- - - Likes - - - 

        // define sensible test values

        // First, prepare the SQL
  $sql = "INSERT INTO likes (
              liked_from,
              liked_to
            ) 
      VALUES (?,?)";
  
  // Secondly, add values
  $values = array(
    "flash99@yahoooooo.com",
    $_POST['liked_to']
  );

        // check if "logged in" user has not already liked the profile
        if ($others_likes[0][0] == "0") {
          // execute prepared statement
          $update_stmt = $database->prepared($sql, $values);
          ?>
          <p class="notice success">Like added!
            <a href="index.php" class="notice">Back</a>
          </p>
          <?php
        } else {
          echo "You can't like one profile twice!";
        }

?>
</body>
</html>