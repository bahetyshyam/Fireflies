<?php
	include("config.php");

	if(isset($_GET['searchField'])) {
		$searchField=$con->escape_string($_GET['searchField']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/hover-min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="js/fontawesome-all.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
	<!--Navbar begins here -->
	<div class="navbar-fixed ">
	    <nav id="navbar" class="black">
	      <div class="nav-wrapper">
	        <a href="webpages/albums.php" id="brand-link" class="brand-logo hvr-grow">Fireflies</a>

	        <div class="sidebar black">
	        	<div class="sideItems" id="first">
	        		<a class="sideLinks" href="Search.php"><i class="medium sideIcons material-icons">search</i>Search</a>
	        	</div>
	        	<div class="sideItems">
	        		<a class="sideLinks" href="genre.php"><i class="medium sideIcons material-icons">music_note</i>Genre</a>
	        	</div>
	        	<div class="sideItems">
	        		<a class="sideLinks" href="webpages/albums.php"><i class="medium sideIcons material-icons">queue_music</i>Albums</a>
	        	</div>
	        	<div class="sideItems">
	        		<a class="sideLinks" href="playlist.php"><i class="medium sideIcons material-icons">library_music</i>Playlists</a>
	        	</div>
	        	<div class="sideItems">
	        		<a class="sideLinks" href="queries.php"><i class="medium sideIcons material-icons">question_answer</i>Queries</a>
	        	</div>				
			</div>

			<a class="sideBtn"></a>
	      </div>

	    </nav>

	</div>
	<!--Navbar ends here -->

	<div class="resultBack grey darken-4">
		<h2 id="searchSong" align="center">Tracks</h2>
		<?php
			$query1=mysqli_query($con,"select A.Song,B.Album_name,C.Artist_name,A.Play_time 
										from Tracks A,Albums B, Artist C
										where A.Album_id=B.Album_id and
                                        B.Artist_id=C.Artist_id and
										A.Song like '%".$searchField."%'");

			if(mysqli_num_rows($query1)==0) {
				echo "
						<div class='noResult'>
							<p align='center'>No results found</p>
						</div>
					";
			}

			else {
				echo "
						<div class='queryTable'>
							<div class='queryTableHead'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead'>
								<h6>Artist</h6>
							</div>
							<div class='queryTableHead'>
								<h6>Play Time</h6>
							</div>
						</div>
					";

				while ($row=mysqli_fetch_array($query1)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery'>
									". $row[0] ."
									</div>
									<div class='gridQuery'>
										". $row[1] ."
									</div>
									<div class='gridQuery'>
										". $row[2] ."
									</div>
									<div class='gridQuery'>
										". $row[3] ."
									</div>
								</div>
								
						";
				}
			}

			
		?>


		<h2 id="searchAlbum" align="center">Albums</h2>

		<?php
			$query2=mysqli_query($con,"select A.Album_name,B.Artist_name 
										from Albums A,Artist B
										where A.Artist_id=B.Artist_id and
										A.Album_name like '%".$searchField."%'");

			if(mysqli_num_rows($query2)==0) {
				echo "
						<div class='noResult'>
							<p align='center'>No results found</p>
						</div>
					";
			}

			else {
				echo "
						<div class='queryTable'>
							<div class='queryTableHead1'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead1'>
								<h6>Artist</h6>
							</div>
						</div>
					";

				while ($row=mysqli_fetch_array($query2)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery1'>
									". $row[0] ."
									</div>
									<div class='gridQuery1'>
										". $row[1] ."
									</div>
								</div>
								
						";
				}
			}

			
		?>

		<h2 id="searchArtist" align="center">Artists</h2>

		<?php
			$query3=mysqli_query($con,"select B.Artist_name,A.Album_name
										from Albums A,Artist B
										where A.Artist_id=B.Artist_id and
										B.Artist_name like '%".$searchField."%'");

			if(mysqli_num_rows($query3)==0) {
				echo "
						<div class='noResult'>
							<p align='center'>No results found</p>
						</div>
					";
			}

			else {
				echo "
						<div class='queryTable'>
							<div class='queryTableHead1'>
								<h6>Artist</h6>
							</div>
							<div class='queryTableHead1'>
								<h6>Album</h6>
							</div>
						</div>
					";

				while ($row=mysqli_fetch_array($query3)) {
							echo "
									<div class='queryTable'>
										<div class='gridQuery1'>
										". $row[0] ."
										</div>
										<div class='gridQuery1'>
										". $row[1] ."
										</div>
									</div>
									
							";
				}
			}

			
		?>
	</div>

</body>
<script type="text/javascript" src="js/index.js"></script>
</html>