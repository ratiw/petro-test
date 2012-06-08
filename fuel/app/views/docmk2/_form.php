<?php
	$this_controller = Str::lower(Uri::segment(1));
	$this_method = Str::lower(Uri::segment(2));
	
	if ( isset($errors) )
	{
		// echo "<pre><code>";
		// echo '<div>'.Petro::render_errors($errors).'</div>';
		// echo "</code></pre>";
	}
	else
	{
		$errors = array();
	}
?>

<?php echo Form::open(array('id' => 'form1', 'class' => 'form-horizontal')); ?>

	<div class="panel">
		<div class="panel-header">
			<h3>Panel Header</h3>
		</div>
		<div class="panel-content">
			<div class="row-fluid">
				<div class="span6">
					<?php 
						$docinfo = DocInfo::get_next('MK');
						$attr = array(
								'id' => 'form1_mk_no', 
								'autofocus' => 'autofocus', 
						);
						
						if ( $this_method != 'create' )
						{
							$attr['disabled'] = 'disabled';
						}
						
						echo Form::hidden('last_docno', $docinfo['last'], array('id' => 'form1_last_docno'));
					?>
					<div class="control-group<?php echo isset($errors['mk_no']) ? ' error' : ''; ?>">
						<label class="control-label" for="mk_no"><?php echo __('mk_no'); ?> <span class="badge badge-error" title="this is requried">:</span><?php echo Petro::render_errors($errors, 'mk_no');?></label>
						<div class="controls">
							<?php
								echo Form::input('mk_no', 
									Input::post('mk_no', isset($docmk) ? $docmk->mk_no : $docinfo['next']), 
									$attr
								); 
							?>
							<?php if ($this_method == 'create'): ?>
								<button class="btn" id="btn_next_docno" name="get_next_docno"><i class="icon-refresh"></i></button>
							<?php endif; ?>
						</div>
					</div>
					<?php 
						echo Petro_Form::input('mk_date', Input::post('mk_date', isset($docmk) ? Petro::to_app_date($docmk->mk_date) : ''), 
								array(
									'id' => 'form1_mk_date',
									'placeholder' => 'dd/mm/yy',
									'class' => 'datepicker',
								), __('mk_date'), $errors);
						
						$client = Petro_Lookup::table('clients', 'id', 'name');
						echo Petro_Form::select('client_id', Input::post('client_id', isset($docmk) ? $docmk->client_id : ''), 
								array_merge(array('0' => '-- เลือก --'), $client),
								array(
									'id' => 'form1_client_id', 
								), __('client_id'), $errors); 
						
						echo Petro_Form::input('client_po', Input::post('client_po', isset($docmk) ? $docmk->client_po : ''), 
								array(
									'id' => 'form1_client_po', 
								), __('client_po'), $errors); 
					?>
				</div>
				<div class="span6">
					<h3><?php echo __('delivery_head'); ?></h3>
					<?php
						echo Petro_Form::input('delivery_date', Input::post('delivery_date', isset($docmk) ? Petro::to_app_date($docmk->delivery_date) : ''), 
								array(
									'id' => 'form1_delivery_date',
									'placeholder' => 'dd/mm/yy',
									'class' => 'datepicker ',
								), __('delivery_date'), $errors); 
								
						echo Petro_Form::textarea('deliver_to', Input::post('deliver_to', isset($docmk) ? $docmk->deliver_to : ''), 
								array(
									'id' => 'form1_deliver_to', 
									'style' => 'width:90%',
								), __('deliver_to'), $errors); 
					?>
				</div>
			</div><!--/row-->
			<!--belt spec-->
<?php include('_form_belt_spec.php'); ?>
			<div class="row-fluid">
				<div class="span7">
				<?php
					echo Petro_Form::input('belt_qty', Input::post('belt_qty', isset($docmk) ? $docmk->belt_qty : ''), array('id' => 'form1_belt_qty', 'class' => 'span2'), __('belt_qty'), $errors);
					echo Petro_Form::input('belt_price_net', Input::post('belt_price_net', isset($docmk) ? $docmk->belt_price_net : ''), array('id' => 'form1_belt_price_net'), __('belt_price_net'), $errors); 
					echo Petro_Form::input('belt_amount', Input::post('belt_amount', isset($docmk) ? $docmk->belt_amount : ''), array('id' => 'form1_belt_amount'), __('belt_amount'), $errors);
					echo Petro_form::textarea('remark', Input::post('remark', isset($docmk) ? $docmk->remark : ''), array('id' => 'form1_remark', 'class' => 'span4'), __('remark'), $errors);
					
					$status = Petro_Lookup::get('prd.status');
					echo Petro_Form::select(
									'status', 
									Input::post('status', isset($docmk) ? $docmk->status : ''), 
									$status,
									array(
										'id' => 'form1_status',
									), __('status'), $errors); 
				?>
				</div>
				<div class="span5">
					<h3><?php echo __('belt_price_head'); ?></h3>
				<?php
					echo Petro_Form::input('belt_price', Input::post('belt_price', isset($docmk) ? $docmk->belt_price : ''), array('id' => 'form1_belt_price', 'readonly' => 'readonly'), __('belt_price'), $errors);
					echo Petro_Form::input('belt_disc1', Input::post('belt_disc1', isset($docmk) ? $docmk->belt_disc1 : ''), array('id' => 'form1_belt_disc1'), __('belt_disc1'), $errors);
					echo Petro_Form::input('disc_price', Input::post('disc_price', isset($docmk) ? $docmk->belt_price : ''), array('id' => 'form1_disc_price', 'readonly' => 'readonly'), __('disc_price'), $errors);
				?>
				</div>
			</div><!--/row-->
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Submit</button>
				<?php echo Html::anchor($this_controller, 'Cancel', array('class' => 'btn')); ?>
			</div>
		</div><!--/panel-content-->
	</div><!--/panel-->

<?php echo Form::close(); ?>
<div id="mydialog">
	This is a dialog!
</div>
<button id="test_button" class="btn">...</button>
<script>
	$('#btn_next_docno').click(function() {
		$('#form1_mk_no').load('<?php echo Uri::base().Uri::segment(1); ?>/next_docno', function(data) {
			$('#form1_mk_no').val(data);
		});
		return false;
	});
	
	$('#mydialog').dialog({
		autoOpen: false,
		height: 300,
		width: 350,
		modal: true
	});
	
	$('#test_button').click(function() {
		$('#mydialog').dialog('open');
	});
</script>