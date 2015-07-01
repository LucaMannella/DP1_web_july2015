function checkRegistrationValues(){
	user = document.getElementById("Username").value;
	pwd = document.getElementById("Password").value;
	conf_pwd = document.getElementById("ConfirmPassword");
	if( (user==="")||(pwd==="")||(conf_pwd==="") ) {
		window.alert("You miss a field! Please fill it before send your request!");
		return false;
	}
	else {
		if( checkPassword() )
			return true;
		else {
			window.alert("The password and the confirmation password must match! Please check it!");
			return false;
		}
	}
}
function checkLoginValues(){
	user = document.getElementById("Username").value;
	pwd = document.getElementById("Password").value;
	if( (user==="")||(pwd==="") ) {
		window.alert("You miss a field! Please fill it before send your request!");
		return false;
	}
	else
		return true;
}

function checkPassword() {
	pwd1 = document.getElementById("Password").value;
	pwd2 = document.getElementById("ConfirmPassword").value;
	img = document.getElementById("imgpwd");

	if(pwd1===pwd2) {
		img.setAttribute("src", "./images/right.png");
		toRet=true;
	}
	else {
		img.setAttribute("src", "./images/wrong.png");
		toRet=false;
	}
	img.style.visibility = "visible";
	return toRet;
}