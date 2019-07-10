$("body").on("click", "div#nextPage i", () => {
  product.getNextPage();
});

$("body").on("click", "div#prevPage i", () => {
  product.getPrevPage();
});

$("body").on("click", "a[name='prod_info']", () => {
  const prodId = $(this).parent().parent().prop("id");
  product.showProdInfo(prodId);
});

$(document).ready(() => {

  window.product = new products();
  product.getPage(0);

  M.AutoInit();
  const elems = document.querySelectorAll("#prod_modal");
  const instances = M.Modal.init(elems, {});

  window.prod_modal = instances[0];
});
