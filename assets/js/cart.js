// assets/js/cart.js

document.addEventListener("DOMContentLoaded", () => {
    console.log("🛒 cart.js loaded, BASE_URL =", BASE_URL);

    // Lắng nghe nút Thêm vào giỏ
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
 * Cập nhật MiniCart trong header
 */
function updateMiniCart(data) {
    console.log("🔄 Update MiniCart:", data);

    // Badge số lượng
    const cartCount = document.querySelector(".cart-count");
    if (cartCount) {
        cartCount.textContent = data.count;
        cartCount.classList.toggle("d-none", data.count === 0);
    }

    // Tổng tiền
    const cartTotal = document.querySelector(".cart-total");
    if (cartTotal) {
        cartTotal.textContent = new Intl.NumberFormat("vi-VN").format(data.total) + " đ";
    }

    // Danh sách sản phẩm
    const cartItemsContainer = document.querySelector(".cart-items");
    if (cartItemsContainer) {
        cartItemsContainer.innerHTML = ""; // reset trước

        if (data.cart.length === 0) {
            cartItemsContainer.innerHTML = `<p class="text-muted empty-cart">Giỏ hàng trống</p>`;
        } else {
            data.cart.forEach(item => {
                const el = document.createElement("div");
                el.className = "d-flex mb-2 align-items-center cart-item";
                el.dataset.id = item.id;

                el.innerHTML = `
                    <img src="${BASE_URL}assets/images/${item.image}" width="40" class="me-2">
                    <div>
                        <p class="mb-0">${item.name}</p>
                        <small>${item.qty} x ${new Intl.NumberFormat("vi-VN").format(item.price)}đ</small>
                    </div>
                    <a href="${BASE_URL}cart/remove/${item.id}" class="ms-auto text-danger remove-item">&times;</a>
                `;
                cartItemsContainer.appendChild(el);
            });
        }
    }

    console.log("🎉 MiniCart updated!");
}

// Cập nhật Floating MiniCart
const floatCartCount = document.querySelector(".cart-count-badge");
const floatCartTotal = document.querySelector(".cart-total-float");

if (floatCartCount) {
    floatCartCount.textContent = data.count;
}
if (floatCartTotal) {
    floatCartTotal.textContent = new Intl.NumberFormat("vi-VN").format(data.total) + " đ";
}
