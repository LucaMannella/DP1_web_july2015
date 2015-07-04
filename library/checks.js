/** This file is responsible for managing client-side controls. **/

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

function checkAvailability(code){
	var form = document.getElementById("activity"+code);
	var childs = parseInt( form[1].value );
	var availability = parseInt( document.getElementById("av"+code).innerHTML );

	//DEBUG console.log(availability);	console.log(form[1].value);
	if((childs+1) <= availability)
		return true;
	else {
		window.alert("There are not so many places to reserve! Please reduce the number of children!");
		return false;
	}
}

function checkConferenceValues() {
    var name = document.getElementById("Name").value;
    var participants = document.getElementById("Participants").value;
    if( (name==="")||(participants==="")) {
        window.alert("You miss a field! Please fill it before send your request!");
        return false;
    }
    if( (participants<1)||(participants>100)) {
        window.alert("The number of participants must be between 1 and 100!");
        return false;
    }
    var sHour = document.getElementById("StartHour").value;
    var sMinute = document.getElementById("StartsMinute").value;
    if( (sHour<0)||(sHour>23)||(sMinute<0)||(sMinute>59) ){
        window.alert("The starting time values are incorrect! Please check it!\nHour[0-23]\nMinutes[0-59]");
        return false;
    }
    var eHour = document.getElementById("EndHour").value;
    var eMinute = document.getElementById("EndMinute").value;
    if( (eHour<0)||(eHour>23)||(eMinute<0)||(eMinute>59) ){
        window.alert("The ending time values are incorrect! Please check it!\nHour[0-23]\nMinutes[0-59]");
        return false;
    }
    if(sHour > eHour) {
        window.alert("The ending hour must be greater or equal of the starting hour!");
        return false;
    }
    else if(sHour == eHour) {
        if(sMinute >= eMinute) {
            window.alert("The ending minute must be greater or equal of the starting minute!");
            return false;
        }
    }

    return true;
}