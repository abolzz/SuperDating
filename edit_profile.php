<!DOCTYPE html>
<html>
<head>
	<title>SuperDating | Edit profile</title>
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

  // Select current user from superheroes table
  $myprofile = $database->query('SELECT * FROM superheroes
                WHERE email = "flash99@yahoooooo.com"');
?>

  <h1>Edit profile</h1>

  <?php
  foreach ($myprofile as $profile) {
    ?>

  <form class="edit-form" action="process.php" method="post">
  	
  	<label for="superhero_name">Name</label>
  	<input type="text" name="superhero_name" placeholder="e.g. Batman" value="<?php echo $profile['superhero_name']; ?>">

    <label for="image">Profile picture</label>
    <input type="text" name="image" placeholder="absolute url to image" value="<?php echo $profile['image']; ?>">

  	<label for="age">Age</label>
  	<input type="number" name="age" value="<?php echo $profile['age']; ?>">
  	  	
  	<label for="superpowers">Superpowers</label>
  	<input type="text" name="superpowers" placeholder="My superpowers" value="<?php echo $profile['superpowers']; ?>">

    <label for="location">Location</label>
    <input type="text" name="location" placeholder="My location" value="<?php echo $profile['location']; ?>">

    <label for="sex">Gender</label>
    <select name="sex" value="<?php echo $profile['sex']; ?>">
      <?php
        
        }

      ?>
  		<?php
  		// insert an option for each gender
  		foreach ($genders as $gender) {
  			?>
        <option selected="selected"><?php echo $gender['sex'];?></option>
  			<?php
  		}
  		?>
  	</select>

  	<input type="submit" name="submit" value="Update">
  </form>
</body>
</html>