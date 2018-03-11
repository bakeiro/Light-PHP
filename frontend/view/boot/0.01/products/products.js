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

				$("div#prods_container")[0].innerHTML = "";

				products.stopLoading();

				var i = 0;
				while(prods[i]){

					var prod_html = products.getProdHtml(prods[i]);
					$("div#prods_container").append(prod_html);
					i++;
				}

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
			</div>
		</div>`

		return prod_html;
	}

	function startLoading(){

	}

	function stopLoading(){

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