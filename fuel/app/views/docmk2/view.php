<?php echo $docinfo ; ?>
<?php echo isset($flow) ? $flow : ''; ?>
<?php echo $comments; ?>
<fieldset class="buttons">
	<?php echo Html::anchor(Uri::segment(1), 'Back', array('class' => 'button')); ?>
</fieldset>