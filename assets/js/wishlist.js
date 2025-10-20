// assets/js/wishlist.js
function toggleWishlist(productId) {
  console.log("💖 Clicked product:", productId)

  fetch(BASE_URL + "index.php?url=site/wishlist/toggle/" + productId)
    .then(res => res.json())
    .then(data => {
      console.log("✅ Server response:", data)

      const btnWrapper = document.querySelector(`#wishlist-btn-${productId}`)
      if (!btnWrapper) return

      // Tìm icon bên trong nút
      const icon = btnWrapper.querySelector("i")

      if (data.status === "added") {
        icon?.classList.remove("fa-regular", "text-gray-600")
        icon?.classList.add("fa-solid", "text-red-500")
      } else if (data.status === "removed") {
        icon?.classList.remove("fa-solid", "text-red-500")
        icon?.classList.add("fa-regular", "text-gray-600")
      }

    })
    .catch(err => console.error("❌ Wishlist toggle error:", err))
}
