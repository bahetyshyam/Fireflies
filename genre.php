<?php
	include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Genre</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/hover-min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
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
	        <!-- <ul class="right hide-on-med-and-down">
	          <li><a class="links hvr-grow" href="../signin.php">Sign In</a></li>
	          <li><a class="links hvr-grow" href="../signup.php">Sign Up</a></li>
	        </ul> -->

	        <div class="sidebar black">
	        	<div class="sideItems" id="first">
	        		<a class="sideLinks" href="search.php"><i class="medium sideIcons material-icons">search</i>Search</a>
	        	</div>
	        	<!-- <div class="sideItems">
	        		<a class="sideLinks" href="#"><i class="medium sideIcons material-icons">music_note</i>Genre</a>
	        	</div> -->
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
	<div class="genreBack grey darken-4">
		<div id="queriesHead">
			<h2 align="center">Genre</h2>
		</div>

		<div class="queries">
			<div class="queryQuestion">
				<h6>Alternative Rock</h6>
			</div>
			<div class="queryAnswer">
				<?php
					$query1 = mysqli_query($con,"select C.Song, B.Album_name, A.Artist_name
						from Artist A, Albums B, Tracks C, Genre D
						where B.Album_id=C.Album_id AND
                        B.Artist_id=A.Artist_id AND
                        B.Genre_id=D.Genre_id AND
                        D.Genre_id=1");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead3'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Artist</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query1)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery3'>
									". $row[0] ."
									</div>
									<div class='gridQuery3'>
										". $row[1] ."
									</div>
									<div class='gridQuery3'>
										". $row[2] ."
									</div>
								</div>
								
						";
					}
				?>
			</div>

			<div class="queryQuestion">
				<h6>EDM</h6>
			</div>
			<div class="queryAnswer">
				<?php
					$query2 = mysqli_query($con,"select C.Song, B.Album_name, A.Artist_name
						from Artist A, Albums B, Tracks C, Genre D
						where B.Album_id=C.Album_id AND
                        B.Artist_id=A.Artist_id AND
                        B.Genre_id=D.Genre_id AND
                        D.Genre_id=2");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead3'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Artist</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query2)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery3'>
									". $row[0] ."
									</div>
									<div class='gridQuery3'>
										". $row[1] ."
									</div>
									<div class='gridQuery3'>
										". $row[2] ."
									</div>
								</div>
								
						";
					}
				?>
			</div>

			<div class="queryQuestion">
				<h6>Pop</h6>
			</div>
			<div class="queryAnswer">
				<?php
					$query3 = mysqli_query($con,"select C.Song, B.Album_name, A.Artist_name
						from Artist A, Albums B, Tracks C, Genre D
						where B.Album_id=C.Album_id AND
                        B.Artist_id=A.Artist_id AND
                        B.Genre_id=D.Genre_id AND
                        D.Genre_id=3");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead3'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Artist</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query3)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery3'>
									". $row[0] ."
									</div>
									<div class='gridQuery3'>
										". $row[1] ."
									</div>
									<div class='gridQuery3'>
										". $row[2] ."
									</div>
								</div>
								
						";
					}
				?>
			</div>

			<div class="queryQuestion">
				<h6>Hip Hop</h6>
			</div>
			<div class="queryAnswer">
				<?php
					$query4 = mysqli_query($con,"select C.Song, B.Album_name, A.Artist_name
						from Artist A, Albums B, Tracks C, Genre D
						where B.Album_id=C.Album_id AND
                        B.Artist_id=A.Artist_id AND
                        B.Genre_id=D.Genre_id AND
                        D.Genre_id=4");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead3'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Artist</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query4)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery3'>
									". $row[0] ."
									</div>
									<div class='gridQuery3'>
										". $row[1] ."
									</div>
									<div class='gridQuery3'>
										". $row[2] ."
									</div>
								</div>			
						";
					}
				?>
			</div>

			<div class="queryQuestion">
				<h6>Country</h6>
			</div>
			<div class="queryAnswer">
				<?php
					$query5 = mysqli_query($con,"select C.Song, B.Album_name, A.Artist_name
						from Artist A, Albums B, Tracks C, Genre D
						where B.Album_id=C.Album_id AND
                        B.Artist_id=A.Artist_id AND
                        B.Genre_id=D.Genre_id AND
                        D.Genre_id=5");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead3'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Artist</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query5)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery3'>
									". $row[0] ."
									</div>
									<div class='gridQuery3'>
										". $row[1] ."
									</div>
									<div class='gridQuery3'>
										". $row[2] ."
									</div>
								</div>			
						";
					}
				?>
			</div>

			<div class="queryQuestion">
				<h6>Rock</h6>
			</div>
			<div class="queryAnswer">
				<?php
					$query6 = mysqli_query($con,"select C.Song, B.Album_name, A.Artist_name
						from Artist A, Albums B, Tracks C, Genre D
						where B.Album_id=C.Album_id AND
                        B.Artist_id=A.Artist_id AND
                        B.Genre_id=D.Genre_id AND
                        D.Genre_id=6");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead3'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Artist</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query6)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery3'>
									". $row[0] ."
									</div>
									<div class='gridQuery3'>
										". $row[1] ."
									</div>
									<div class='gridQuery3'>
										". $row[2] ."
									</div>
								</div>			
						";
					}
				?>
			</div>

			<div class="queryQuestion">
				<h6>Metal</h6>
			</div>
			<div class="queryAnswer">
				<?php
					$query7 = mysqli_query($con,"select C.Song, B.Album_name, A.Artist_name
						from Artist A, Albums B, Tracks C, Genre D
						where B.Album_id=C.Album_id AND
                        B.Artist_id=A.Artist_id AND
                        B.Genre_id=D.Genre_id AND
                        D.Genre_id=7");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead3'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Artist</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query7)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery3'>
									". $row[0] ."
									</div>
									<div class='gridQuery3'>
										". $row[1] ."
									</div>
									<div class='gridQuery3'>
										". $row[2] ."
									</div>
								</div>			
						";
					}
				?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/index.js"></script>
</html>