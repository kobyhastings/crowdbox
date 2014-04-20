


<div class="row" style="margin: 60px 0px;">
    <div class="col-md-5 col-md-offset-7">
        <div id="contentWrapper">
            <h3>Sign in</h3>

            <?php echo form_open('signin/verify', 'id="signinform" class="form form-horizontal"'); ?>
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
                url: "<?php echo site_url(); ?>/home",
                type: "post"
            });
            request.always(function () {
                $.get("<?php echo site_url(); ?>/home", function (response) {
                    $("#contentWrapper").html(response);
                    $("#contentWrapper").fadeIn(fadeDuration);
                });
            });
        });
        event.preventDefault();
    });


</script>