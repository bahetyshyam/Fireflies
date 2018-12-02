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

	$songQuery = mysqli_query($con, "SELECT Track_id FROM Tracks ORDER BY RAND() LIMIT 100");

	$resultArray = array();

	while($row = mysqli_fetch_array($songQuery)) {
		array_push($resultArray, $row['Track_id']);
	}

	$jsonArray = json_encode($resultArray);

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
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/materialize.js"></script>
	<script type="text/javascript" src="../js/fontawesome-all.min.js"></script>
	
	
</head>
<body>
	<script>

		$(document).ready(function() {
			currentPlaylist = <?php echo $jsonArray; ?>;
			audioElement = new Audio();
			setTrack(currentPlaylist[0], currentPlaylist, false);
			updateVolumeProgressBar(audioElement.audio);


			$("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e) {
				e.preventDefault();
			});


			$(".playbackBar .progressBar").mousedown(function() {
				mouseDown = true;
			});

			$(".playbackBar .progressBar").mousemove(function(e) {
				if(mouseDown == true) {
					//Set time of song, depending on position of mouse
					timeFromOffset(e, this);
				}
			});

			$(".playbackBar .progressBar").mouseup(function(e) {
				timeFromOffset(e, this);
			});


			$(".volumeBar .progressBar").mousedown(function() {
				mouseDown = true;
			});

			$(".volumeBar .progressBar").mousemove(function(e) {
				if(mouseDown == true) {

					var percentage = e.offsetX / $(this).width();

					if(percentage >= 0 && percentage <= 1) {
						audioElement.audio.volume = percentage;
					}
				}
			});

			$(".volumeBar .progressBar").mouseup(function(e) {
				var percentage = e.offsetX / $(this).width();

				if(percentage >= 0 && percentage <= 1) {
					audioElement.audio.volume = percentage;
				}
			});

			$(document).mouseup(function() {
				mouseDown = false;
			});




		});

		function timeFromOffset(mouse, progressBar) {
			var percentage = mouse.offsetX / $(progressBar).width() * 100;
			var seconds = audioElement.audio.duration * (percentage / 100);
			audioElement.setTime(seconds);
		}

		function nextSong() {
			if(currentIndex == currentPlaylist.length - 1) {
				currentIndex = 0;
			}
			else {
				currentIndex++;
			}

			var trackToPlay = currentPlaylist[currentIndex];
			setTrack(trackToPlay, currentPlaylist, true);
		}

		function previousSong() {
			if(currentIndex == 0) {
				currentIndex = currentPlaylist.length - 1;
			}
			else {
				currentIndex--;
			}

			var trackToPlay = currentPlaylist[currentIndex];
			setTrack(trackToPlay, currentPlaylist, true);
		}


		function setTrack(trackId, newPlaylist, play) {

			$.post("../ajax/getSongJson.php", { songId: trackId }, function(data) {

				currentIndex = currentPlaylist.indexOf(trackId);

				var track = JSON.parse(data);
				$(".trackName span").text(track.Song);

				$.post("../ajax/getAlbumJson.php", { albumId: track.Album_id }, function(data) {
					var album = JSON.parse(data);
					$(".albumLink img").attr("src", album.Album_art);

					$.post("../ajax/getArtistJson.php", { artistId: album.Artist_id }, function(data) {
						var artist = JSON.parse(data);
						$(".artistName span").text(artist.Artist_name);
					});
				});
				audioElement.setTrack(track);
				// playSong();

				if(play == true) {
				audioElement.play();
			}
			});
		}

		function playSong() {

			$(".controlButton.play").hide();
			$(".controlButton.pause").show();
			audioElement.play();
		}

		function pauseSong() {
			$(".controlButton.play").show();
			$(".controlButton.pause").hide();
			audioElement.pause();
		}

	</script>
	<!--Navbar begins here -->
	<div class="navbar-fixed ">
	    <nav id="navbar" class="black">
	      <div class="nav-wrapper">
	        <a href="albums.php" id="brand-link" class="brand-logo hvr-grow">Fireflies</a>

	        <div class="sidebar black">
	        	<div class="sideItems" id="first">
	        		<a class="sideLinks" href="../search.php"><i class="medium sideIcons material-icons">search</i>Search</a>
	        	</div>
	        	<!-- <div class="sideItems">
	        		<span class="sideLinks" onclick="openpage('albums.php')"><i class="medium sideIcons material-icons">music_note</i>Albums</span>
	        	</div> -->
	        	<div class="sideItems">
	        		<a class="sideLinks" href="../genre.php"><i class="medium sideIcons material-icons">music_note</i>Genre</a>
	        	</div>
	        	<div class="sideItems">
	        		<a class="sideLinks" href="../playlist.php"><i class="medium sideIcons material-icons">library_music</i>Playlists</a>
	        	</div>
	        	<div class="sideItems">
	        		<a class="sideLinks" href="../queries.php"><i class="medium sideIcons material-icons">question_answer</i>Queries</a>
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
				<img class="albumPic circle" src=" <?php echo $album->getArtworkPath(); ?> ">
			</div>

			<div class="rightSec">
				<h2> <?php echo $album->getTitle(); ?> </h2>
				<?php 
					$artistId = $album->getArtistId();
						$artist = new Artist($con, $artistId);
						$artistName = $artist->getName();
						$artistNum = $artist ->getId();

						echo " <a href='artists.php?Artist_id=".$artistNum."'>
							<p>By " . $artistName .  "</p>
							</a>
						";
				?>
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

								<button class='iconPack' onclick='setTrack(\"" . $song->getId() . "\",tempPlaylist,true)'>
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

			<script type="text/javascript">
				var tempSongIds = '<?php echo json_encode($songIdArray) ?>';
				tempPlaylist = JSON.parse(tempSongIds);
				console.log(tempPlaylist);
			</script>

		</ul>
	</div>
	</div>

	<!--Now Playing Bar -->
	<div id="nowPlayingContainer" class="black">
		<div id="nowPlayingBar">
			<div id="nowPlayingLeft">
				<div class="content">
					<span class="albumLink">
						<img src=" " class="albumArt circle">
					</span>

					<div class="trackInfo">
						<span class="trackName">
							<span></span>
						</span>

						<span class="artistName">
							<span></span>
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
						<button class="controlButton previous" onclick="previousSong()">
							<i class="material-icons">skip_previous</i>
						</button>
						<button class="controlButton play playSong" onclick="playSong()">
							<i class="medium material-icons">play_arrow</i>
						</button>
						<button class="controlButton pause pauseSong" onclick="pauseSong()">
							<i class="medium material-icons">pause</i>
						</button>
						<button class="controlButton next" onclick="nextSong()">
							<i class="material-icons">skip_next</i>
						</button>
						<button class="controlButton repeat" onclick="setRepeat()">
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
<script type="text/javascript" src="../js/index.js"></script>
</html>