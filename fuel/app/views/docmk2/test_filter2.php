<form class="form-vertical form-filter" id="q_search">
	<a class="filter-group-label" data-toggle="collapse" data-target="#filter-group-1">
		First Group
	</a>
	<div id="filter-group-1" class="filter-group collapse in">
		<div class="filter-string">
			<label for="q_title_contains">Search Title</label>
			<input id="q_title_contains" name="q[title_contains]" type="text" />
		</div>
	</div>
	<a class="filter-group-label" data-toggle="collapse" data-target="#filter-group-2">
		Second Group
	</a>
	<div id="filter-group-2" class="filter-group collapse">
		<div class="filter-numeric">
			<label for="q_price">Price</label>
			<select onchange="document.getElementById('price_numeric').name = 'q[' + this.value + ']';">
				<option value="price_eq" selected="selected">Equal To</option>
				<option value="price_gt">Greater Than</option>
				<option value="price_lt">Less Than</option>
			</select>
			<input id="price_numeric" name="q[price_eq]" size="10" type="text">
		</div>
		<div class="filter-date_range">
			<label for="q_available_on_gte">Available on</label>
			<input class="datepicker" id="q_available_on_gte" max="10" name="q[available_on_gte]" size="12" type="text">
			<span class="separator">-</span>
			<input class="datepicker" id="q_available_on_lte" max="10" name="q[available_on_lte]" size="12" type="text">
		</div>
	</div>
	<div class="filter-buttons">
		<button class="btn btn-primary" id="q_submit" name="commit" type="submit">Filter</button>
		<button class="btn" type="reset">Clear Filters</button>
	</div>
</form>
