$("body").on("click", "div#nextPage i", function(){
	product.getNextPage();
});

$("body").on("click", "div#prevPage i", function(){
	product.getPrevPage();
});

$("body").on("click", "a[name='prod_info']", function(){
	var prod_id = $(this).parent().parent().prop("id");
	product.showProdInfo(prod_id);
});

$(document).ready(function(){

	window.product = new products();
	product.getPage(0);

	M.AutoInit();
	var elems = document.querySelectorAll('#prod_modal');
	var instances = M.Modal.init(elems, {});
	
	window.prod_modal = instances[0];
});