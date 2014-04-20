<h2><?php echo $event->eventcode; ?></h2>
<p style="font-style: italic;">
	<?php echo $event->city.", ".$event->state." ".$event->zip; ?>
</p>

<?php if($event->begin == NULL) { ?>
	<p>Your event has not began. To begin your event, click the button below, and a song will begin to play. Also, voting will be opened to your visitors.</p>
	<?php echo anchor('event/beginEvent/'.$event->id, 'Begin Event'); ?>
<?php } else { ?>



<?php } ?>

