<!DOCTYPE html>
<html>
<head>
	<title>SuperDating | Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>SuperDating</h1>
<p class="notice">Logged in as: Flash<br>
<a href="edit_profile.php" class="edit">Edit profile</a>
<a href="private_messages.php">Private messages</a>
</p>
<?php

// ensure that php errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	// Include and initiate the database class (you only have to do this once)
	include('classes/database.php');
	$database = new Database;
	$database->connect();

	// Get all superheroes from the database except the one which is "logged in"
	$users = $database->query('SELECT * FROM superheroes
								WHERE email != "flash99@yahoooooo.com"');
	// Get only the superhero which is "logged in"
	$myprofile = $database->query('SELECT * FROM superheroes
									WHERE email = "flash99@yahoooooo.com"');

	// Get only the superhero which is "logged in"
	$mylikes = $database->query('SELECT COUNT(*) FROM likes
									WHERE liked_to = "flash99@yahoooooo.com"');
?>


<!-- Profile which is "logged in" -->
<div class="myprofile">
	<?php
	// Loop through all superheroes and select all comments where the receiver is the user which is "logged in"
	foreach ($myprofile as $profile) {
		$comments = $database->query('SELECT * FROM comments
									WHERE commented_to = "flash99@yahoooooo.com"');
		?>
			<article class="title">
				<h2>My profile</h2>
				<img class="profile-picture" src="<?php echo $profile['image'];?>" alt="Profile picture">
				<h2><?php echo $profile['superhero_name'];?> (<?php echo $profile['age'];?>)</h2>
				<h2>Likes: <?php echo $mylikes[0][0]; ?></h2>
				<h3>Superpowers: <?php echo $profile['superpowers'];?></h3>
				<h3>Location: <?php echo $profile['location'];?></h3>
				<h3>Sex: <?php echo $profile['sex'];?></h3>
				<h3>Comments:</h3>

			  	<?php
			// Loop through all comments
		foreach ($comments as $comment) {
			// Select superhero names which email addresses are matching the comment receiver email address
			$comment_from_name = $database->query("SELECT superhero_name
									FROM superheroes
									INNER JOIN comments ON superheroes.email = comments.commented_from
									WHERE superheroes.email ='".$comment['commented_from'] ."'");
			foreach ($comment_from_name as $from_name) {
			?>
	 <p><?php echo $comment['comment'];?><br>
	 	by <span class="comment-by"><?php echo $from_name['superhero_name'];?></span>
	 </p>

	<?php
		}
	?>
			</article>
<?php
	}
?>
<?php
	}
?>
</div>

<!-- Other superhero profiles -->
	<div class="profiles">
		<h1>Other superheros</h1>
<?php
	// Loop through all superheroes
	foreach ($users as $user) {
		// Select only those comments that belong to the superhero which is logged in
		$comments = $database->query("SELECT * FROM comments
									WHERE commented_to = '". $user['email']."'");
		// Select only those likes that belong to the superhero which is logged in
		$others_likes = $database->query("SELECT COUNT(*) FROM likes
									WHERE liked_to = '". $user['email']."'");
		?>
			<article class="title">
				<img class="profile-picture" src="<?php echo $user['image'];?>" alt="Profile picture">
				<h2><?php echo $user['superhero_name'];?> (<?php echo $user['age'];?>)</h2>

				<h2>Likes: <?php echo $others_likes[0][0]; ?></h2>

				<!-- Like form -->
				<form class="comment-form" action="like_process.php" method="post">
					<input class="hidden" type="text" name="liked_to" value="<?php echo $user['email'];?>">
					<button type="submit" name="like">Like</button>
				</form>

				<form class="comment-form" action="message_to.php" method="post">
					<input class="hidden" type="text" name="message_to" value="<?php echo $user['email'];?>">
					<input type="submit" class="private-message-button" value="Send private message">
				</form>

				<h3>Superpowers: <?php echo $user['superpowers'];?></h3>
				<h3>Location: <?php echo $user['location'];?></h3>
				<h3>Sex: <?php echo $user['sex'];?></h3>
				<h3>Comments:</h3>

			  	<?php
		// Loop through all comments
		foreach ($comments as $comment) {
			?>
	 <p><?php echo $comment['comment'];?><br>
	 	by <span class="comment-by"><?php echo $comment['commented_from'];?></span>
	 </p>
	<?php
		}
	?>

				<!-- Comment form -->
				<form class="comment-form" action="comment_process.php" method="post">
				  	<textarea type="text" name="comment" placeholder="Write a comment.."></textarea>
				  	<input class="hidden" type="text" name="commented_to" value="<?php echo $user['email'];?>">
				  	<input type="submit" name="submit" value="Add comment">
			  	</form>
			</article>
		<?php
	}
?>
	</div>
</body>
</html>