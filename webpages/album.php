<?php
	include("../config.php");
	include("../assets/Classes/Artist.php");
	include("../assets/Classes/Album.php");
	include("../assets/Classes/Tracks.php");

	if(isset($_GET['Album_id'])) {
			$albumId = $_GET['Album_id'];
	}	 
	else {
	 	echo "Not Found";	
	 }

	$album = new Album($con, $albumId);

	$artist = $album->getArtist();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Album</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../css/hover-min.css">
	<link rel="stylesheet" type="text/css" href="../css/fa-svg-with-js.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../js/index.js"></script>
</head>
<body>
	<script>
	var audioElement = new Audio();
	audioElement.setTrack("../assets/Songs/Living Things/12 - Powerless.mp3");
	audioElement.audio.play();

	</script>
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

	

	<div class="albumBack grey darken-4">
		<div class="entity">
			<div class="leftSec">
				<img class="albumPic" src=" <?php echo $album->getArtworkPath(); ?> ">
			</div>

			<div class="rightSec">
				<h2> <?php echo $album->getTitle(); ?> </h2>
			
				<a href="artists.php?Artist_id = $album->getArtist()">
					<p>By <?php echo $artist->getName(); ?> </p>
				</a>
			</div>
		</div>

		<div class="trackListContainer">
		<ul class="trackList">
			
			<?php
				$songIdArray = $album->getSongId();
				foreach ($songIdArray as $songId) {
					$song = new Tracks($con, $songId);
					$songNum = $song->getNumber();

					echo " 	<li class='trackListRow'>
								<div class='number'>
									<p>$songNum</p>
								</div>

								<button class='iconPack'>
									<i class='small material-icons albumPlay'>play_circle_outline</i>
								</button>

								<button class='iconPack'>
									<i class='small material-icons albumPause'>pause_circle_outline</i>
								</button>

								<div class='trackInfo'>
									<p>" .$song->getTitle() ."</p>
								</div>

								<div class='trackDuration'>
									<p>" . $song->getDuration() . "</p>
								</div>
							</li>";
				}
			?>

		</ul>
	</div>
	</div>

	<h6>Hello</h6>

	<!--Now Playing Bar -->
	<div id="nowPlayingContainer" class="black">
		<div id="nowPlayingBar">
			<div id="nowPlayingLeft">
				<div class="content">
					<span class="albumLink">
						<img src="../assets/images/album_arts/Mylo Xyloto.jpg" class="albumArt circle">
					</span>

					<div class="trackInfo">
						<span class="trackName">
							<span>Hurts Like Heaven</span>
						</span>

						<span class="artistName">
							<span>Coldplay</span>
						</span>
					</div>
				</div>
			</div>
			<div id="nowPlayingCenter">
				<div class="content playerControls">
					<div class="buttons">
						<button class="controlButton shuffle">
							<i class="material-icons">shuffle</i>
						</button>
						<button class="controlButton previous">
							<i class="material-icons">skip_previous</i>
						</button>
						<button class="controlButton play">
							<i class="medium material-icons">play_arrow</i>
						</button>
						<button class="controlButton pause">
							<i class="medium material-icons">pause</i>
						</button>
						<button class="controlButton next">
							<i class="material-icons">skip_next</i>
						</button>
						<button class="controlButton repeat">
							<i class="material-icons">repeat</i>
						</button>
						<button class="controlButton repeatOne">
							<i class="material-icons">repeat_one</i>
						</button>
					</div>

					<div id="playbackBar">
						<span class="progressTime current">0:00</span>
						<div class="progressBar">
							<div class="progressBarBg grey darken-3">
								<div class="progressRem light-blue lighten-2">
									
								</div>
							</div>
						</div>
						<span class="progressTime remaining">0:00</span>
					</div>
				</div>
			</div>
			<div id="nowPlayingRight">
				<div class="volumeBar">
					<button class="controlButton volume">
						<i class="material-icons">volume_up</i>
					</button>
					<div class="progressBar">
						<div class="progressBarBg grey darken-3">
							<div class="progressRem light-blue lighten-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Now Playing Bar Ends here -->
</body>

</html>