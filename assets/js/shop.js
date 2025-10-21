// ================== 🛍 SHOP PAGE SCRIPT ==================
document.addEventListener("DOMContentLoaded", () => {
  const grid = document.getElementById("products-grid");
  const sortSelect = document.getElementById("product-sort");
  const loadMoreBtn = document.getElementById("load-more-btn");

  let currentPage = 1;

  // ================== ⚙️ HÀM LOAD SẢN PHẨM ==================
  function loadProducts(params = {}, append = false) {
    // 🧩 URL chính xác theo MVC
    const url = new URL(BASE_URL + "index.php?url=site/shop/ajaxProducts");
    Object.entries(params).forEach(([k, v]) => url.searchParams.append(k, v));

    console.log("[SHOP] Fetching:", url.toString());

    fetch(url)
      .then(async (res) => {
        const text = await res.text();
        try {
          const data = JSON.parse(text);
          console.log("[SHOP] Response JSON:", data);

          if (data.success) {
            if (append) {
              grid.insertAdjacentHTML("beforeend", data.html);
            } else {
              grid.innerHTML = data.html;
            }

            // ✅ Kiểm tra phân trang
            if (data.pagination.page >= data.pagination.totalPages) {
              loadMoreBtn?.setAttribute("disabled", true);
              loadMoreBtn.textContent = "Hết sản phẩm";
            } else {
              loadMoreBtn.dataset.page = data.pagination.page + 1;
              loadMoreBtn.removeAttribute("disabled");
              loadMoreBtn.textContent = "Xem thêm sản phẩm";
            }
          } else {
            console.error("[SHOP] API success=false:", data);
            alert("Không thể tải sản phẩm. Vui lòng thử lại.");
          }
        } catch (err) {
          console.error("[SHOP] ❌ JSON parse error:", err, text);
          alert("Lỗi dữ liệu từ server (xem console để biết thêm).");
        }
      })
      .catch((err) => {
        console.error("[SHOP] ❌ AJAX error:", err);
        alert("Lỗi khi tải sản phẩm. Kiểm tra kết nối hoặc console log.");
      });
  }

  // ================== 🧭 XỬ LÝ SORT ==================
  sortSelect?.addEventListener("change", () => {
    currentPage = 1;
    loadProducts({ sort: sortSelect.value, page: 1 }, false);
  });

  // ================== ♻️ XỬ LÝ NÚT "XEM THÊM" ==================
  loadMoreBtn?.addEventListener("click", () => {
    const nextPage = parseInt(loadMoreBtn.dataset.page || "2", 10);
    console.log("[SHOP] Load more: page", nextPage);
    loadProducts({ sort: sortSelect?.value || "", page: nextPage }, true);
  });

  // ================== 🚀 KHỞI TẠO TRANG ==================
  console.log("[SHOP] Page initialized.");
  loadMoreBtn?.setAttribute("data-page", "2");
});
