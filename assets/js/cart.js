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

    // Badge số lượng (header + offcanvas)
    const cartCountElements = document.querySelectorAll(".cart-count, .cart-count-badge");
    cartCountElements.forEach(el => {
        el.textContent = data.count; // ✅ tổng số item (ví dụ: 5 = A×3 + B×2)
        el.classList.toggle("d-none", data.count === 0);
    });

    // Tổng tiền (offcanvas + floating)
    const cartTotals = document.querySelectorAll(".cart-total, .cart-total-float");
    cartTotals.forEach(el => {
        el.textContent = new Intl.NumberFormat("vi-VN").format(data.total) + " đ";
    });

    // Danh sách sản phẩm (offcanvas)
    const cartItemsContainer = document.querySelector(".cart-items");
    if (cartItemsContainer) {
        cartItemsContainer.innerHTML = "";
        if (data.cart.length === 0) {
            cartItemsContainer.innerHTML = `<li class="list-group-item text-center text-muted">Giỏ hàng trống</li>`;
        } else {
            data.cart.forEach(item => {
                const el = document.createElement("li");
                el.className = "list-group-item d-flex justify-content-between align-items-center lh-sm cart-item";
                el.dataset.id = item.id;
                el.innerHTML = `
                    <div class="d-flex align-items-center gap-2">
                        <img src="${BASE_URL}assets/images/${item.image}" alt="${item.name}"
                             class="rounded" width="50" height="50" style="object-fit:cover;">
                        <div>
                            <h6 class="my-0">${item.name}</h6>
                            <small class="text-muted">${item.qty} x ${new Intl.NumberFormat("vi-VN").format(item.price)}đ</small>
                        </div>
                    </div>
                    <span class="text-black fw-bold ms-auto">
                        ${new Intl.NumberFormat("vi-VN").format(item.price * item.qty)}đ
                    </span>
                `;
                cartItemsContainer.appendChild(el);
            });
        }
    }

    console.log("🎉 MiniCart updated!");
}

