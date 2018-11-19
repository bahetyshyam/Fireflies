<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href=" css/index.css">
	<link rel="stylesheet" type="text/css" href=" css/materialize.css">
	<link rel="stylesheet" type="text/css" href=" css/hover-min.css">
	<link rel="stylesheet" type="text/css" href=" css/fa-svg-with-js.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
		<div class="navbar-fixed">
    		<nav id="navbar">
      			<div class="nav-wrapper">
        			<a href="index.php" id="brand-link" class="brand-logo">Fireflies</a>
        			<ul class="right hide-on-med-and-down">
          				<li><a class="links hvr-grow" href="signup.php">Sign Up</a></li>
        			</ul>
      			</div>
    		</nav>
 		</div>

		<div id="main" class="container-fluid">
			<div class="row">
				<div  id="box" class="col s4 m4 l4">
					<h2 id="heading">Sign In To Fireflies</h2>
					<form action="" method="get" class="in col s4 m4 l4">
	  					<div class="in">
	    					<label class="intext" for="Username">Username</label>
	    					<input type="text" name="Username" class="textf" required>
	  					</div>
	  					<div class="in">
	    					<label class="intext" for="email">Password</label>
	    					<input type="password" name="password" class="textf" required>
	  					</div>
	  					<div class="in">
	    					<a id="Sign" class="waves-effect waves-light btn">Sign In</a>
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