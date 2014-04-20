
<div class="row" style="margin: 60px 0px;">
	<div class="col-md-6 col-md-offset-6">
		<div id="contentWrapper">
			<h1>Your Events:</h1>
			<?php foreach ($events as $event) {
				echo "<span style='font-size: 20px; color: #222;'>";
				if ($event->begin != NULL) {
					echo "<strong>".$event->eventcode."</strong> <em>&nbsp;&nbsp;(live)</em> &nbsp;&nbsp;&nbsp;";
					echo anchor('admin/eventView/'.$event->id, 'View');
				} else {
					echo "<strong>".$event->eventcode."</strong> <em>&nbsp;&nbsp;(upcoming)</em> &nbsp;&nbsp;&nbsp;";
					echo anchor('admin/eventView/'.$event->id, 'View');
				}
				echo "</span>";
			} ?>
		</div>
	</div>
</div>