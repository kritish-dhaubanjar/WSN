function load(page, sort){
	/*productCategory*/
	var cat = document.getElementsByClassName('breadcrumb-item')[1].innerHTML;

	if(window.XMLHttpRequest)
		xmlhttp = new XMLHttpRequest();
	else
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById('products').innerHTML = "";
			document.getElementById('products').innerHTML = xmlhttp.responseText;  
		}
	}
		xmlhttp.open('GET','load.php?cat='+cat+'&filter=off&page='+page+'&sort='+sort, true);
	xmlhttp.send();	
}


function filterfxn(page,sm,md,lg,a,b,c,taupe,beige,white,sort){
	/*productCategory*/
	var cat = document.getElementsByClassName('breadcrumb-item')[1].innerHTML;

	if((sm==0 || sm==null) && (md==0 || md==null) && (lg==0 || lg==null)
	 && (a==false || a==null) && (b==false || b==null) && (c==false || c==null) && (beige==false || beige==null) && 
	 	(taupe==false || taupe==null) && (white==false || white==null)){
		load(1,sort);
	}else{
		if(window.XMLHttpRequest)
			xmlhttp = new XMLHttpRequest();
		else
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById('products').innerHTML = "";
				document.getElementById('products').innerHTML = xmlhttp.responseText;  
			}
		}
		// console.log(sm,md,lg,a,b,taupe,beige,white);

		xmlhttp.open('GET','load.php?cat='+cat+'&filter=on&page='+page+'&sm='+sm+'&md='+md+'&lg='+lg+'&a='+a+'&b='+b+'&c='+c+'&taupe='+taupe+'&beige='+beige+'&white='+white+'&sort='+sort, true);
		xmlhttp.send();	
	}
}

