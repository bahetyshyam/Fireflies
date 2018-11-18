<?php
	class Album {

		private $con;
		private $id;
		private $title;
		private $artistId;
		private $genre;
		private $artworkPath;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM Albums WHERE Album_id='$this->id'");
			$album = mysqli_fetch_array($query);

			$this->title = $album['Album_name'];
			$this->artistId = $album['Artist_id'];
			$this->genre = $album['Genre_id'];
			$this->artworkPath = $album['Album_art'];


		}

		public function getTitle() {
			return $this->title;
		}

		public function getArtist() {
			return new Artist($this->con, $this->artistId);
		}

		public function getGenre() {
			return $this->genre;
		}

		public function getArtworkPath() {
			return $this->artworkPath;
		}

		public function getSongId() {
			$Oquery = mysqli_query($this->con, "SELECT * FROM Tracks WHERE Album_id='$this->id'");
			$array =  array();

			while($row = mysqli_fetch_array($Oquery)) {
				array_push($array,$row['Track_id']);
			}
			return $array;
		}
	}
?>