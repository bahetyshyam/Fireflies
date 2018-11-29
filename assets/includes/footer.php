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