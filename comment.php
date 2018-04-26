<!DOCTYPE html>
<html>
<head>
	<title>Edit profile</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
// Get all types from the database
	include('classes/database.php');
	$database = new Database;
	$database->connect();

	// Select both genders
	$sql = "SELECT * FROM sex";
	$genders = $database->query($sql);
?>

  <h1>Edit profile</h1>

  <form action="comment_process.php" method="post">
  	
  	<label for="comment">Comment:</label>
  	<textarea type="text" name="comment" placeholder="Write a comment.."></textarea>

  	<input type="submit" name="submit" value="Add">
  </form>
</body>
</html>