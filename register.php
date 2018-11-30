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

<html>
<head>
	<title>Fireflies</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/hover-min.css">
	<link rel="stylesheet" type="text/css" href="css/fa-svg-with-js.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="js/fontawesome-all.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
	<?php
		if(isset($_POST['registerButton'])) {
			echo '<script>
					 $(document).ready(function() {
							$("#loginForm").hide();
							$("#registerForm").show();
					});
				   </script>';
		}
		else {
			echo '<script>
					 $(document).ready(function() {
							$("#loginForm").show();
							$("#registerForm").hide();
					});
				   </script>';
		}
	?>

	<!--Navbar begins here -->
	<div class="navbar-fixed ">
	    <nav id="navbar" class="black">
	      <div class="nav-wrapper">
	        <a href="index.php" id="brand-link" class="brand-logo hvr-grow">Fireflies</a>

	        <div class="sidebar black">
	        	<div class="sideItems" id="first">
	        		<a class="sideLinks" href="http://www.google.com"><i class="medium sideIcons material-icons">search</i>Search</a>
	        	</div>
	        	<div class="sideItems">
	        		<span class="sideLinks" onclick="openpage('albums.php')"><i class="medium sideIcons material-icons">music_note</i>Albums</span>
	        	</div>
	        	<div class="sideItems">
	        		<a class="sideLinks" href="#"><i class="medium sideIcons material-icons">library_music</i>Playlists</a>
	        	</div>				
			</div>

			<a class="sideBtn"></a>
	      </div>

	    </nav>

	</div>
	<!--Navbar ends here -->

	<div id="main">
		<form id="loginForm" action="register.php" method="POST">
			<h2 class="signHeading">Log In To Fireflies</h2>
			<p>
				<label class="fields" for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. peterGriffin" required>
			</p>
			<p>
				<label class="fields" for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
				<?php echo $account->getError(Constants::$loginFailed); ?>
			</p>

			<button id="Sign" type="submit" name="loginButton" class="waves-effect waves-light btn">LOG IN</button>
			<div class="hasAccountText">
				<span id="hideLogin">Don't have an account yet? Sign Up</span>
			</div>
			
		</form>



		<form id="registerForm" action="register.php" method="POST">
			<h2 class="signHeading">Join Fireflies</h2>
			<p>
				<label class="fields" for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('username') ?>" required>
				<?php echo $account->getError(Constants::$usernameCharacters); ?>
				<?php echo $account->getError(Constants::$usernameTaken); ?>
			</p>

			<p>
				<label class="fields" for="firstName">First name</label>
				<input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstName') ?>" required>
				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
			</p>

			<p>
				<label class="fields" for="lastName">Last name</label>
				<input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('lastName') ?>" required>
				<?php echo $account->getError(Constants::$lastNameCharacters); ?>
			</p>

			<p>
				<label class="fields" for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
				<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
				<?php echo $account->getError(Constants::$emailInvalid); ?>
				<?php echo $account->getError(Constants::$emailTaken); ?>
			</p>

			<p>
				<label class="fields" for="email2">Confirm email</label>
				<input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email2') ?>" required>
			</p>

			<p>
				<label class="fields" for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Your password" required>
				<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
				<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
				<?php echo $account->getError(Constants::$passwordCharacters); ?>
			</p>

			<p>
				<label class="fields" for="password2">Confirm password</label>
				<input id="password2" name="password2" type="password" placeholder="Your password" required>
			</p>

			<button id="Sign1" class="waves-effect waves-light btn" type="submit" name="registerButton">SIGN UP</button>
			<div class="hasAccountText">
				<span id="hideRegister">Already have an account? Log In</span>
			</div>
		</form>


	</div>

</body>
<script type="text/javascript" src="js/index.js"></script>
</html>