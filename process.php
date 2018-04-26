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


	//- - - Edit profile - - - 

        // define sensible test values

        $sql = '
            UPDATE
               superheroes
            SET
               superhero_name =?,
               image =?,
               age = ?,
               superpowers = ?,
               location = ?,
               sex = ?
            WHERE
               email = "flash99@yahoooooo.com"
        ';

        $values = array(
			$_POST['superhero_name'],
			$_POST['image'],
			$_POST['age'],
			$_POST['superpowers'],
			$_POST['location'],
			$_POST['sex']
		);

        // execute prepared statement
        $update_stmt = $database->prepared($sql, $values);

?>
<p class="notice success">Awesome! Your profile has been updated.
	<a href="index.php" class="notice">Back</a>
</p>
</body>
</html>