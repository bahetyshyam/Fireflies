<?php 

include("includes/config.php");

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

if(isset($_POST['loginButton'])) {
	//Login button was pressed
	
}

if(isset($_POST['registerButton'])) {
	//Register button was pressed
	$username = sanitizeFormUsername($_POST['username']);
	
	$firstName = sanitizeFormString($_POST['firstName']);

	$lastName = sanitizeFormString($_POST['lastName']);

	$email = sanitizeFormString($_POST['email']);

	$email2 = sanitizeFormString($_POST['email2']);

	$password = sanitizeFormPassword($_POST['password']);

	$password2 = sanitizeFormPassword($_POST['password2']);

	$encryptedPw = md5($password);

	$date = date("Y-m-d H:i:s");

	$profilePic = "assets/images/profile-pics/head_emerald.png";

	$query = "INSERT INTO Users VALUES (NULL, '$username', '$firstName', '$lastName', '$email', '$encryptedPw', '$date', '$profilePic')";
	
      if (mysqli_query($con, $query)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $query . "<br>" . mysqli_error($con);
  }

}


?>



<html>
<head>
	<title>Fireflies</title>
</head>
<body>

	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login in to your account</h2>
			<p>
				<label for="loginUsername">Username</label><br>
				<input id="loginUsername" name="loginUsername" type="text" required>
			</p>
			<p>
				<label for="loginPassword">Password</label><br>
				<input id="loginPassword" name="loginPassword" type="password" required>
			</p>

			<button type="submit" name="loginButton">LOG IN</button>
			
		</form>



		<form id="registerForm" action="register.php" method="POST">
			<h2>Create your free account</h2>
			<p>
				<label for="username">Username</label><br>
				<input id="username" name="username" type="text" required>
			</p>

			<p>
				<label for="firstName">First name</label><br>
				<input id="firstName" name="firstName" type="text" required>
			</p>

			<p>
				<label for="lastName">Last name</label><br>
				<input id="lastName" name="lastName" type="text" required>
			</p>

			<p>
				<label for="email">Email</label><br>
				<input id="email" name="email" type="email" required>
			</p>

			<p>
				<label for="email2">Confirm email</label><br>
				<input id="email2" name="email2" type="email" required>
			</p>

			<p>
				<label for="password">Password</label><br>
				<input id="password" name="password" type="password" required>
			</p>

			<p>
				<label for="password2">Confirm password</label><br>
				<input id="password2" name="password2" type="password" required>
			</p>

			<button type="submit" name="registerButton">SIGN UP</button>
			
		</form>


	</div>

</body>
</html>