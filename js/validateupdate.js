function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function validateForm() {
    var p = document.forms["updateQuestion"]["Name"].value;
    var q = document.forms["updateQuestion"]["Email"].value;
    var r = document.forms["updateQuestion"]["Topic"].value;
    var s = document.forms["updateQuestion"]["Content"].value;
    if (p == null || p == "" ) {
        alert("Name must be filled out");
        return false;
    }
	if (q == null || q == "" ) {
        alert("Email must be filled out");
        return false;
    }
	if(!validateEmail(q)){
		alert("Email format is wrong");
        return false;
	}
	if (r == null || r == "" ) {
        alert("Question Topic must be filled out");
        return false;
    }
	if (s == null || s == "" ) {
        alert("Content must be filled out");
        return false;
    }	
}