function toggleAjaxLoader(method, result) {
	if(method == 'add') {

        if(result == true) {
    		$('.ajaxLoader').html("<span class='iconfa-thumbs-up' style='margin-bottom: 15px;'><br />Tee sheet updated!");

    		$('.ajaxLoaderContainer').delay(1000).queue(function(nxt) {
          		$(this).addClass('hide');
    	      	nxt();
    		});
        } else {
            $('.ajaxLoader').html("<span class='iconfa-thumbs-down' style='margin-bottom: 15px;'><br />Error. Please try again.");

            $('.ajaxLoaderContainer').delay(1000).queue(function(nxt) {
                $(this).addClass('hide');
                nxt();
            });
        }

	} else {
		$('.ajaxLoader').html("<div class='bubblingG'><span id='bubblingG_1'></span><span id='bubblingG_2'></span><span id='bubblingG_3'></span></div>Updating tee sheet...");
		$('.ajaxLoaderContainer').removeClass('hide');
	}
}