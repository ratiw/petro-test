<?php echo Form::open(array('id' => 'form1', 'class' => 'form-inputs')); ?>
	<table border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
			<td style="width:50%">
				<div class="panel">
					<h3>Document Info</h3>
					<div class="panel_contents">
						<div class="horz-inputs">
							<label for="mk_no">Mk No:</label>
							<?php echo Form::input('mk_no', 
								Input::post('mk_no', isset($docmk) ? $docmk->mk_no : ''), 
								array('id' => 'form1_mk_no', 'autofocus' => 'autofocus',
								)); 
							?>
						</div>
						<div class="horz-inputs">
							<label for="mk_date">Mk Date:</label>
							<?php echo Form::input('mk_date', 
								Input::post('mk_date', isset($docmk) ? $docmk->mk_date : ''), 
								array('id' => 'form1_mk_date',
									'style' => 'width:25%'
								)); 
							?>
						</div>
						<div class="horz-inputs">
							<label for="client_id">Client:</label>
							<?php 
								$client = Petro_Lookup::get_domain_array('clients', 'id', 'name');
								echo Form::select('client_id', 
								Input::post('client_id', isset($docmk) ? $docmk->client_id : ''), 
								array_merge(array('0' => '-- เลือก --'), $client),
								array('id' => 'form1_client_id', 'style' => 'width:60%')); 
							?>
						</div>
						<div class="horz-inputs">
							<label for="client_po">Client PO#:</label>
							<?php echo Form::input('client_po', Input::post('client_po', isset($docmk) ? $docmk->client_po : ''), array('id' => 'form1_client_po', 'style' => 'width:55%')); ?>
						</div>
					</div>
				</div>
			</td>
			<td>
				<div class="panel">
					<h3>Delivery Info</h3>
					<div class="panel_contents">
						<div class="horz-inputs">
							<label for="deliver_date">Deliver date:</label>
							<?php echo Form::input('deliver_date', Input::post('deliver_date', isset($docmk) ? $docmk->deliver_date : ''), array('id' => 'form1_deliver_date')); ?>
						</div>
						<div class="horz-inputs">
							<label for="deliver_to">Deliver to:</label>
							<?php echo Form::input('deliver_to', Input::post('deliver_to', isset($docmk) ? $docmk->deliver_to : ''), 
								array('id' => 'form1_deliver_to', 'style' => 'width:90%')
							); 
							?>
						</div>
						<br/>
						<div class="horz-inputs">
							<label for="is_delivered">Is delivered:</label>
							<?php echo Form::checkbox('is_delivered', Input::post('is_delivered', isset($docmk) ? $docmk->is_delivered : ''), array('id' => 'form1_is_delivered')); ?>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</tbody>
	</table>
	<div>
		<div class="panel">
			<h3>Product Specification</h3>
			<div class="panel_contents">
				<div class="horz-inputs-wide">
					<label for="product_type">Product type:</label>
					<?php
						$prod_type = Petro_Lookup::get_array('product.type');
						echo Form::select(
							'product_type',
							Input::post('product_type', isset($docmk) ? $prod_type[$docmk->product_type] : ''),
							$prod_type,
							array('id' => 'form1_product_type')
						);
					?>
				</div>
				<div class="horz-inputs-wide">
					<label for="belt_type">Belt type:</label>
					<?php 
						$belt_type = Petro_Lookup::get_array('belt.type');
						echo Form::select(
							'belt_type',
							Input::post('belt_type',	isset($docmk) ? $belt_type[$docmk->belt_type] : ''),
							$belt_type,
							array('id' => 'form1_belt_type')
						);
					?>
				</div>
				<div class="horz-inputs-wide">
					<?php 
						$belt_color = Petro_Lookup::get_array('belt.color');
						// echo Petro::render_radio_group('belt_color', 'Belt Color:', $belt_color, '');
					?><label for="belt_color_radio">Belt color:</label>
					<input type="hidden" name="belt_color" id="belt_color" value="">
					<ul>
						<li>
							<input type="radio" name="belt_color_radio" id="belt_color_1" value="blck"/>
							<label for="belt_color_1">ดำ</label>
						</li>
						<li>
							<input type="radio" name="belt_color_radio" id="belt_color_2" value="white"/>
							<label for="belt_color_2">ขาว</label>
						</li>
						<li>
							<input type="radio" name="belt_color_radio" id="belt_color_3" value="others"/>
							<label for="belt_color_3">อื่นๆ (ระบุ)</label>
						</li>
					</ul>
					<input type="text" style="width:10%" name="belt_color_other" id="belt_color_other" value="" />
				</div>
				<div class="horz-inputs-wide">
					<label for="belt_width">Belt width:</label>
					<?php echo Form::input('belt_width', Input::post('belt_width', isset($docmk) ? $docmk->belt_width : ''), array('id' => 'form1_belt_width', 'style' => 'width:10%')); ?>
					<?php 
						$belt_wunit = Petro_Lookup::get_array('belt.w.unit');
						echo Form::select(
							'belt_width_unit', 
							Input::post('belt_width_unit', isset($docmk) ? $betl_wunit[$docmk->belt_width_unit] : ''), 
							$belt_wunit,
							array('id' => 'form1_belt_width_unit')
						); 
					?>
				</div>
				<div class="horz-inputs-wide">
					<label for="belt_ply">Belt Ply:</label>
					<?php echo Form::input('belt_ply', Input::post('belt_ply', isset($docmk) ? $docmk->belt_ply : ''), array('id' => 'form1_belt_ply', 'style' => 'width:10%')); ?>
				</div>
				<div class="horz-inputs-wide">
					<label for="belt_ep">Belt EP:</label>
					<?php 
						$belt_ep = Petro_Lookup::get_array('belt.ep');
						echo Form::select(
							'belt_ep', 
							Input::post('belt_ep', isset($docmk) ? $belt_ep[$docmk->belt_ep] : ''), 
							$belt_ep,
							array('id' => 'form1_belt_ep')
						);
					?>
				</div>
			</div>
		</div>
	</div>
	<table border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
			<td style="width:33%">
				<div class="panel">
					<h3>Belt Grade</h3>
					<div class="panel_contents">
						<div class="horz-inputs-small">
							<label for="belt_grade">Grade:</label>
							<?php 
								$belt_grade = Petro_Lookup::get_array('belt.grade');
								echo Form::select(
									'belt_grade', 
									Input::post('belt_grade', isset($docmk) ? $belt_grade[$docmk->belt_grade] : ''), 
									$belt_grade,
									array('id' => 'form1_belt_grade')
								);
							?>
						</div>
						<div class="horz-inputs-small">
							<label for="belt_top_grade">Top Grade:</label>
							<?php echo Form::input('belt_top_grade', Input::post('belt_top_grade', isset($docmk) ? $docmk->belt_top_grade : ''), array('id' => 'form1_belt_top_grade')); ?>
						</div>
						<div class="horz-inputs-small">
							<label for="belt_bot_grade">Bottom Grade:</label>
							<?php echo Form::input('belt_bot_grade', Input::post('belt_bot_grade', isset($docmk) ? $docmk->belt_bot_grade : ''), array('id' => 'form1_belt_bot_grade')); ?>
						</div>
					</div>
				</div>
			</td>
			<td style="width:33%">
				<div class="panel">
					<h3>Belt Thickness (mm.)</h3>
					<div class="panel_contents">
						<div class="horz-inputs-small">
							<label for="belt_thick">Total&nbsp;thickness:</label>
							<?php echo Form::input('belt_thick', Input::post('belt_thick', isset($docmk) ? $docmk->belt_thick : ''), array('id' => 'form1_belt_thick')); ?>
						</div>
						<div class="horz-inputs-small">
							<label for="belt_top_thick">Top&nbsp;thickness:</label>
							<?php echo Form::input('belt_top_thick', Input::post('belt_top_thick', isset($docmk) ? $docmk->belt_top_thick : ''), array('id' => 'form1_belt_top_thick')); ?>
						</div>
						<div class="horz-inputs-small">
							<label for="belt_bot_thick">Bottom&nbsp;thickness:</label>
							<?php echo Form::input('belt_bot_thick', Input::post('belt_bot_thick', isset($docmk) ? $docmk->belt_bot_thick : ''), array('id' => 'form1_belt_bot_thick')); ?>
						</div>
					</div>
				</div>
			</td>
			<td>
				<div class="panel">
					<h3>Belt Length</h3>
					<div class="panel_contents">
						<div class="horz-inputs-small">
							<label for="belt_length" style="width:40%">Belt length:</label>
							<?php echo Form::input('belt_length', Input::post('belt_length', isset($docmk) ? $docmk->belt_length : ''), array('id' => 'form1_belt_length', 'style' => 'width:15%')); ?>
							<?php 
								$belt_lunit = Petro_Lookup::get_array('belt.l.unit');
								echo Form::select(
									'belt_length_unit', 
									Input::post('belt_length_unit', isset($docmk) ? $belt_lunit[$docmk->belt_length_unit] : ''), 
									$belt_lunit,
									array('id' => 'form1_belt_length_unit')
								);
							?>
						</div>
						<div class="horz-inputs-small">
							<label for="belt_end" style="width:40%">Belt end:</label>
							<?php 
								$belt_end = Petro_Lookup::get_array('belt.end');
								echo Form::select(
									'belt_end', 
									Input::post('belt_end', isset($docmk) ? $belt_end[$docmk->belt_end] : ''), 
									$belt_end,
									array('id' => 'form1_belt_end')
								); 
							?>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</tbody>
	</table>
	<table border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
			<td style="width:50%">
				<div class="panel">
					<h3>Quantity and Price</h3>
					<div class="panel_contents">
						<div class="horz-inputs">
							<label for="belt_qty">Quantity:</label>
							<?php echo Form::input('belt_qty', Input::post('belt_qty', isset($docmk) ? $docmk->belt_qty : ''), array('id' => 'form1_belt_qty')); ?>
						</div>
						<div class="horz-inputs">
							<label for="belt_price">Base&nbsp;Unit&nbsp;Price:</label>
							<?php echo Form::input('belt_price', Input::post('belt_price', isset($docmk) ? $docmk->belt_price : ''), array('id' => 'form1_belt_price')); ?>
						</div>
						<div class="horz-inputs">
							<label for="belt_price_net">Discounted&nbsp;Unit&nbsp;Price:</label>
							<?php echo Form::input('belt_price_net', Input::post('belt_price_net', isset($docmk) ? $docmk->belt_price_net : ''), array('id' => 'form1_belt_price_net')); ?>
						</div>
						<div class="horz-inputs">
							<label for="belt_amount">Total&nbsp;Amount:</label>
							<?php echo Form::input('belt_amount', Input::post('belt_amount', isset($docmk) ? $docmk->belt_amount : ''), array('id' => 'form1_belt_amount')); ?>
						</div>
					</div>
				</div>
			</td>
			<td>
				<div class="panel">
					<h3>Discount</h3>
					<div class="panel_contents">
						<div class="horz-inputs">
							<label for="belt_disc1">Discount&nbsp;1:</label>
							<?php echo Form::input('belt_disc1', Input::post('belt_disc1', isset($docmk) ? $docmk->belt_disc1 : ''), array('id' => 'form1_belt_disc1')); ?>
						</div>
						<div class="horz-inputs">
							<label for="belt_disc1">Discount&nbsp;2:</label>
							<?php echo Form::input('belt_disc2', Input::post('belt_disc2', isset($docmk) ? $docmk->belt_disc2 : ''), array('id' => 'form1_belt_disc2')); ?>
						</div>
						<div class="horz-inputs">
							<label for="belt_disc1">Discount&nbsp;3:</label>
							<?php echo Form::input('belt_disc3', Input::post('belt_disc3', isset($docmk) ? $docmk->belt_disc3 : ''), array('id' => 'form1_belt_disc3')); ?>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</tbody>
	</table>
	<div class="panel">
		<h3>Remark / Special Instructions</h3>
		<div class="panel_contents">
			<div class="horz-inputs-wide">
				<label for="remark">Remark:</label>
				<?php echo Form::textarea('remark', Input::post('remark', isset($docmk) ? $docmk->remark : ''), array('id' => 'form1_remark')); ?>
			</div>
			<div class="horz-inputs-wide">
				<label for="status">Status:</label>
				<?php echo Form::input('status', Input::post('status', isset($docmk) ? $docmk->status : ''), array('id' => 'form1_status')); ?>
			</div>
		</div>
	</div>

	<fieldset class="buttons">
		<ol>
			<li class="commit">
				<?php echo Form::submit(); ?>
			</li>
			<li class="cancel">
				<?php echo Html::anchor('docmk', 'Cancel'); ?>
			</li>
		</ol>
	</fieldset>

<?php echo Form::close(); ?>