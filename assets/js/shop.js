document.addEventListener("DOMContentLoaded", () => {
  const grid = document.getElementById("products-grid");
  const sortSelect = document.getElementById("product-sort");
  const loadMoreBtn = document.getElementById("load-more-btn");

  let currentPage = 1;

  function loadProducts(params = {}, append = false) {
    const url = new URL(BASE_URL + "shop/ajaxProducts");
    Object.entries(params).forEach(([k, v]) => url.searchParams.append(k, v));

    fetch(url)
      .then(r => r.json())
      .then(data => {
        if (data.success) {
          if (append) {
            grid.insertAdjacentHTML("beforeend", data.html);
          } else {
            grid.innerHTML = data.html;
          }
          if (data.pagination.page >= data.pagination.totalPages) {
            loadMoreBtn?.setAttribute("disabled", true);
            loadMoreBtn.textContent = "Hết sản phẩm";
          } else {
            loadMoreBtn.dataset.page = data.pagination.page + 1;
          }
        }
      })
      .catch(err => console.error("AJAX error:", err));
  }

  sortSelect?.addEventListener("change", () => {
    currentPage = 1;
    loadProducts({ sort: sortSelect.value, page: 1 }, false);
  });

  loadMoreBtn?.addEventListener("click", () => {
    const next = parseInt(loadMoreBtn.dataset.page);
    loadProducts({ sort: sortSelect.value, page: next }, true);
  });
});
