<?php
	$songQuery = mysqli_query($con, "SELECT Track_id FROM Tracks ORDER BY RAND() LIMIT 10");

	$resultArray = array();

	while($row = mysqli_fetch_array($songQuery)) {
		array_push($resultArray, $row['Track_id']);
	}

	$jsonArray = json_encode($resultArray);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Albums</title>
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

	<div class="navbar-fixed">
	    <nav id="navbar" class="black">
	      <div class="nav-wrapper">
	        <a href="#" id="brand-link" class="brand-logo">Fireflies</a>

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

	<script>

		$(document).ready(function() {
			currentPlaylist=<?php echo $jsonArray; ?>;
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