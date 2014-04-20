
<?php if($event->begin == NULL) { ?>
	<div class="message">
		<h3>Your event has not yet begun. To begin your event, please click below. <br> Also, voting will be opened to your visitors upon this action.</h3>
		<?php echo anchor('event/beginEvent/'.$event->id, 'Begin Event', 'class="btn btn-lg btn-inverse" id="beginEvent"'); ?>
	</div>
<?php } else { ?>
	
	<div class="row">
		<div class="divider col-md-10 col-md-offset-1">&nbsp;</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<h3>Next Song:</h3>
			<?php foreach ($nextTracks as $track) { ?>
				<div class="alert alert-inverse">
					<?php echo $track->name ."<span style='color: #fff;'> - ". $track->artist."</span><br />"; ?>
				</div>
			<? } ?>
		</div>
		<div class="col-md-5 col-md-offset-1">
			<h3>Now Playing:</h3>
			<div class="row">
				<?php echo img($trackToPlay->icon400); ?>
			</div>
			<!-- <div class="row">
				<div class="col-md-4 col-md-offset-1">
					<i class="glyphicon glyphicon-play"></i>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<i class="glyphicon glyphicon-pause"></i>
				</div>
				<div style="clear:both;"></div>
			</div> -->

		</div>
	</div>

	<div id="results">

	</div>

<?php } ?>

<script type="text/javascript">
	$(document).ready(function() {
		R.ready(function() {
			if(!R.authenticated())
				R.authenticate();
			R.player.play({source: "<?php echo $trackToPlay->key; ?>"});
		});
		
		setTimeout(function() { 
			var request = $.ajax({
			   url: '<?php echo site_url(); ?>/event/getNextTrack',
			   type: "post"
			});

			request.always(function () {
			   $.get("<?php echo site_url(); ?>/event/getNextTrack", function (response) {
				   R.player.play({source: response});
			   });
			});

		}, <?php echo ($trackToPlay->duration)*1000; ?>);
	});
</script>

