document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector(".ajax-form");
  if (!form) return;

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    // Nút loading
    const button = form.querySelector("button[type='submit']");
    button.disabled = true;
    button.innerHTML = `
      <i class="fa fa-spinner fa-spin"></i> Đang gửi...
    `;

    // Giả lập gửi trong 2 giây
    setTimeout(() => {
      button.disabled = false;
      button.innerHTML = `<i class="fa fa-paper-plane"></i> Gửi tin nhắn`;
      // form.reset();

      // ✅ Hiển thị thông báo
      showToast("success", "Gửi thành công!", "Cảm ơn bạn! Chúng tôi sẽ phản hồi trong 24h.");
    }, 2000);
  });

  // =========================
  // TOAST thông báo góc phải
  // =========================
  function showToast(type = "success", title = "Thành công!", message = "Đã xử lý xong.") {
    // Xóa toast cũ nếu có
    const old = document.getElementById("custom-toast");
    if (old) old.remove();

    // Cấu hình loại thông báo
    const colors = {
      success: {
        bg: "bg-green-500",
        border: "border-green-300",
        icon: `<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />`,
        label: "Thành công!"
      },
      error: {
        bg: "bg-red-500",
        border: "border-red-300",
        icon: `<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.007v.008H12v-.008ZM12 3a9 9 0 100 18 9 9 0 000-18z" />`,
        label: "Lỗi!"
      }
    }[type];

    // Tạo phần tử toast
    const toast = document.createElement("div");
    toast.id = "custom-toast";
    toast.className = `
      fixed top-6 right-6 z-50 w-80 bg-white shadow-xl rounded-xl p-5 border ${colors.border} animate-fade-in-up
    `;
    toast.innerHTML = `
      <div class="flex items-center space-x-4 mb-5">
        <div class="relative">
          <div class="w-12 h-12 relative">
            <div class="w-12 h-12 ${colors.bg} rounded-full flex items-center justify-center shadow-lg">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                ${colors.icon}
              </svg>
            </div>
            <div class="absolute inset-0 w-12 h-12 border-4 ${colors.border} rounded-full animate-ping opacity-60"></div>
          </div>
        </div>
        <div class="flex-1">
          <div class="text-gray-900 font-semibold text-lg">${title}</div>
          <div class="text-gray-600 text-sm">${message}</div>
        </div>
      </div>
      <div class="flex items-center justify-between text-sm">
        <span class="text-gray-700 font-medium">${colors.label}</span>
        <div class="flex space-x-1">
          <div class="w-2 h-2 ${colors.bg} rounded-full animate-bounce [animation-delay:0ms]"></div>
          <div class="w-2 h-2 ${colors.bg} rounded-full animate-bounce [animation-delay:150ms]"></div>
          <div class="w-2 h-2 ${colors.bg} rounded-full animate-bounce [animation-delay:300ms]"></div>
          <div class="w-2 h-2 ${colors.bg} rounded-full animate-bounce [animation-delay:450ms]"></div>
        </div>
      </div>
    `;

    document.body.appendChild(toast);

    // Ẩn sau 4 giây
    setTimeout(() => {
      toast.classList.add("opacity-0", "translate-y-2", "transition-all", "duration-700");
      setTimeout(() => toast.remove(), 700);
    }, 4000);
  }
});
