<html>
<head>
	<title>LAHACKS</title>
	<script src="js/jquery.js"></script>
	<script>
			$('#status').html('Connecting to server, please wait...');
			if (!!window.EventSource) {
				var source = new EventSource('stream.php');
				
				source.addEventListener('message', function(e) {
					console.log(e.data);
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
</head>
<body>
	<div id="status"></div>

</body>
</html>