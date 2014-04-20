<div id="contentWrapper">

<!-- Back Button --> 
<a href="#" id="backButton"> << Back</a>

<!-- Title of page --> 
	<h3>Welcome <?php echo $this->session->userdata('username'); ?>!</h3>
	<button id="createButton" style="padding: 15px 6px; display: block; background: #333; color: #fff; width: 200px; text-align: center; margin-top: 4px; font-size: 11px;">+ Create Event</button>
</div>



<!--Function for making a new create Button -->
<script type="text/javascript">
	var request;
   var fadeDuration = 300;
   $("a#backButton").click(function(event){
   	$('#contentWrapper').fadeOut(fadeDuration, function() {
			request = $.ajax({
			   url: '<?php echo site_url(); ?>/signup/index',
			   type: "post"
			});
			request.always(function () {
			   $.get("<?php echo site_url(); ?>/signup/index", function (response) {
				   $("#contentWrapper").html(response);
			     	$('#contentWrapper').fadeIn(fadeDuration);
			   });
			});
		});
     	event.preventDefault();
   });
</script>



<!--Function for making a new create Button -->
<script type="text/javascript">
	var request;
    var fadeDuration = 300;
    $("#createButton").click(function(event){
   		$('#contentWrapper').fadeOut(fadeDuration, function() {
			request = $.ajax({
			   	url: "<?php echo site_url(); ?>/admin/create_event",
			   	type: "post"
			});

			request.always(function () {
				$.get("<?php echo site_url(); ?>/admin/create_event", function (response) {
			 		$("#contentWrapper").html(response);
			      	$('#contentWrapper').fadeIn(fadeDuration);
			   });
			});
		});
     	event.preventDefault();
   });
</script>