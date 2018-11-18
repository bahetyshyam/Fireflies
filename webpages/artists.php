<?php
	include("../config.php");
	include("../assets/Classes/Artist.php");
	include("../assets/Classes/Album.php");
	include("../assets/Classes/Tracks.php");

	if(isset($_GET['Artist_id'])) {
			$artistId = $_GET['Artist_id'];
	}	 
	else {
	 	echo "Not Found";	
	 }

	$artist = new Artist($con, $artistId);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Artist</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../css/hover-min.css">
	<link rel="stylesheet" type="text/css" href="../css/fa-svg-with-js.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
</head>
<body>
	<!--Navbar begins here -->
	<div class="navbar-fixed ">
	    <nav id="navbar" class="black">
	      <div class="nav-wrapper">
	        <a href="#" id="brand-link" class="brand-logo hvr-grow">Fireflies</a>

	        <div class="sidebar black">
	        	<div class="sideItems" id="first">
	        		<a class="sideLinks" href="http://www.google.com"><i class="medium sideIcons material-icons">search</i>Search</a>
	        	</div>
	        	<div class="sideItems">
	        		<a class="sideLinks" href="#"><i class="medium sideIcons material-icons">music_note</i>Genre</a>
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

	<div class="artistBack">
		<div class="entity">
			<div class="leftSec">
				<img class="artistPic" src=" <?php echo $artist->getArtworkPath(); ?> ">
			</div>

			<div class="rightSec">
				<h2>By <?php echo $artist->getName(); ?> </h2>
			</div>
		</div>
	</div>
</body>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../js/index.js"></script>
</html>