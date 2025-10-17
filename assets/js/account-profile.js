// ====================== account-profile.js (Final Version) ======================

// 🌙 Dark Mode System
function toggleDarkMode() {
  const html = document.documentElement;
  const isDark = html.classList.contains("dark");
  html.classList.toggle("dark", !isDark);
  localStorage.setItem("theme", !isDark ? "dark" : "light");
  updateThemeIcons(!isDark);
}

function updateThemeIcons(isDark) {
  const darkIcon = document.getElementById("theme-toggle-dark-icon");
  const lightIcon = document.getElementById("theme-toggle-light-icon");
  const text = document.getElementById("theme-toggle-text");
  if (!darkIcon || !lightIcon || !text) return;

  darkIcon.classList.toggle("hidden", isDark);
  lightIcon.classList.toggle("hidden", !isDark);
  text.textContent = isDark ? "Light Mode" : "Dark Mode";
}

function initTheme() {
  const savedTheme = localStorage.getItem("theme");
  const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
  const isDark = savedTheme === "dark" || (!savedTheme && prefersDark);
  document.documentElement.classList.toggle("dark", isDark);
  updateThemeIcons(isDark);
}

initTheme();
document.addEventListener("DOMContentLoaded", initTheme);

// ====================== Toast Notification ======================
function showToast(message, type = "info") {
  const config = {
    success: {
      bg: "from-green-400 to-green-600",
      title: "Thành công!",
      icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>`,
    },
    error: {
      bg: "from-red-400 to-red-600",
      title: "Lỗi!",
      icon: `<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75M12 15.75h.007v.008H12v-.008Z" />`,
    },
    warning: {
      bg: "from-yellow-400 to-yellow-600",
      title: "Cảnh báo!",
      icon: `<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959..." />`,
    },
    info: {
      bg: "from-blue-400 to-blue-600",
      title: "Thông tin",
      icon: `<path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02..." />`,
    },
  }[type] || config.info;

  const toast = document.createElement("div");
  toast.className =
    "fixed top-6 right-6 z-50 w-80 px-5 py-4 bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 transition-all duration-500 transform translate-x-[120%] opacity-0";
  toast.innerHTML = `
    <div class="flex items-start space-x-3">
      <div class="bg-gradient-to-br ${config.bg} p-2 rounded-full">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">${config.icon}</svg>
      </div>
      <div class="flex-1">
        <h4 class="font-semibold text-gray-800 dark:text-white">${config.title}</h4>
        <p class="text-sm text-gray-600 dark:text-gray-300">${message}</p>
      </div>
    </div>`;
  document.body.appendChild(toast);

  setTimeout(() => {
    toast.classList.remove("translate-x-[120%]", "opacity-0");
    toast.classList.add("translate-x-0", "opacity-100");
  }, 50);

  setTimeout(() => {
    toast.classList.remove("translate-x-0", "opacity-100");
    toast.classList.add("translate-x-[120%]", "opacity-0");
    setTimeout(() => toast.remove(), 400);
  }, 3000);
}

// ====================== Nút Loading ======================
function setButtonLoading(button, isLoading) {
  if (!button) return;
  if (isLoading) {
    button.disabled = true;
    button.dataset.originalText = button.innerHTML;
    button.innerHTML = `
      <svg class="animate-spin w-4 h-4 inline-block mr-2 text-white" viewBox="0 0 24 24" fill="none">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
          d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 000 16v-4l3 3-3 3v-4a8 8 0 01-8-8z"></path>
      </svg>Đang xử lý...`;
  } else {
    button.disabled = false;
    button.innerHTML = button.dataset.originalText || "Xong";
  }
}

// ====================== Form Validation + Misc ======================
document.addEventListener("DOMContentLoaded", function () {
  // Auto-hide alert messages
  document.querySelectorAll(".alert-auto-hide").forEach((alert) => {
    setTimeout(() => {
      alert.style.opacity = "0";
      setTimeout(() => alert.remove(), 300);
    }, 4000);
  });

  // Confirm delete
  document.querySelectorAll("[data-confirm-delete]").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const msg = btn.getAttribute("data-confirm-delete") || "Are you sure you want to delete this item?";
      if (!confirm(msg)) e.preventDefault();
    });
  });

  // Form validation (chỉ kiểm tra trống)
  document.querySelectorAll("form[data-validate]").forEach((form) => {
    form.addEventListener("submit", (e) => {
      let isValid = true;
      form.querySelectorAll("[required]").forEach((field) => {
        field.classList.remove("border-red-500", "ring-red-500", "ring-1");
        if (!field.value.trim()) {
          field.classList.add("border-red-500", "ring-red-500", "ring-1");
          isValid = false;
        }
      });
      if (!isValid) {
        e.preventDefault();
        showToast("Vui lòng điền đầy đủ thông tin bắt buộc.", "error");
      }
    });
  });
});

// ====================== AJAX PROFILE & PASSWORD UPDATE (Final Version) ======================
document.addEventListener("DOMContentLoaded", () => {

  // 🔹 Update Profile Realtime
  const profileForm = document.querySelector('form[action*="updateProfile"]');
  if (profileForm) {
    profileForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      const btn = profileForm.querySelector('button[type="submit"]');
      if (!btn) return;
      setButtonLoading(btn, true);

      try {
        const formData = new FormData(profileForm);
        const res = await fetch(profileForm.action, {
          method: "POST",
          body: formData,
          headers: { "X-Requested-With": "XMLHttpRequest" },
        });

        const data = await res.json();
        showToast(data.message, data.success ? "success" : "error");

        if (data.success) {
          // ✅ Scope đúng vào block profile
          const profileBlock = profileForm.querySelector(".mb-6.text-center");
          if (!profileBlock) return;

          const nameEl = profileBlock.querySelector("h3.text-lg.font-semibold");
          const emailEl = profileBlock.querySelector("p.text-sm.text-gray-500");
          const avatarEl = profileBlock.querySelector("div.flex.items-center.justify-center.text-2xl");
          const phoneInput = profileForm.querySelector("input[name='phone']");
          const addressInput = profileForm.querySelector("input[name='address']");

          const newName = formData.get("first_name") + " " + formData.get("last_name");

          if (nameEl) nameEl.textContent = newName;
          if (emailEl) emailEl.textContent = formData.get("email");
          if (avatarEl) avatarEl.textContent = newName.charAt(0).toUpperCase() || "U";
          if (phoneInput) phoneInput.value = formData.get("phone");
          if (addressInput) addressInput.value = formData.get("address");
        }

      } catch (err) {
        console.error("❌ updateProfile error:", err);
        showToast("Lỗi kết nối máy chủ.", "error");
      } finally {
        setButtonLoading(btn, false);
      }
    });
  }

  // 🔹 Update Password
  const passwordForm = document.querySelector('form[action*="updatePassword"]');
  if (passwordForm) {
    passwordForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      const btn = passwordForm.querySelector('button[type="submit"]');
      if (!btn) return;
      setButtonLoading(btn, true);

      try {
        const formData = new FormData(passwordForm);
        const res = await fetch(passwordForm.action, {
          method: "POST",
          body: formData,
          headers: { "X-Requested-With": "XMLHttpRequest" },
        });

        const data = await res.json();
        showToast(data.message, data.success ? "success" : "error");
        if (data.success) passwordForm.reset();
      } catch (err) {
        console.error("❌ updatePassword error:", err);
        showToast("Lỗi kết nối máy chủ.", "error");
      } finally {
        setButtonLoading(btn, false);
      }
    });
  }

});
