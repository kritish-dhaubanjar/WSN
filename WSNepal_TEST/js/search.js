function search(term){
	if(window.XMLHttpRequest)
		xmlhttp = new XMLHttpRequest();
	else
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.status == 200 && xmlhttp.readyState == 4){
			// console.log(term);
			document.getElementById('search_refresh').innerHTML = '';
			document.getElementById('search_refresh').innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open('GET', 'search_load.php?term=' + term, true);
	xmlhttp.send();

}