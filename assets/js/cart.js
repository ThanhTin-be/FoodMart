// ====================== assets/js/cart.js ======================
document.addEventListener("DOMContentLoaded", () => {
    console.log("🛒 cart.js loaded, BASE_URL =", BASE_URL);

    // Sự kiện nút "Mua" hoặc "Thêm vào giỏ"
    document.querySelectorAll(".add-to-cart, .btn-buy").forEach(btn => {
        btn.addEventListener("click", async () => {
            const productId = btn.dataset.id;
            console.log("👉 Click add-to-cart:", productId);

            try {
                const url = `${BASE_URL}cart/add/${productId}?ajax=1`;
                console.log("🌍 Fetching:", url);

                const response = await fetch(url, {
                    headers: { "X-Requested-With": "XMLHttpRequest" }
                });

                if (!response.ok) throw new Error(`HTTP error ${response.status}`);

                const data = await response.json();
                console.log("✅ Server response:", data);

                if (data.success) {
                    updateMiniCart(data);
                } else {
                    console.warn("⚠️ Server trả về lỗi:", data);
                }
            } catch (err) {
                console.error("❌ Fetch add-to-cart error:", err);
            }
        });
    });

    // Lắng nghe cộng/trừ trong mini cart (uỷ quyền sự kiện)
    document.body.addEventListener("click", async e => {
        if (e.target.classList.contains("cart-plus") || e.target.classList.contains("cart-minus")) {
            const id = e.target.dataset.id;
            const input = document.querySelector(`.cart-qty-input[data-id='${id}']`);
            let qty = parseInt(input.value);

            if (e.target.classList.contains("cart-plus")) qty++;
            else if (e.target.classList.contains("cart-minus")) qty--;

            if (qty <= 0) {
                if (!confirm("🗑 Bạn có muốn xoá sản phẩm này khỏi giỏ hàng không?")) return;
                qty = 0;
            }

            try {
                const url = `${BASE_URL}cart/update/${id}?qty=${qty}&ajax=1`;
                console.log("♻️ Updating:", url);

                const response = await fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } });
                if (!response.ok) throw new Error(`HTTP ${response.status}`);

                const data = await response.json();
                console.log("🔄 Server update response:", data);

                if (data.success) {
                    updateMiniCart(data);
                }
            } catch (err) {
                console.error("❌ Update error:", err);
            }
        }
    });
});

/**
 * Cập nhật MiniCart trong header + Offcanvas
 */
// Helper format tiền
function formatCurrency(n) {
    return new Intl.NumberFormat("vi-VN").format(n) + " đ";
}

function updateMiniCart(data) {
    try {
        console.log("🔄 updateMiniCart (patch mode):", data);

        // 1) Cập nhật các badge đếm item (nhiều nơi)
        document.querySelectorAll(".cart-count-badge, .cart-count").forEach(el => {
            // data.count = tổng số ITEM (qty), không phải số mặt hàng
            if (el) el.textContent = data.count;
        });

        // 2) Cập nhật tổng tiền (nhiều nơi)
        document.querySelectorAll(".cart-total, .cart-total-float").forEach(el => {
            if (el) el.textContent = formatCurrency(data.total);
        });

        // 3) Patch từng dòng item trong offcanvas (KHÔNG xoá container)
        const container = document.querySelector(".cart-items");
        if (!container) {
            console.warn("⚠️ Không thấy .cart-items — bỏ qua patch danh sách.");
        } else {
            // a) Map cart server -> id : item
            const map = new Map();
            data.cart.forEach(it => map.set(String(it.id), it));

            // b) Xoá dòng nào không còn trên server
            container.querySelectorAll(".cart-item").forEach(row => {
                const id = row.dataset.id;
                if (!map.has(String(id))) {
                    row.remove();
                }
            });

            // c) Thêm mới / cập nhật dòng hiện có
            data.cart.forEach(item => {
                let row = container.querySelector(`.cart-item[data-id="${item.id}"]`);
                if (!row) {
                    // Tạo mới dòng item với CỤM +/− giống bạn đang dùng
                    row = document.createElement("li");
                    row.className = "list-group-item d-flex justify-content-between align-items-center lh-sm cart-item";
                    row.dataset.id = item.id;

                    row.innerHTML = `
            <div class="d-flex align-items-center gap-2">
              <img src="${BASE_URL}assets/images/${item.image}" alt="${item.name}"
                   class="rounded" width="50" height="50" style="object-fit:cover;">
              <div>
                <h6 class="my-0">${item.name}</h6>

                <div class="d-flex align-items-center btn-outline-secondary cart-qty-box">
                  <button class="btn btn-sm btn-outline-secondary cart-minus" data-id="${item.id}">−</button>
                  <input type="text" class="cart-qty-input form-control form-control-sm text-center"
                         data-id="${item.id}" value="${item.qty}" style="width:45px;">
                  <button class="btn btn-sm btn-outline-secondary cart-plus" data-id="${item.id}">+</button>
                  <span class="text-muted">× ${new Intl.NumberFormat("vi-VN").format(item.price)}đ</span>
                </div>
              </div>
            </div>
            <span class="text-black fw-bold ms-auto cart-line-total">${formatCurrency(item.price * item.qty)}</span>
          `;
                    container.appendChild(row);
                } else {
                    // Cập nhật qty + line total + đơn giá hiển thị
                    const qtyInput = row.querySelector(".cart-qty-input");
                    if (qtyInput) qtyInput.value = item.qty;

                    const lineTotal = row.querySelector(".cart-line-total");
                    if (lineTotal) lineTotal.textContent = formatCurrency(item.price * item.qty);

                    const unitPriceSpan = row.querySelector(".cart-qty-box span.text-muted");
                    if (unitPriceSpan) unitPriceSpan.innerHTML = `× ${new Intl.NumberFormat("vi-VN").format(item.price)}đ`;
                }
            });

            // d) Nếu giỏ trống: render thông báo
            if (data.cart.length === 0) {
                container.innerHTML = `
          <li class="list-group-item text-center text-muted empty-cart">
            Giỏ hàng trống
          </li>`;
            }
        }

        // 4) Ẩn/hiện badge (optional)
        document.querySelectorAll(".cart-count-badge").forEach(el => {
            el?.classList?.toggle("d-none", data.count === 0);
        });

        console.log("✅ MiniCart + FloatingCart đã sync xong.");
    } catch (err) {
        console.error("❌ updateMiniCart lỗi:", err);
    }
}


