window.onload = function(){
	var pagination = document.getElementById('pageNo');
	var list = pagination.getElementsByTagName('li');

	var prev = list[0];
	var next = list[list.length - 1];
	var final = list[list.length - 2];

	var lastPage = Number(final.innerText);
	var prevLink = prev.getElementsByTagName('a')[0];
	var nextLink = next.getElementsByTagName('a')[0];
	var active = (Number(prevLink.id[prevLink.id.length-1])+1);

	list[active].className = 'active page-item';
}
