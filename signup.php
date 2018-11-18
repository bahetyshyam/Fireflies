<?php
	include("includes/classes/Account.php");

	$account = new Account();
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

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
        			<a href="#" id="brand-link" class="brand-logo">Fireflies</a>
        			<ul class="right hide-on-med-and-down">
          				<li><a class="links hvr-grow" href="#">Sign In</a></li>
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
	  						<?php echo $account->getError("First Name must be between 2 and 25 characters"); ?>
	    					<label class="intext" for="firstName">First Name</label>
	    					<input type="text" name="firstName" class="textf" required>
	  					</div>
	  					<div class="in">
	  						<?php echo $account->getError("Last Name must be between 2 and 25 characters"); ?>
	    					<label class="intext" for="lastName">Last Name</label>
	    					<input type="text" name="lastName" class="textf" required>
	  					</div>
	  					<div class="in">
	  						<?php echo $account->getError("Emails don't match"); ?>
	  						<?php echo $account->getError("Invalid Email"); ?>
	    					<label class="intext" for="email">Email</label>
	    					<input type="email" name="email" class="textf" required>
	  					</div>
	  					<div class="in">
	    					<label class="intext" for="email2">Confirm Email</label>
	    					<input type="email" name="email2" class="textf" required>
	  					</div>
	  					<div class="in">
	  						<?php echo $account->getError("Username must be between 5 and 25 characters"); ?>
	    					<label class="intext" for="username">Username</label>
	    					<input type="text" name="username" class="textf" required>
	  					</div>
	  					<div class="in">
	  						<?php echo $account->getError("Passwords don't match"); ?>
	  						<?php echo $account->getError("Password can only contain numbers and letters"); ?>
	  						<?php echo $account->getError("Password must be between 5 and 30 characters"); ?>
	    					<label class="intext" for="password">Password</label>
	    					<input type="password" name="password" class="textf" required>
	  					</div>
	  					<div class="in">
	    					<label class="intext" for="password2">Confirm Password</label>
	    					<input type="password" name="password2" class="textf" required>
	  					</div>
	  					<div class="in">
	    					<!-- <a id="Sign" class="waves-effect waves-light btn">Sign Up</a> -->
	    					<button id="Sign" type="submit" name="registerButton" class="waves-effect waves-light btn">Sign Up</button>
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