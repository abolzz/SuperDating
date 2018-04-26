<!DOCTYPE html>
<html>
<head>
	<title>SuperDating | Private messages</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>SuperDating</h1>
<h2 class="notice">Private messages</h2>
<a href="index.php" class="edit">Back</a>
<?php

// ensure that php errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	// Include and initiate the database class (you only have to do this once)
	include('classes/database.php');
	$database = new Database;
	$database->connect();

	// Select all messages from the table "messages" which are sent to the email which matches the superhero "logged in"
	$messages = $database->query('SELECT * FROM messages
								WHERE message_to = "flash99@yahoooooo.com"');

?>

<div class="messages">
	<?php
	// Loop through all messages
	foreach ($messages as $message) {
		?>

		<h3 class="message-from">From: <?php echo $message['message_from']; ?></h3>
		<p><?php echo $message['message']; ?></p>

		<?php
			}
		?>
	
</div>
</body>
</html>