
	<div class="row">
		<div class="divider col-md-10 col-md-offset-1">&nbsp;</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<h3>Vote for the Next Song:</h3>

			<p class="thanks"></p>

			<?php $track = $this->event_tracks_model->get($tracks->upcomingone); ?>
			<a href="#" id="votesone">
				<div class="alert alert-inverse">
					<?php echo $track->name ."<span style='color: #fff;'> - ". $track->artist."</span><br />"; ?>
				</div>
			</a>

			<a href="#" id="votestwo">
				<?php $track = $this->event_tracks_model->get($tracks->upcomingtwo); ?>
				<div class="alert alert-inverse">
					<?php echo $track->name ."<span style='color: #fff;'> - ". $track->artist."</span><br />"; ?>
				</div>
			</a>

			<a href="#" id="votesthree">
				<?php $track = $this->event_tracks_model->get($tracks->upcomingthree); ?>
				<div class="alert alert-inverse">
					<?php echo $track->name ."<span style='color: #fff;'> - ". $track->artist."</span><br />"; ?>
				</div>
			</a>

			<a href="#" id="votesfour">
				<?php $track = $this->event_tracks_model->get($tracks->upcomingfour); ?>
				<div class="alert alert-inverse">
					<?php echo $track->name ."<span style='color: #fff;'> - ". $track->artist."</span><br />"; ?>
				</div>
			</a>


		</div>
		<div class="col-md-5 col-md-offset-1">
			<h3>Now Playing:</h3>
			<div class="row">
				<?php $trackToPlay = $this->event_tracks_model->get($tracks->nowplaying); ?>
				<?php echo img($trackToPlay->icon400); ?>
			</div>

		</div>
	</div>

	<div id="results">

	</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('a#votesone').click(function() {
			var request = $.ajax({
			   url: '<?php echo site_url(); ?>/event/voteone',
			   type: "post"
			});

			request.always(function () {
			   $.get("<?php echo site_url(); ?>/event/voteone", function (response) {
				   $('a#votesone').href = "javascript:void(0)";
				   $('p.thanks').html('Thanks for voting! Listen for your song coming up!');
			   });
			});
		});

		$('a#votestwo').click(function() {
			var request = $.ajax({
			   url: '<?php echo site_url(); ?>/event/votetwo',
			   type: "post"
			});

			request.always(function () {
			   $.get("<?php echo site_url(); ?>/event/votetwo", function (response) {
				   $('a#votestwo').href = "javascript:void(0)";
				   $('p.thanks').html('Thanks for voting! Listen for your song coming up!');
			   });
			});
		});

		$('a#votesthree').click(function() {
			var request = $.ajax({
			   url: '<?php echo site_url(); ?>/event/votethree',
			   type: "post"
			});

			request.always(function () {
			   $.get("<?php echo site_url(); ?>/event/votethree", function (response) {
				   $('a#votesthree').href = "javascript:void(0)";
				   $('p.thanks').html('Thanks for voting! Listen for your song coming up!');
			   });
			});
		});

		$('a#votesfour').click(function() {
			var request = $.ajax({
			   url: '<?php echo site_url(); ?>/event/votefour',
			   type: "post"
			});

			request.always(function () {
			   $.get("<?php echo site_url(); ?>/event/votefour", function (response) {
				   $('a#votesfour').href = "javascript:void(0)";
				   $('p.thanks').html('Thanks for voting! Listen for your song coming up!');
			   });
			});
		});
			
	});
</script>