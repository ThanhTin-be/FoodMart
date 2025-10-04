// assets/js/cart.js
document.addEventListener("DOMContentLoaded", () => {
    console.log("🛒 cart.js loaded, BASE_URL =", BASE_URL);

    // Lắng nghe nút Mua
    document.querySelectorAll(".add-to-cart").forEach(btn => {
        btn.addEventListener("click", async () => {
            const productId = btn.dataset.id;
            console.log("👉 Click add-to-cart:", productId);

            try {
                const url = `${BASE_URL}cart/add/${productId}?ajax=1`;
                console.log("🌍 Fetching:", url);

                const response = await fetch(url, {
                    headers: { "X-Requested-With": "XMLHttpRequest" }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error ${response.status}`);
                }

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
});

/**
 * Cập nhật MiniCart trong header + Offcanvas
 */
function updateMiniCart(data) {
    console.log("🔄 Update MiniCart:", data);

    // -------------------------------
    // 1️⃣ Cập nhật mini-cart (header dropdown)
    // -------------------------------
    const cartCount = document.querySelector(".cart-count");
    const cartItemsContainer = document.querySelector(".cart-items");

    if (cartCount) {
        cartCount.textContent = data.count;
        cartCount.classList.toggle("d-none", data.count === 0);
    }

    // Tổng tiền (update tất cả vị trí hiển thị)
    const formattedTotal = new Intl.NumberFormat("vi-VN").format(data.total) + " đ";
    document.querySelectorAll(".cart-total, .cart-total-float").forEach(el => {
        el.textContent = formattedTotal;
    });



    if (cartItemsContainer) {
        cartItemsContainer.innerHTML = "";

        if (data.cart.length === 0) {
            cartItemsContainer.innerHTML = `<p class="text-muted empty-cart">Giỏ hàng trống</p>`;
        } else {
            data.cart.forEach(item => {
                const el = document.createElement("div");
                el.className = "d-flex mb-2 align-items-center cart-item";
                el.dataset.id = item.id;

                el.innerHTML = `
                    <img src="${BASE_URL}assets/images/${item.image}" width="40" class="me-2 rounded">
                    <div>
                        <p class="mb-0">${item.name}</p>
                        <small>${item.qty} × ${new Intl.NumberFormat("vi-VN").format(item.price)} đ</small>
                    </div>
                    <span class="ms-auto fw-semibold text-end">
                        ${new Intl.NumberFormat("vi-VN").format(item.qty * item.price)} đ
                    </span>
                `;
                cartItemsContainer.appendChild(el);
            });
        }
    }

    // -------------------------------
    // 2️⃣ Cập nhật Offcanvas Cart (#offcanvasCart)
    // -------------------------------
    const offcanvasList = document.querySelector("#offcanvasCart ul.list-group");
    const offcanvasBadge = document.querySelector("#offcanvasCart .badge");
    const offcanvasTotal = document.querySelector("#offcanvasCart strong");

    if (offcanvasList) {
        offcanvasList.innerHTML = "";

        if (data.cart.length === 0) {
            offcanvasList.innerHTML = `<li class="list-group-item text-center text-muted">Giỏ hàng trống</li>`;
        } else {
            data.cart.forEach(item => {
                const li = document.createElement("li");
                li.className = "list-group-item d-flex justify-content-between lh-sm";
                li.innerHTML = `
                    <div class="d-flex align-items-center">
                        <img src="${BASE_URL}assets/images/${item.image}" width="50" class="me-2 rounded">
                        <div>
                            <h6 class="my-0">${item.name}</h6>
                            <small class="text-muted">${item.qty} × ${new Intl.NumberFormat("vi-VN").format(item.price)} đ</small>
                        </div>
                    </div>
                    <span class="text-body-secondary fw-bold">${new Intl.NumberFormat("vi-VN").format(item.qty * item.price)} đ</span>
                `;
                offcanvasList.appendChild(li);
            });
        }
    }

    if (offcanvasBadge) {
        offcanvasBadge.textContent = data.count;
    }

    if (offcanvasTotal) {
        offcanvasTotal.textContent = new Intl.NumberFormat("vi-VN").format(data.total) + " đ";
    }

    console.log("🎉 MiniCart + Offcanvas updated!");
}
