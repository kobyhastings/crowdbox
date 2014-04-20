<div id="contentWrapper">


	<a href="#" id="backButton"> << Back</a>

	<h3>Welcome To the Create Event Page</h3>

	<?php echo form_open('admin/create_event', 'id="newevent"'); ?>
		<?php echo form_input('address', '', 'placeholder="Enter your address"'); ?>
		<br>
		<?php echo form_input('city', '', 'placeholder="Enter your city"'); ?>
		<br>
		<?php echo form_input('state', '', 'placeholder="Enter you state"'); ?>
		<br>
		<?php echo form_input('zipcode', '', 'placeholder="Enter your zip code"'); ?>
		<br>
		<?php echo form_input('eventcode', '', 'placeholder="Enter you event code"'); ?>
		<br>
		<?php echo form_submit('submit', "Let's Go!", 'id="save_event"'); ?>
	<?php echo form_close(); ?>
</div>



<script type="text/javascript">
	var request;
   var fadeDuration = 300;
   $("a#backButton").click(function(event){
   	$('#contentWrapper').fadeOut(fadeDuration, function() {
			request = $.ajax({
			   url: '<?php echo site_url(); ?>/admin/index',
			   type: "post"
			});
			request.always(function () {
			   $.get("<?php echo site_url(); ?>/admin/index", function (response) {
				   $("#contentWrapper").html(response);
			     	$('#contentWrapper').fadeIn(fadeDuration);
			   });
			});
		});
     	event.preventDefault();
   });
</script>




	<script type="text/javascript">
	var request;
    var fadeDuration = 300;
    $("#save_event").click(function(event){
   		$('#contentWrapper').fadeOut(fadeDuration, function() {
			request = $.ajax({
			   	url: "<?php echo site_url(); ?>/admin/save_event",
			   	type: "post"
			});

			request.always(function () {
				$.get("<?php echo site_url(); ?>/admin/save_event", function (response) {
			 		$("#contentWrapper").html(response);
			      	$('#contentWrapper').fadeIn(fadeDuration);
			   });
			});
		});
     	event.preventDefault();
   });
</script>
