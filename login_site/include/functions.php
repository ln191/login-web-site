<?php
# encodes input to prevent xss attacks
function encoding($value) {
	
	#so, < = &lt;  , >&gt; etc this make so it will be print to the screen 
	# but not execute as part of the html page
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function signUpRuleChecker($usr,$pwd){
	#Checks that the username has more than 1 character and password more than 9.
	if(strlen($pwd) >= 10 and strlen($usr) > 1){
		#Check that the password contains letters and digits
		if( preg_match( '~[a-z]~', $pwd) &&
			preg_match( '~\d~', $pwd)){
			#Checks that the username and password is not the same
			if($pwd !== $usr){
				return true;
			}
			else{
				echo 'Your username and password is not allowed to be the same!';
				return false;
			}
		}
		else{
			echo 'Your password must contain at least one letter and one digit';
			return false;
		}
	}
	else{
		echo 'Your Username must contain more than 1 character and password more than 9.';
		return false;
	}	
}

