<div id="status"></div>

<script>
		$('#status').html('Connecting to server, please wait...');
		if (!!window.EventSource) {
			var source = new EventSource('sse/stream.php');
			
			source.addEventListener('message', function(e) {
				var data = JSON.parse(e.data);
  				console.log(data.id, data.msg);
			}, false);

			source.addEventListener('open', function(e) {
				// Connection was opened.
			}, false);

			source.addEventListener('error', function(e) {
				if (e.readyState == EventSource.CLOSED) {
					// Connection was closed.
				}
			}, false);

		} else {
			// Result to xhr polling :(
			console.log('didnt work');
		}

</script>