<?php 
    $this_controller = Str::lower(Uri::segment(1));
    $this_method = Str::lower(Uri::segment(2));
?> 

<?php echo Form::open(array('id' => 'form1')); ?> 
	<?php echo Form::hidden('mk_id', $docmk->id); ?>
	<div class="rounded-block">
		<div class="clearfix">
			<label for="mk_no">Mk No:</label>
			<div class="input">
				<?php echo Form::input('mk_no', $docmk->mk_no, array('id' => 'form1_mk_no', 'disabled' => 'disabled', 'class' => 'readonly')); ?> 
			</div>
		</div>
		<div class="clearfix">
			<label for="belt_info">Belt Info:</label>
			<div class="input">
				<?php echo Form::input('belt_info', BeltInfo::short($docmk), array('disabled' => 'disabled', 'class' => 'span8 readonly')); ?>
			</div>
		</div>
<?php $error = isset($errors['suggest_roll']) ? 'error' : ''; ?>		
		<div class="clearfix <?php echo $error; ?>">
			<label for="suggest_roll">Suggest roll:</label>
			<div class="input">
				<?php 
					echo Form::input('suggest_roll', 
						Input::post('suggest_roll', isset($docmk011) ? $docmk011->suggest_roll : ''), 
						array('id' => 'form1_suggest_roll', 
							'class' => 'span4 '.$error)
					); 
				?> 
			</div>
		</div>
<?php $error = isset($errors['length']) ? 'error' : ''; ?>		
		<div class="clearfix <?php echo $error; ?>">
			<label for="length">Length:</label>
			<div class="input">
				<?php 
					echo Form::input('length', 
						Input::post('length', isset($docmk011) ? $docmk011->length : ''),
						array('id' => 'form1_length', 'class' => 'span4 '.$error)
					); 
				?> 
			</div>
		</div>
		<div class="clearfix">
			<label for="remark">Remark:</label>
			<div class="input">
				<?php echo Form::textarea('remark', Input::post('remark', isset($docmk011) ? $docmk011->remark : ''), array('id' => 'form1_remark', 'class' => 'span8')); ?> 
			</div>
		</div>
	</div>

	<div class="buttons pull-right">
		<button type="submit" class="btn primary">Submit</button>
		<?php echo Html::anchor($this_controller, 'Cancel', array('class' => 'btn')); ?>
	</div>
<?php echo Form::close(); ?>