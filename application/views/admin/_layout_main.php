<html>
	<head>
		<title>CrowdBox</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/custom-styles.css">

		<script src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="https://www.rdio.com/api/api.js?client_id=h-uaNDbmEGuS2niqTrAUAQ"></script>

		<link href='http://fonts.googleapis.com/css?family=Miss+Fajardose|Raleway' rel='stylesheet' type='text/css'>

	</head>
	<body id="body">
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<h1><?php echo $event->eventcode; ?></h1>
				<p style="font-style: italic;">
					<?php echo $event->city.", ".$event->state." ".$event->zip; ?>
				</p>
			</div>
			<div class="col-md-2 col-md-offset-3">
				<a href="<?php echo site_url(); ?>/home"><img src="img/logo-lg.png" style="max-width: 100%; padding-top: 40px;"></a>
			</div>
		</div>
		<?php $this->load->view($main_content); ?>

		<div id="proudlyPowered">Proudly powered by Rdio.</div>

	</body>
</html>