var num_rows;
function checkemail(email){
	if(window.XMLHttpRequest)
		xmlhttp = new XMLHttpRequest();
	else
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			num_rows = xmlhttp.responseText;
			// console.log(num_rows);
		}
	}
	xmlhttp.open('GET','checkemail.php?email='+email, true);
	xmlhttp.send();	
	if(num_rows == '0'){
		return true;
	}
	else{
		return false;
	}
}

