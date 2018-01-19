itemNum = Number(document.getElementById('cartNum').innerHTML);
// console.log(itemNum);
$('#addtocart').on('click touchstart',function(){ 
		var url = document.getElementById('addtocart').name;
		
		if(window.XMLHttpRequest)
			xmlhttp = new XMLHttpRequest();
		else
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById('cartNum').innerHTML = xmlhttp.responseText;  
			}
		}
		xmlhttp.open('GET',url, true);
		xmlhttp.send();		

		$('.cart-success').show();
	return false; });

$('#openCart').on('click touchstart',function(){ 
		if(window.XMLHttpRequest)
			xmlhttp = new XMLHttpRequest();
		else
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById('cartList').innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open('GET', 'cart/viewCart.php' , true);
		xmlhttp.send();	
});

