// A username can contain letters (both upper and lower case) and digits only
var pattern_name = "^[a-zA-Z0-9_.-]*$";
// A password must be at least 6 characters long (characters are to be letters and digits only), have at least one letter and at least one digit.
// credit to christian klemp: https://regex101.com/library/fX8dY0
var pattern_pw = "^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$";

var regExp_name = new RegExp(pattern_name,"");
var regExp_pw = new RegExp(pattern_pw,"");

function validateName(){
	var input = document.getElementById("username").value;
	var text = document.getElementById("username");

	
	if(regExp_name.test(input) === false){
		text.className="error_name";
	} 
	else{
		text.className="";
	}
	
}

function validatePW(){
	var input = document.getElementById("password").value;
	var text = document.getElementById("password");

	
	if(regExp_name.test(input) === false){
		text.className="error_name";
	} 
	else{
		text.className="";
	}
	
}

