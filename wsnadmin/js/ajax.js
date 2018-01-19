$( "#out_of_stock" ).click(function() {
  $( "#loadstatus" ).load( "loadstatus.php?current=out_of_stock" );
});

$( "#list_products" ).click(function() {
  $( "#loadstatus" ).load( "loadstatus.php?current=list_products" );
});

$( "#new_orders" ).click(function() {
  $( "#loadstatus" ).load( "loadstatus.php?current=new_orders" );
});

$( "#delivered_orders" ).click(function() {
  $( "#loadstatus" ).load( "loadstatus.php?current=delivered_orders" );
});

$(document).ready(function(){
	$( "#loadstatus" ).load( "loadstatus.php?current=new_orders" );
});




$(document).ajaxComplete(function() {

	$(".order_info").click(function () {
	    var href = $(this).attr("href");
	    $("#loadinfo").load(href);
	    return false;
	});
	
   $('#dataTable').DataTable();
});

$