class product {
  constructor() {
    this.actualPage = 0;
    this.actualPage = 0;
  }

  getNextPage() {
    this.getPage(this.actualPage + 1);
  }

  getPrevPage() {
    this.getPage(this.actualPage - 1);
  }

  getPage(page) {
    const startLoadingFun = this.startLoading;
    const stopLoadingFun = this.stopLoading;
    const getProdFun = this.getProdHtml;

    if (page >= 0 && page < 3) {
      this.actualPage = page;
      $.ajax({
        url: `index.php?rest=product/product/getProdPage&page=${page}`,
        dataType: "json",
        beforeSend: () => {
          startLoadingFun();
        },
        success: (prods) => {
          $("div#prods_container").promise().done(() => {
            let prodsHtml = "";
            let i = 0;

            while (prods[i]) {
              prodsHtml += getProdFun(prods[i]);
              i += 1;
            }

            $("div#prods_container").prop("innerHTML", prodsHtml);
          });
        },
        complete: () => {
          stopLoadingFun();
        },
        error: (xhr, ajaxOptions, thrownError) => {
          alert(`${thrownError}\r\n${xhr.statusText}\r\n${xhr.responseText}`);
        },
      });
    }
  }

  getProdHtml(prod) {
    const prodHtml = `
    <div class='col s6' >
      <div id="${prod.id}" class='card small'>
        <div class="card-image">
          <img src='src/view/www/src/images/${prod.image}' />
          <span class="card-title black-text">${prod.title}</span>
        </div>
        <div class="card-content">
          <p>${prod.title}</p>
        </div>
        <div class="card-action">
          <a name="prod_info" class="waves-effect waves-green btn-flat">More</a>
        </div>
      </div>
    </div>`;

    return prodHtml;
  }

  showProdInfo(prodId) {
    // Loading
    const modalContent = $("div#prod_modal div.modal-content");
    const htmlSpinner = `
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
    modalContent.html(htmlSpinner);

    // Open
    window.prod_modal.open();

    // Prod info
    $.ajax({
      url: `index.php?rest=product/product/getProdInfo&prod_id=${prodId}`,
      dataType: "json",
      success: (prodData) => {
        const prodImg = `
        <div class="row">
          <div class="col s6">
            <img class="responsive-img"  src="src/view/www/src/images/${prodData.image}" >
          </div>
        </div>`;

        const prodDescription = `
        <div class="row">
          <div class="col s6">
            <div class="prod_description">${prodData.description}</div>
            </div>
        </div>`;

        const prodHtml = `${prodImg} <br> ${prodDescription}`;
        modalContent.html(prodHtml);
      },
      error: () => {
        alert("something happend!");
      },
    });
  }

  startLoading() {
    $("div#prods_container").children().fadeOut();
  }

  stopLoading() {
    $("div#prods_container").children().fadeIn();
  }
}
