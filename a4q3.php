<!-- This is template php file with header and footer -->
<!-- Header -->
<?php
include("header.php");
?>
<!-- "HOME PAGE" -->
<!-- Bottom clicked: Jump to search result page -->
<form method="post" action="searchResult.php">

	        <fieldset class="fieldset_one">
	            <legend class="legend_one">Reservation Information</legend>
	            <label><strong class="one">Number of Rooms (max 5 people per room)</strong>
	                <input type="text" name="number_of_rooms">
	            </label><br/><br/>
	            <strong class="one">Smoker?</strong>
	            <label><input type="radio" name="smoker" value="yes" checked="checked" />Yes</label>
	            <label><input type="radio" name="smoker" value="no"/>No</label><br/><br/>
	            <label><strong class="one">Check-in: </strong>
	                <input type="date" name="check_in_date"/></label><br/><br/>
	            <label><strong class="one">Check-out: </strong>
	                <input type="date" name="check_out_date"/></label><br/><br/>
            </fieldset>
			<fieldset class="fieldset_two">
				<legend class="legend_two">Room Specification</legend>
				<ul>
					<li>
						<label><strong class="two">Number of single/double beds:</strong></label><br/>
						<label><input type="checkbox" name="number_of_single_or_double_beds[]" value="0/2"/>0/2</label>
						<label><input type="checkbox" name="number_of_single_or_double_beds[]" value="2/0"/>2/0</label>
						<label><input type="checkbox" name="number_of_single_or_double_beds[]" value="1/1"/>1/1</label>
						<label><input type="checkbox" name="number_of_single_or_double_beds[]" value="0/2"/>0/2</label>
						<label><input type="checkbox" name="number_of_single_or_double_beds[]" value="1/2"/>1/2</label><br/><br/>
					</li>
					<li>
						<label><strong class="two">Do you have preferred locations for the hotel?</strong></label><br/>
						<label><input id="downtown" type="checkbox" name="location" value="downtown"/>Downtown</label>
						<label><input type="checkbox" name="location[]" value="montreal_east"/>Montreal East</label>
						<label><input type="checkbox" name="location[]" value="montreal_west"/>Montreal West</label>
						<label><input type="checkbox" name="location[]" value="near_to_the_airport"/>Near to the airport</label>
						<label><input type="checkbox" name="location[]" value="oldport"/>Oldport</label><br/><br/>
					</li>
					<li>
						<label><strong class="two">Price Range/per night:</strong></label><br/>
						<select name="price_per_night">
							<option value="50">Less than $50</option>
							<option value="100">$50~$100</option>
							<option value="1000">$100~1000</option>
							<option value="anything">No price limit</option>
						</select><br/><br/>
					</li>
					<li>
						<label><strong class="two">Number of Private Parkings</strong></label><br/>
						<label><input type="radio" name="number_of_private_parkings" value="0" checked="checked" />0</label><br/>
						<label><input type="radio" name="number_of_private_parkings" value="1"/>1</label><br/>
						<label><input type="radio" name="number_of_private_parkings" value="2"/>2</label><br/>
						<label><input type="radio" name="number_of_private_parkings" value="3"/>3</label><br/>
						<label><input type="radio" name="number_of_private_parkings" value="4"/>4</label><br/><br/>
					</li>
					<li>
						<label><strong class="two">Special Facilities</strong></label><br/>
						<label><input type="checkbox" name="special_facilities[]" value="minibar"/>Minibar</label>
						<label><input type="checkbox" name="special_facilities[]" value="balcony"/>Balcony</label>
					</li>
				</ul>
			</fieldset>
			<br/>Let's see what we can find...
			<p>
				<input type="submit" value="Search" />
				<input type="reset" value="Start Over"/>
			</p>

</form>

<p><font size="1">For marker: search with all default choice will ouput Hotel of Downtown as result </font></p>


<!-- Footer -->
<?php
include("footer.php");
?>