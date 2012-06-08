			<div class="row-fluid">
				<div class="span7">
				<?php 
					$prod_type = Petro_Lookup::get_array('product.type');
					echo Petro_Form::select(
							'product_type', Input::post('product_type', isset($docmk) ? $docmk->product_type : ''),
							$prod_type,
							array(
								'id' => 'form1_product_type',
							), __('product_type'), $errors);
					
					$belt_type = Petro_Lookup::get_array('belt.type');
					echo Petro_Form::select(
							'belt_type', Input::post('belt_type',	isset($docmk) ? $docmk->belt_type : ''),
							$belt_type,
							array(
								'id' => 'form1_belt_type', 
							), __('belt_type'), $errors);
				?>
					<div class="control-group<?php echo isset($errors['belt_color']) ? ' error' : ''; ?>">
						<?php 
							$belt_color = Petro_Lookup::get_array('belt.color');
							$checked = Input::post('belt_color', (isset($docmk) and !empty($docmk->belt_color)) ? $docmk->belt_color : '0');
							// echo Petro::render_radio_group('belt_color', 'Belt Color:', $belt_color, '');
						?><label class="control-label" for="belt_color_radio"><?php echo __('belt_color'); ?><?php echo Petro::render_errors($errors, 'belt_color'); ?></label>
						<div class="controls">
							<label class="radio" for="belt_color_1">
								<input type="radio" name="belt_color" id="belt_color_1" value="1" <?php echo $checked=='1' ? 'checked' : ''; ?>/>
								ดำ
							</label>
							<label class="radio" for="belt_color_2">
								<input type="radio" name="belt_color" id="belt_color_2" value="2" <?php echo $checked=='2' ? 'checked' : ''; ?>/>
								ขาว
							</label>
							<label class="radio" for="belt_color_3">
								<input type="radio" name="belt_color" id="belt_color_3" value="3" <?php echo $checked=='3' ? 'checked' : ''; ?>/>
								อื่นๆ (ระบุ)  <input type="text" class="span2" name="belt_color_other" id="belt_color_other" value="" />
							</label>
							<?php echo isset($errors['belt_color']) ? '<span class="help-inline">'.$errors['belt_color'].'</span>' : ''; ?>
						</div>
					</div>
					<div class="control-group<?php echo isset($errors['belt_width']) ? ' error' : ''; ?>">
						<label class="control-label" for="belt_width"><?php echo __('belt_width'); ?><?php echo Petro::render_errors($errors, 'belt_width');; ?></label>
						<div class="controls">
							<?php 
								echo Form::input('belt_width', 
									Input::post('belt_width', isset($docmk) ? $docmk->belt_width : ''), 
									array(
										'id' => 'form1_belt_width', 
										'class' => 'span2'.(isset($errors['belt_width']) ? ' error' : ''),
									)
								);
							?>
							<?php 
								$belt_wunit = Petro_Lookup::get_array('belt.w.unit');
								echo Form::select(
									'belt_width_unit', 
									Input::post('belt_width_unit', isset($docmk) ? $docmk->belt_width_unit : ''), 
									$belt_wunit,
									array('id' => 'form1_belt_width_unit', 'class' => 'span1')
								); 
							?>
						</div>
					</div>
					<?php 
						echo Petro_Form::input('belt_ply', Input::post('belt_ply', isset($docmk) ? $docmk->belt_ply : ''), array('id' => 'form1_belt_ply', 'class' => 'span2'), __('belt_ply'), $errors); 
						
						$belt_ep = Petro_Lookup::get_array('belt.ep');
						echo Petro_Form::select(
									'belt_ep', 
									Input::post('belt_ep', isset($docmk) ? $docmk->belt_ep : ''), 
									$belt_ep,
									array(
										'id' => 'form1_belt_ep',
									), __('belt_ep'), $errors);
					?>
				</div>
				<div class="span5">
					<h3><?php echo __('belt_grade_head'); ?></h3>
					<?php
						$belt_grade = Petro_Lookup::get_array('belt.grade');
						echo Petro_Form::select(
									'belt_grade', 
									Input::post('belt_grade', isset($docmk) ? $docmk->belt_grade : ''), 
									$belt_grade,
									array(
										'id' => 'form1_belt_grade',
										'class' => 'span2',
									), __('belt_grade'), $errors);
									
						echo Petro_Form::input('belt_top_grade',
									Input::post('belt_top_grade', isset($docmk) ? $docmk->belt_top_grade : ''), 
									array(
										'id' => 'form1_belt_top_grade',
										'class' => 'span2',
									), __('belt_top_grade'), $errors); 
						
						echo Petro_Form::input('belt_bot_grade',
									Input::post('belt_bot_grade', isset($docmk) ? $docmk->belt_bot_grade : ''), 
									array(
										'id' => 'form1_belt_bot_grade',
										'class' => 'span2',
									), __('belt_bot_grade'), $errors);
					?>
					<h3><?php echo __('belt_thick_head'); ?></h3>
					<?php 
						echo Petro_Form::input('belt_thick', Input::post('belt_thick', isset($docmk) ? $docmk->belt_thick : ''), array('id' => 'form1_belt_thick', 'class' => 'span2'), __('belt_thick'), $errors); 
						echo Petro_Form::input('belt_top_thick', Input::post('belt_top_thick', isset($docmk) ? $docmk->belt_top_thick: ''), array('id' => 'form1_belt_top_thick', 'class' => 'span2'), __('belt_top_thick'), $errors);
						echo Petro_Form::input('belt_bot_thick', Input::post('belt_bot_thick', isset($docmk) ? $docmk->belt_bot_thick: ''), array('id' => 'form1_belt_bot_thick', 'class' => 'span2'), __('belt_bot_thick'), $errors);
					?>
				</div>
			</div><!--/row-->
			<div class="row-fluid">
				<div class="span12">
					<div class="control-group form-inline<?php echo isset($errors['belt_length']) ? ' error' : ''; ?>">
						<label class="control-label">
							<?php echo __('belt_length'); ?><?php echo Petro::render_errors($errors, 'belt_length'); ?>
						</label>
						<div class="controls">
							<?php 
								echo Form::input('belt_length', 
									Input::post('belt_length', isset($docmk) ? $docmk->belt_length : ''), 
									array(
										'id' => 'form1_belt_length', 
										'class' => 'span2'.(isset($errors['belt_length']) ? ' error' : ''),
									)
								); 
							?>
							<?php 
								$belt_lunit = Petro_Lookup::get_array('belt.l.unit');
								echo Form::select(
									'belt_length_unit', 
									Input::post('belt_length_unit', isset($docmk) ? $docmk->belt_length_unit : ''), 
									$belt_lunit,
									array(
										'id' => 'form1_belt_length_unit',
										'class' => 'span2',
									)
								);
							?>
							<label style="width:150px;text-align:right" for="belt_end"><?php echo __('belt_end'); ?>&nbsp;</label>
							<?php 
								$belt_end = Petro_Lookup::get_array('belt.end');
								echo Form::select(
									'belt_end', 
									Input::post('belt_end', isset($docmk) ? $docmk->belt_end : ''), 
									$belt_end,
									array(
										'id' => 'form1_belt_end',
										'class' => ''.(isset($errors['belt_end']) ? 'error' : ''),
									)
								); 
							?>
						</div>
					</div>
				</div>
			</div><!--/row-->
