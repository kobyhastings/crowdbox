


<div class="row" style="margin: 60px 0px;">
  <div class="col-md-5 col-md-offset-7">
    <div id="contentWrapper">
    
      <h3>We can't wait to work with you.</h3>

      <?php echo form_open('signup/createUser', 'id="signupform" class="form form-horizontal"'); ?>
      	<?php echo form_input('email', '', 'placeholder="Email address" class="input-lg"'); ?>
      	<br>
      	<?php echo form_input('username', '', 'placeholder="Username" class="input-lg"'); ?>
      	<br>
      	<?php echo form_password('password', '', 'placeholder="Password" class="input-lg"'); ?>
      	<br>	
      	<?php echo form_submit('submit', "Let's Go!", 'class="btn btn-inverse"'); ?>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>


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