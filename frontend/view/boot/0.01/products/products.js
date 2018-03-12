var products = (function(){

	var actualPage = 0;

	function getNextPage(){
		actualPage += 1;
		this.getPage(actualPage);
	}

	function getPrevPage(){
		actualPage -= 1;
		this.getPage(actualPage);
	}

	function getPage(page){

		$.ajax({
			url: "index.php?rest=api/product/getProdPage&page=" + page,
			dataType: "json",
			beforeSend: function(){
				products.startLoading();
			},
			success: function(prods){
				
				$("div#prods_container").promise().done(function(){
					var prods_html = "";
	
					var i = 0;
					while(prods[i]){
						prods_html = prods_html + products.getProdHtml(prods[i]);
						i++;
					}
	
					$("div#prods_container").prop("innerHTML",prods_html);
				});
			},
			complete: function(){
				products.stopLoading();
			},
			error: function(){
				alert("something happend!");
			}
		});

	}

	function getProdHtml(prod){
		
		var prod_html = `
		<div class='col s6' >	
			<div class='card small'>
				<div class="card-image">
					<img src='frontend/view/images/data/${prod.image}' />
					<span class="card-title black-text">${prod.title}</span>
				</div>
				<div class="card-content">
					<p>${prod.description}</p>
				</div>
				<div class="card-action">
					<a href="#">More</a>
				</div>
			</div>
		</div>`

		return prod_html;
	}

	function startLoading(){
		$("div#prods_container").children().fadeOut();
	}

	function stopLoading(){
		$("div#prods_container").children().fadeIn();
	}

	return {
		getNextPage,
		getPrevPage,
		getPage,
		startLoading,
		stopLoading,
		getProdHtml
	};

})();

products.getPage(0);

$("body").on("click", "div#nextPage i", function(){
	products.getNextPage();
});

$("body").on("click", "div#prevPage i", function(){
	products.getPrevPage();
});