class products{
	
	constructor(){
		this.actualPage = 0;
		this.actualPage = 0;
	}

	getNextPage(){
		this.getPage(this.actualPage + 1);
	}

	getPrevPage(){
		this.getPage(this.actualPage - 1);
	}

	getPage(page){

		let start_loading_fun = this.startLoading;
		let stop_loading_fun = this.stopLoading;
		let get_prod_fun = this.getProdHtml;

		if(page >= 0 && page < 3){

			this.actualPage = page;
			$.ajax({
				url: "index.php?rest=product/product/getProdPage&page=" + page,
				dataType: "json",
				beforeSend: function(){
					start_loading_fun();
				},
				success: function(prods){
					
					$("div#prods_container").promise().done(function(){
						var prods_html = "";
		
						var i = 0;
						while(prods[i]){
							prods_html = prods_html + get_prod_fun(prods[i]);
							i++;
						}
		
						$("div#prods_container").prop("innerHTML",prods_html);
					});
				},
				complete: function(){
					stop_loading_fun();
				},
				error: function(xhr, ajaxOptions, thrownError){
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}

	getProdHtml(prod){
		
		var prod_html = `
		<div class='col s6' >	
			<div id="${prod.product_id}" class='card small'>
				<div class="card-image">
					<img src='site/view/www/${prod.image}' />
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

	showProdInfo(prod_id){
		
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
		prod_modal.open();

		//Prod info
		$.ajax({
			url: "index.php?rest=product/product/getProdInfo&prod_id=" + prod_id,
			dataType: "json",
			success: function(prod_data){

				let prod_img = `
				<div class="row">
					<div class="col s6">
						<img class="responsive-img"  src="site/view/www/${prod_data.image}" >
					</div>
				</div>`;
				
				let prod_description = `
				<div class="row">
					<div class="col s6">
						<div class="prod_description">${prod_data.description}</div>
						</div>
				</div>`;

				let prod_html = `${prod_img} <br> ${prod_description}`;
				
				modal_content.html(prod_html);
			},
			error: function(){
				alert("something happend!");
			}
		});

	}

	startLoading(){
		$("div#prods_container").children().fadeOut();
	}

	stopLoading(){
		$("div#prods_container").children().fadeIn();
	}
}