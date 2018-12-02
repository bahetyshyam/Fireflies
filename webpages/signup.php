<?php
	include("config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");	

	$account = new Account($con);
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/hover-min.css">
	<link rel="stylesheet" type="text/css" href="css/fa-svg-with-js.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
		<div class="navbar-fixed">
    		<nav id="navbar">
      			<div class="nav-wrapper">
        			<a href="index.php" id="brand-link" class="brand-logo">Fireflies</a>
        			<ul class="right hide-on-med-and-down">
          				<li><a class="links hvr-grow" href="signin.php">Sign In</a></li>
        			</ul>
      			</div>
    		</nav>
 		</div>

		<div id="main" class="container-fluid">
			<div class="row">
				<div  id="box" class="col s4 m4 l4">
					<h2 id="heading">Join Fireflies</h2>
					<form action="" method="get" class="in col s4 m4 l4">
	  					<div class="in">
	  						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
	    					<label class="intext" for="firstName">First Name</label>
	    					<input type="text" name="firstName" class="textf" value="<?php getInputValue('firstName') ?>" required>
	  					</div>
	  					<div class="in">
	  						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
	    					<label class="intext" for="lastName">Last Name</label>
	    					<input type="text" name="lastName" class="textf" value="<?php getInputValue('lastName') ?>" required>
	  					</div>
	  					<div class="in">
	  						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
	  						<?php echo $account->getError(Constants::$emailInvalid); ?>
	    					<label class="intext" for="email">Email</label>
	    					<input type="email" name="email" class="textf" value="<?php getInputValue('email') ?>" required>
	  					</div>
	  					<div class="in">
	    					<label class="intext" for="email2">Confirm Email</label>
	    					<input type="email" name="email2" class="textf" value="<?php getInputValue('email2') ?>" required>
	  					</div>
	  					<div class="in">
	  						<?php echo $account->getError(Constants::$usernameCharacters); ?>
	    					<label class="intext" for="username">Username</label>
	    					<input type="text" name="username" class="textf" value="<?php getInputValue('username') ?>" required>
	  					</div>
	  					<div class="in">
	  						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
	  						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
	  						<?php echo $account->getError(Constants::$passwordCharacters); ?>
	    					<label class="intext" for="password">Password</label>
	    					<input type="password" name="password" class="textf" value="<?php getInputValue('password') ?>" required>
	  					</div>
	  					<div class="in">
	    					<label class="intext" for="password2">Confirm Password</label>
	    					<input type="password" name="password2" class="textf" value="<?php getInputValue('password2') ?>" required>
	  					</div>
	  					<div class="in">
	    					<!-- <a id="Sign" class="waves-effect waves-light btn">Sign Up</a> -->
	    					<!-- <button id="Sign" type="submit" name="registerButton" class="waves-effect waves-light btn">Sign Up</button> -->
	    					<button type="submit" name="registerButton">SIGN UP</button>
	  					</div>
					</form>
				</div>
			</div>
		</div>
</body>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="js/fontawesome-all.min.js"> -->
<script type="text/javascript" src="js/index.js"></script>
</html>