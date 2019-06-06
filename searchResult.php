<!-- This is template php file with header and footer -->
<!-- Header -->
<?php
include("header.php");
?>

<!-- SEARCH RESULT -->

<?php

$file_login = "login.txt";
$file_hotel = "availableHotelRoomsInformation.txt";
echo "<br>";
if(file_exists($file_login) && file_exists($file_hotel)) {
	//echo "Both files exist";
} else {
	echo "IO error";
}

// number of room: text
$nRoom = $_POST['number_of_rooms'];
if($nRoom=="") $nRoom="anything";
// smoker : radio
$ifSmoker = $_POST['smoker'];
// number of bed: checkbox
if(isset($_POST['number_of_single_or_double_beds'])){
	$nBed = $_POST['number_of_single_or_double_beds'];
} else {
	$nBed = "anything";
}
// location: checkbox
if(isset($_POST['location'])){
	$loc = $_POST['location'];
} else {
	$loc = "anything";
}
// price: drop
$pric = $_POST['price_per_night'];
// parking: radio
$park = $_POST['number_of_private_parkings'];
// facilities: checkbox
if(isset($_POST['special_facilities'])){
	$facil = $_POST['special_facilities'];
} else {
	$facil = "anything";
}


echo "<font size=\"1\">You are looking for:";
echo "<br>Number of room: " .$nRoom;
echo "<br>Smoker: " . $ifSmoker;
echo "<br>Number of beds: ";
if($nBed == "anything"){ echo $nBed;
} else {
	if (is_array($_POST['number_of_single_or_double_beds'])) {
	    foreach($_POST['number_of_single_or_double_beds'] as $value){
	      echo $value; echo " ";
	    }
  	} else { 
  		$value = $_POST['number_of_single_or_double_beds']; echo $value;
  	}
}
echo "<br>Location: ";
if($loc == "anything"){ echo $loc;
} else {
	if (is_array($_POST['location'])) {
	    foreach($_POST['location'] as $value){
	      echo $value; echo " ";
	    }
    } else {
   		$value = $_POST['location']; echo $value;
    }
}
echo "<br>Price: " .$pric;
echo "<br>Parking: " .$park;
echo "<br>Facilities: ";
if($facil == "anything"){ echo $facil;
} else {
	if (is_array($_POST['special_facilities'])) {
	    foreach($_POST['special_facilities'] as $value){
	      echo $value; echo " ";
	    }
    } else {
    	$value = $_POST['special_facilities']; echo $value;
    }
}
echo "</font>";
echo "<h1>Result</h1>";


// display search result
if(isset($_SESSION["user"])){
	
} else {
	echo "Hey visitor, according to the disagreesment of the hotels, you must become a member of the site to view detail information about the hotel.";
	echo "<br><input type=\"submit\" value=\"Login\" />";
}	


$nameHotel; 
$addressHotel;
$roomsHotel; //$nRoom
$smokerHotel; //$ifSmoker
$bedHotel; //$nBed
$locHotel; //$loc
$pricHotel; //$pric
$parkHotel; //$park
$facilHotel; //$facil
$booleanMatch = true;
$endOfHotel = false;
$hotelFound = 0;

echo "<div align=\"center\">";
if (file_exists($file_hotel)) {
    //echo "The file <b>$file_hotel</b> exists<br /><br />Content of file with file_get_content function:<br />";
	//$str= file_get_contents("$file_hotel");
	//echo $str;
	//echo "<br /><br />Content of file with file() function <br />";
	$lines = file("$file_hotel");
	foreach ($lines as $line_num => $line) {
    	//echo "Line #<b>{$line_num}</b> : " . $line . "<br />";
    	//echo strpos($line, '@')."<br>";
	    if(strpos($line, '@')===0){
	    	//echo "Hotel detected<br>";
	    	$nameHotel = substr($line, 1);
	    	//echo "#Name of hotel: " . $nameHotel."<br>";
	    }
	    //echo strpos($line, 'address');
	    else if(strpos($line, 'address')===0){
	    	//echo "address detected<br>";
	    	$addressHotel = substr($line, 8);
	    	//echo "#Address of hotel: " . $addressHotel."<br>";
	    }
	    // ROOM
	    else if(strpos($line, 'rooms')===0){
	    	//echo "rooms detected<br>";
	    	$roomsHotel = substr($line, 6);
	    	//echo "#Room of hotel: " . $roomsHotel."<br>";
	    	//echo "%comparing " . $nRoom . " with " . $roomsHotel."<br>";
	    	if($nRoom==="anything"){
	    		//echo ">nRooms is anything, ok<br>";
	    	} else if($nRoom < $roomsHotel) {
	    		//echo ">nRooms is less than, ok<br>";
	    	} else {
	    		//echo ">nRooms unmatched, no<br>";
	    		$booleanMatch = false;
	    	}
	    }
	    // SMOKER
	    else if(strpos($line, 'smoker')===0){
	    	//echo "smoker detected<br>";
	    	$smokerHotel2 = substr($line, 7);
	    	$smokerHotel = trim($smokerHotel2);
	    	//echo "#Smoker ok in hotel? [" . $smokerHotel."]<br>";
	    	//echo "%comparing [" . $ifSmoker . "] with [" . $smokerHotel."]<br>";
	    	//echo var_dump($ifSmoker);
	    	//echo "<br>";
	    	//echo var_dump($smokerHotel);
	    	//echo "<br>";
	    	if(strcmp($ifSmoker, $smokerHotel) == 0){
	    		//echo ">smoker matched, ok<br>";
	    	} else {
	    		//echo ">smoker unmatched, no<br>";
	    		$booleanMatch = false;
	    	}
	    }
	    // BED NUMBER
	    else if(strpos($line, 'bed')===0){
	    	//echo "bed detected<br>";
	    	$bedHotel = substr($line, 4);
	    	//echo "#Bed of hotel? " . $bedHotel."<br>";
	    	//echo "%comparing ";
	    	$bBed = false;
	    	if($nBed == "anything"){ 
	    		//echo $nBed;
			} else {
				if (is_array($_POST['number_of_single_or_double_beds'])) {
				    foreach($_POST['number_of_single_or_double_beds'] as $value){
				      //echo $value; echo " ";
				      if(strpos($bedHotel, $value)===0){
				      	$bBed = true;
				      }
				    }
			  	} else { 
			  		$value = $_POST['number_of_single_or_double_beds']; 
			  		//echo $value;
			  		if(strpos($bedHotel, $value)===0){
				      	$bBed = true;
				    }
			  	}
			}
			//echo " with " . $bedHotel."<br>";
	    	if($nBed==="anything"){
	    		//echo ">nBeds is anything, ok<br>";
	    	} else if($bBed===true){
	    		//echo ">valid, ok<br>";
	    	} else {
	    		//echo ">bed unmatched, no<br>";
	    		$booleanMatch = false;
	    	}
	    }

	    // LOCATION
	    else if(strpos($line, 'location')===0){
	    	//echo "location detected<br>";
	    	$locHotel = substr($line, 9);
	    	//echo "#Location of hotel? " . $locHotel."<br>";

	    	//echo "%comparing ";
	    	$bLoc = false;
	    	if($loc == "anything"){ 
	    		//echo $loc;
			} else {
				if (is_array($_POST['location'])) {
				    foreach($_POST['location'] as $value){
				      //echo $value; echo " ";
				      if(strpos($locHotel, $value)===0){
				      	$bLoc = true;
				      }
				    }
			  	} else { 
			  		$value = $_POST['location']; 
			  		//echo $value;
			  		if(strpos($locHotel, $value)===0){
				      	$bLoc = true;
				    }
			  	}
			}
			//echo " with " . $locHotel."<br>";
	    	if($loc==="anything"){
	    		//echo ">location is anything, ok<br>";
	    	} else if($bLoc===true){
	    		//echo ">valid, ok<br>";
	    	} else {
	    		//echo ">location unmatched, no<br>";
	    		$booleanMatch = false;
	    	}

	    }

	    // PRICE
	    else if(strpos($line, 'price_per_room')===0){
	    	//echo "price_per_room detected<br>";
	    	$pricHotel2 = substr($line, 15);
	    	$pricHotel = trim($pricHotel2);
	    	//echo "#Price per night of hotel? " . $pricHotel."<br>";
	    	//echo "%comparing [" . $pric . "] with [" . $pricHotel."]<br>";
	    	if($pricHotel <= $pric){
	    		//echo ">Price valid, ok<br>";
	    	} else {
	    		//echo ">Price invalid, no<br>";
	    		$booleanMatch = false;
	    	}
	    }
	    // PARKING
	    else if(strpos($line, 'parking')===0){
	    	//echo "parking detected<br>";
	    	$parkHotel2 = substr($line, 8);
	    	$parkHotel = trim($parkHotel2);
	    	//echo "#Parking of hotel? " . $parkHotel."<br>";
	    	//echo "%comparing [" . $park . "] with [" . $parkHotel."]<br>";
	    	if($park<$parkHotel||$park===$parkHotel){
	    		//echo ">Parking valid, ok<br>";
	    	} else {
	    		//echo ">Parking invalid, no<br>";
	    		$booleanMatch = false;
	    	}
	    }

	    // FACILITY $facilHotel; //$facil
	    else if(strpos($line, 'facilities')===0){
	    	//echo "facilities detected<br>";
	    	$facilHotel = substr($line, 11);
	    	//echo "#Parking of hotel? " . $facilHotel."<br>";

	    	//echo "%comparing ";
	    	$bFac = false;
	    	if($facil == "anything"){ 
	    		//echo $facil;
			} else {
				if (is_array($_POST['special_facilities'])) {
				    foreach($_POST['special_facilities'] as $value){
				     // echo $value; echo " ";
				      if(strpos($facilHotel, $value)===0){
				      	$bFac = true;
				      }
				    }
			  	} else { 
			  		$value = $_POST['location']; 
			  		//echo $value;
			  		if(strpos($facilHotel, $value)===0){
				      	$bFac = true;
				    }
			  	}
			}
			//echo " with " . $facilHotel."<br>";
	    	if($facil==="anything"){
	    		//echo ">location is anything, ok<br>";
	    	} else if($bFac===true){
	    		//echo ">valid, ok<br>";
	    	} else {
	    		//echo ">location unmatched, no<br>";
	    		$booleanMatch = false;
	    	}

	    	$endOfHotel = true;
	    }
	    if($booleanMatch===true && $endOfHotel===true){
	    	//echo "<br> This hotel ". $nameHotel ." matched!<br>";
	    	echo "<h3>" . $nameHotel . "</h3>";
	    	echo $addressHotel;
	    	if(isset($_SESSION["user"])){
				echo "Number of room: " . $roomsHotel;
				echo "<br>Is smoker ok? " . $smokerHotel;
				echo "<br>Number of beds " . $bedHotel;
				echo "<br>Location in Montreal: " . $locHotel;
				echo "<br>Price per night: " . $pricHotel;
				echo "<br>Parking of hotel? " . $parkHotel;
				echo "<br>Facilities of hotel: " . $facilHotel."<br>";
			} 
	    	$booleanMatch=true;
	    	$endOfHotel=false;
	    	$hotelFound++;
	    	echo "<br><br>";
	    } else if ($endOfHotel===true){
	    	//echo "<br> Sadly ". $nameHotel ." dont matched<br>";
	    	//echo "<br><br>";
	    	$booleanMatch=true;
	    	$endOfHotel=false;
	    }


	}
	echo "</div>";

if($hotelFound>0){
	echo "We found " .$hotelFound." hotel for you.";
} else {
	echo "Sorry, we cannot find a hotel that suit to your requirement.";
}

}
?>

<!-- Footer -->
<?php
include("footer.php");
?>