var signup = document.forms.signup;
var btn = document.getElementById('signup');

if( signup != undefined)
{
	signup.email.onfocus = function(){
		btn.innerHTML = 'Continue';
	}
	signup.onsubmit = function () {
		if(signup.firstname.value !== '' && signup.lastname.value !== '' && 
			signup.email.value !== '' && signup.password.value !== '' 
			&& signup.repassword.value !== '' && signup.address.value !== '' 
			&& signup.city.value !== ''  && signup.contact.value !== ''){	

			var success = checkemail(signup.email.value);

			if(btn.innerHTML ==='Continue'){
				btn.innerHTML = 'Save';
				return false;
			}		

			if(success==false){
				$(".email_error").show();
				return false;
			}

			if(signup.password.value === signup.repassword.value ){
				if(signup.password.value.length<5){
					btn.innerHTML = 'Continue';
					$(".password_error").show();
					return false;
				}
				else if(success == true){
					return true;
				}
			}else{
				btn.innerHTML = 'Continue';
				$(".password_error").show();
				return false;
			}
	}
		else{
			btn.innerHTML = 'Continue';
			$(".field_error").show();
			return false;
		}
	}
}

// function checkemail(email){
// 	if(window.XMLHttpRequest)
// 		xmlhttp = new XMLHttpRequest();
// 	else
// 		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

// 	xmlhttp.onreadystatechange = function(){
// 		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
// 			num_rows = xmlhttp.responseText;
// 			console.log(num_rows);
// 		}
// 	}
// 	xmlhttp.open('GET','checkemail.php?email='+email, true);
// 	xmlhttp.send();	
// }