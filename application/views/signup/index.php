<a href="#" id="backButton"> << Back</a>

<h4>We can't wait to work with you.</h4>

<?php echo form_open('signup/createUser', 'id="signupform"'); ?>
	<?php echo form_input('email', '', 'placeholder="Email address"'); ?>
	<br>
	<?php echo form_input('username', '', 'placeholder="Username"'); ?>
	<br>
	<?php echo form_password('password', '', 'placeholder="Password"'); ?>
	<br>	
	<?php echo form_submit('submit', "Let's Go!"); ?>
<?php echo form_close(); ?>



<script type="text/javascript">
	var request;
   var fadeDuration = 300;
   $("a#backButton").click(function(event){
   	$('#contentWrapper').fadeOut(fadeDuration, function() {
			request = $.ajax({
			   url: '<?php echo site_url(); ?>/home',
			   type: "post"
			});
			request.always(function () {
			   $.get("<?php echo site_url(); ?>/home", function (response) {
				   $("#contentWrapper").html(response);
			     	$('#contentWrapper').fadeIn(fadeDuration);
			   });
			});
		});
     	event.preventDefault();
   });

   // $("form#signupform").submit(function(event){
   //    if (request) {
   //       request.abort();
   //    }

   //    // setup local variables
   //  var $form = $(this);
   //  // select and cache all the fields
   //  var $inputs = $form.find("input");
   //  // serialize the data in the form
   //  var serializedData = $form.serialize();
   //  // disable the inputs for the duration of the ajax request
   //  $inputs.prop("disabled", true);
   //  request = $.ajax({
   //      url: '<?php echo site_url()?>/signup/createUser',
   //      type: "post",
   //      data: serializedData
   //  });
   //  // callback handler that will be called regardless if the request failed or succeeded
   //  request.always(function () {
   //      $inputs.prop("disabled", false);
   //      $.get("<?php echo site_url()?>/signup/createUser", function (response) {
   //        $("#contentWrapper").html(response);
   //      });
   //  });
   //  // prevent default posting of form
   //  event.preventDefault();

   $("form#signupform").submit(function(event){
        // setup local variables
        var $form = $(this);
        // select and cache all the fields
        var $inputs = $form.find("input");
        // serialize the data in the form
        var serializedData = $form.serialize();
        // disable the inputs for the duration of the ajax request
        $inputs.prop("disabled", true);

        var request = $.ajax({
            url: '<?php echo site_url(); ?>/signup/createUser',
            type: "post",
            data: serializedData
        });

        request.success(function () {
            $inputs.prop("disabled", false);
            $.get("<?php echo site_url(); ?>/signup/createUser", function (response) {
               $("#contentWrapper").html(response);
            });
        });
        // prevent default posting of form
        event.preventDefault();
    // });

   });
</script>