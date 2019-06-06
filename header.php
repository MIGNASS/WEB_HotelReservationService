<?php
echo "<em><font size=\"1px\">This assignment was edited and runned successively with Xampp since phpStorm always gave 502 error</font></em><br>";
session_start();
if(isset($_POST['username'])){
	$name = $_POST['username'];
	$_SESSION["user"]=$name;
}
echo "[SESSION CONSOLE] ";
print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <!-- <meta http-equiv="refresh" content="1" charset="utf-8">  -->
    <meta charset="utf-8">
    <title>A4Q3</title>
    <style>
		body{background-color: #FFF0F5;
		}
		.fieldset_one{background-color: #ffb3ff;border-color: #6600ff;
		}
		.fieldset_two{background-color:  #FAEBD7;border-color: #009900;
		}
		.legend_one{font-size:X-large;color: #6600ff;
		}
		.legend_two{font-size:X-large;color:#009900;
		}
		.one{color:#a366ff;
		}
		.two{color:#00cc00;
		}
		.error_name {
		   	color:red; 
		   	background-color: yellow;
	   }
	   div.aaa {
		  position: absolute;
		  top: 0px;
		  right: 0px;
		  padding: 10px;
		  text-align: right;
		}
	</style>

	<script type="text/javascript" src="login.js"></script>
	
</head>

<!-- HEADER -->
<body>
	<table border="0">
 		<tr>
 			<td rowspan="2">

				<!-- Header image clicked: goes back to home page (a4q3.php) -->
				<?php
				echo "<div onclick='window.location=\"a4q3.php\"'>
						<a>
 						<img alt=\"Hotel Image\" src=\"image_hotel.jpg\" height=\"200px\" width=\"300px\"/></a>
	 					</div>";
	 			?>
 			</td>
 			<td height="60" style="font-size: 30px;">
 				<strong>Hotel reservation service</strong></td>
 		</tr>
 		<tr>
 			<td>
 				<p align="center" id="time"></p>
 				<script>
 					// Credit to Deniel Lee for auto-refresh time in java script: https://stackoverflow.com/questions/10211145/getting-current-date-and-time-in-javascript
					var myVar = setInterval(myTimer, 1000);
					function myTimer() {
					  var d = new Date();
					  document.getElementById("time").innerHTML = d.toLocaleString();
					}
				</script>
			</td>
 		</tr>
 	</table>

	<form method="post" action="login.php">
		<div class="aaa">
			<table>
				<tr>
					<!-- PHP: the buttom will be disable if session existed -->
					<input type="submit" value="Login" 
					<?php if (isset($_SESSION["user"])){ ?> disabled <?php   } ?>
					/>
				</tr>
				<tr>
					<p id="login_name">Welcome
					<!-- PHP: if session exsisted display name of user -->
					<?php 
					//session_start();
					if(isset($_SESSION["user"])){
						echo $_SESSION["user"];
					} 
					?>

					</p>
				</tr>
				</form>
				<tr>
					<!-- PHP: display logout buttom if session exsited -->
					<form method="post" action="logout.php">
					<?php 
					if(isset($_SESSION["user"])){
						echo "<input type=\"submit\" value=\"Logout\" />";
					}
					?>
					</form>
				</tr>
			</table>
		</div>

		
	<hr />
<!-- Rest of <body> -->