<?php 
	class Artist {
			private $con;
			private $artistId;
			private $artistName;
			private $artistPhoto;

			public function __construct($con, $artistId) {
				$this->con = $con;
				$this->artistId = $artistId;

				$Query = mysqli_query($this->con,"SELECT * FROM Artist WHERE Artist_id = '$this->artistId'");
				$artist = mysqli_fetch_array($Query);

				$this->artistName = $artist['Artist_name'];
				$this->artistPhoto = $artist['Artist_photo'];
				$this->artistId = $artist['Artist_id'];

			}

			public function getName() {
				return $this->artistName;
			}

			public function getId() {
				return $this->artistId;
			}

			public function getArtworkPath() {
				return $this->artistPhoto;
			}
	}
?>