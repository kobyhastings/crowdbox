<?php
	header('Content-Type: text/event-stream');
	header('Cache-Control: no-cache');
?>

data: {
data: "msg": "hello world",
data: "id": 12345
data: }

<?php
	flush();
?>