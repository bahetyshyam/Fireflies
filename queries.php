<?php
	include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Queries</title>
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
	          <li><a class="links hvr-grow" href="register.php">Sign In</a></li>
	          <li><a class="links hvr-grow" href="register.php">Sign Up</a></li>
	        </ul> -->

	        <div class="sidebar black">
	        	<div class="sideItems" id="first">
	        		<a class="sideLinks" href="search.php"><i class="medium sideIcons material-icons">search</i>Search</a>
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
			</div>

			<a class="sideBtn"></a>
	      </div>

	    </nav>

	</div>
	<!--Navbar ends here -->
	<div class="queriesBack grey darken-4">
		<div id="queriesHead">
			<h2 align="center">Miscellaneous Queries</h2>
		</div>

		<div class="queries">
			<div class="queryQuestion">
				<h6>1. Select the name of the song, its album and its artists for those songs that have a playtime less than 1:00 and more than 7:00.</h6>
			</div>
			<div class="queryAnswer">
				<?php
					$query1 = mysqli_query($con,"select A.Song, B.Album_name, C.Artist_name, A.Play_time from Tracks A, Albums B, Artist C where A.Album_id=B.Album_id and B.Artist_id=C.Artist_id and A.Play_time not between '1:00' and '7:00' order by A.Play_time desc");
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
								<h6>Playtime</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query1)) {
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
									<div class='gridQuery' id='last1'>
										". $row[3] ."
									</div>
								</div>
								
						";
					}
				?>
			</div>

			<div class="queryQuestion">
				<h6>2. Find the albums which have been released between the years 1990 and 2005.</h6>
			</div>

			<div class="queryAnswer">
				<?php
					$query2 = mysqli_query($con,"select Album_name,Release_year from Albums
					where Release_year between '1990-01-01' and '2005-12-31';");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead1'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead1'>
								<h6>Release Year</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query2)) {
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
				?>
			</div>

			<div class="queryQuestion1">
				<h6>3. Find the name of the artists who have 4 or more songs in playlist 3.</h6>
			</div>

			<div class="queryAnswer">
				<?php
					$query3 = mysqli_query($con,"select A.Artist_name
							from Artist A
							where A.Artist_id in(select a.Artist_id
							from Artist a, Albums b, Tracks c, Playlist d 
							where a.Artist_id=b.Artist_id
							and b.Album_id=c.Album_id
							and c.Playlist_id=d.Playlist_id
							and d.Playlist_id=3
							group by a.Artist_id
							having count(*)>=4)");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead2'>
								<h6>Artist</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query3)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery2'>
										". $row[0] ."
									</div>
								</div>
								
						";
					}
				?>
			</div>


			<div class="queryQuestion1">
				<h6>4. Find the albums that have sold more than 10000000 records throughout the world and having chart position 1. (Use inner join)</h6>
			</div>

			<div class="queryAnswer">
				<?php
					$query4 = mysqli_query($con,"select A.Album_name,B.Chart_position
								from Albums A
								inner join Sales_charts B
								on A.Album_id=B.Album_id
								where B.Albums_sold > 10000000 and
								Chart_position=1");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead1'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead1'>
								<h6>Chart position</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query4)) {
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
				?>
			</div>

			<div class="queryQuestion1">
				<h6>5. Increment the number of albums sold by the artist whose name contains linkin by 30% belonging to Metal genre displaying the name of the album and the number of albums sold currently.</h6>
			</div>

			<div class="queryAnswer">
				<?php
					$query5 = mysqli_query($con,"select distinct A.Album_name, 1.3*B.Albums_sold
									from Albums A,Sales_charts B,Genre C,Artist D
									where D.Artist_id = A.Artist_id and
									D.Artist_name like '%Linkin%' and
									C.Genre_id=A.genre_id and
									A.Album_id=B.Album_id and
									C.Genre_name='Metal'");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead1'>
								<h6>Album</h6>
							</div>
							<div class='queryTableHead1'>
								<h6>Albums sold (New)</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query5)) {
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
				?>
			</div>

			<div class="queryQuestion1">
				<h6>6. Find the songs whose genre is Rock and sung by Imagine Dragons.</h6>
			</div>

			<div class="queryAnswer">
				<?php
					$query6 = mysqli_query($con,"select Track_no,Song,Play_time from Tracks
													where Track_id in(
													select A.Track_id
													from Tracks A, Genre B, Albums C, Artist D
													where C.Album_id=A.Album_id and
													C.Artist_id=D.Artist_id and
													C.Genre_id=B.Genre_id and
													B.Genre_name='Rock' and
													D.Artist_name='Imagine Dragons')");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead3'>
								<h6>#</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Song</h6>
							</div>
							<div class='queryTableHead3'>
								<h6>Play time</h6>
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

			<div class="queryQuestion7">
				<h6>7. Determine the users whose name starts with A and have signed up after 1st January 2018.</h6>
			</div>

			<div class="queryAnswer">
				<?php
					$query7 = mysqli_query($con,"select username,firstName,lastName,email,signUpDate from Users 
												where firstName LIKE 'A%' and
												signUpDate > '2018-01-01 00:00:00';");
					echo "
						<div class='queryTable'>
							<div class='queryTableHead4'>
								<h6>Username</h6>
							</div>
							<div class='queryTableHead4'>
								<h6>First Name</h6>
							</div>
							<div class='queryTableHead4'>
								<h6>Last Name</h6>
							</div>
							<div class='queryTableHead4'>
								<h6>Email ID</h6>
							</div>
							<div class='queryTableHead4'>
								<h6>Signed Up on</h6>
							</div>
						</div>
					";


					while ($row = mysqli_fetch_array($query7)) {
						echo "
								<div class='queryTable'>
									<div class='gridQuery4'>
										". $row[0] ."
									</div>
									<div class='gridQuery4'>
										". $row[1] ."
									</div>
									<div class='gridQuery4'>
										". $row[2] ."
									</div>
									<div class='gridQuery4'>
										". $row[3] ."
									</div>
									<div class='gridQuery4'>
										". $row[4] ."
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