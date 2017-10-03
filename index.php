<div id="searh_form" class="row">
			<h2 class="text-center">Advanced Search: </h2>
			
			<div class="search">
						<input type="text" name="recipe_name" id="recipe_name" placeholder="Search by Recipe Name...">
						
						<select id="calories" name="calories">
							    <option selected="true" disabled="disabled">Calories</option>
									<option value="0-200">200 or less</option>
									<option value="201-400">201 to 400</option>
									<option value="401-600">401 to 600</option>
									<option value="601-10000">600 and more</option>
						</select>
						
						<select id="price_range" name="price_range">
						     	<option selected="true" disabled="disabled">Price Range</option>
									<?php 
											$terms = get_terms('price_range', array(
												 'hide_empty' => false,
											) );
											foreach($terms as $term) {
														echo '<option value="'. $term->slug . '">' . $term->name . '</option>';
											}
									?>
						</select>
						
						<select id="course" name="course">
									<option selected="true" disabled="disabled">Course</option>
									<?php 
											$terms = get_terms('course', array(
												 'hide_empty' => false,
											) );
											foreach($terms as $term) {
														echo '<option value="'. $term->slug . '">' . $term->name . '</option>';
											}
									?>
						</select>
						
						<button id="search_btn" type="button" class="button">Search</button> 
			</div>
			<div id="results_found">
				
			</div>
			<div id="result" class="row">
				
			</div>

</div>