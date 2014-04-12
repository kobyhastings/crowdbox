<div id="contentWrapper">
	<h3>Welcome to ~appname~!</h3>

	<?php echo form_open('public/enterevent'); ?>
		<input name="eventcode" placeholder="Enter event code" style="width: 200px; text-align: center; padding: 8px;" />
	<?php echo form_close(); ?>

	<button style="height: 40px; width: 200px;">Sign in to create an event.</button>
	<br>
	<a href="#" id="signUpButton" style=" display: block; width: 200px; text-align: center; margin-top: 4px; font-size: 11px;">Or, sign up now</a>
</div>

<script type="text/javascript">
	var request;
   var fadeDuration = 300;
   $("#signUpButton").click(function(event){
   	$('#contentWrapper').fadeOut(fadeDuration, function() {
			var $form = $(this);
			var $inputs = $form.find("input");
			var serializedData = $form.serialize();
			$inputs.prop("disabled", true);

			request = $.ajax({
			   url: '<?php echo site_url(); ?>/signup/index',
			   type: "post",
			   data: serializedData
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