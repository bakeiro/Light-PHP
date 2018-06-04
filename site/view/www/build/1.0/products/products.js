var products = (function(){

	var actualPage = 0;

	function getNextPage(){
		this.getPage(actualPage + 1);
	}

	function getPrevPage(){
		this.getPage(actualPage - 1);
	}

	function getPage(page){

		if(page >= 0 && page < 3){

			actualPage = page;
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
	}

	function getProdHtml(prod){
		
		var prod_html = `
		<div class='col s6' >	
			<div id="${prod.product_id}" class='card small'>
				<div class="card-image">
					<img src='site/view/www/images/data/${prod.image}' />
					<span class="card-title black-text">${prod.title}</span>
				</div>
				<div class="card-content">
					<p>${prod.short_description}</p>
				</div>
				<div class="card-action">
					<a name="prod_info" class="waves-effect waves-green btn-flat">More</a>
				</div>
			</div>
		</div>`;

		return prod_html;
	}

	function showProdInfo(prod_id){
		
		//Loading
		var modal_content = $("div#prod_modal div.modal-content");
		var html_spinner = `
		<div class="preloader-wrapper active">
			<div class="spinner-layer spinner-red-only">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="gap-patch">
					<div class="circle"></div>
					</div><div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>`;
		modal_content.html(html_spinner);

		//Open
		$("div#prod_modal").modal("open");

		//Prod info
		$.ajax({
			url: "index.php?rest=api/product/getProdInfo&prod_id=" + prod_id,
			dataType: "json",
			success: function(prod_data){

				var prod_img = `<img src="site/view/www/images/data/${prod_data.image}" >`;
				var prod_description = `<div class="prod_description">${prod_data.description}</div>`;

				var prod_html = `<div class="prod_info">${prod_img} <br> ${prod_description}`;

				modal_content.html(prod_html);
			},
			error: function(){
				alert("something happend!");
			}
		});

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
		getProdHtml,
		showProdInfo
	};

})();

products.getPage(0);

$("body").on("click", "div#nextPage i", function(){
	products.getNextPage();
});

$("body").on("click", "div#prevPage i", function(){
	products.getPrevPage();
});

$("body").on("click", "a[name='prod_info']", function(){
	var prod_id = $(this).parent().parent().prop("id");
	products.showProdInfo(prod_id);
});

$(document).ready(function(){
	$("div#prod_modal").modal(); //Init modal
});