<?php
	class Tracks {

		private $con;
		private $id;
		private $num;
		private $title;
		private $albumId;
		private $playlist;
		private $duration;
		private $path;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM Tracks WHERE Track_id='$this->id'");
			$track = mysqli_fetch_array($query);
			$this->title = $track['Song'];
			$this->albumId = $track['Album_id'];
			$this->playlist = $track['Playlist_id'];
			$this->duration = $track['Play_time'];
			$this->path = $track['Song_file'];
			$this->num = $track['Track_no'];
			$this->id = $track['Track_id'];
		}

		public function getTitle() {
			return $this->title;
		}

		public function getId() {
			return $this->id;
		}


		public function getAlbum() {
			return new Album($this->con, $this->albumId);
		}

		public function getPath() {
			return $this->path;
		}

		public function getDuration() {
			return $this->duration;
		}

		public function getNumber() {
			return $this->num;
		} 
	}
?>