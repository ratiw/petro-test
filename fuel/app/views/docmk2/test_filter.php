<form class="form-vertical" id="q_search">
	<div class="control-group">
		<label class="control-label" for="q_title_contains">Search Title</label>
		<div class="controls">
			<input id="q_title_contains" name="q[title_contains]" type="text">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="q_price">Price</label>
		<div class="controls">
			<select onchange="document.getElementById('price_numeric').name = 'q[' + this.value + ']';">
				<option value="price_eq" selected="selected">Equal To</option>
				<option value="price_gt">Greater Than</option>
				<option value="price_lt">Less Than</option>
			</select>
			<span>&nbsp;</span>
			<input id="price_numeric" name="q[price_eq]" size="10" type="text">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="q_available_on_gte">Available on</label>
		<div class="controls">
			<input class="datepicker span1" id="q_available_on_gte" max="10" name="q[available_on_gte]" size="12" type="text">
			<span class="seperator">-</span>
			<input class="datepicker span1" id="q_available_on_lte" max="10" name="q[available_on_lte]" size="12" type="text">
		</div>
	</div>
	<div class="buttons" style="padding-top:10px">
		<button class="btn btn-primary" id="q_submit" name="commit" type="submit">Filter</button>
		<button class="btn" type="reset">Clear Filters</button>
	</div>
</form>
