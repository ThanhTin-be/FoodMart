// Chú thích: Biến dashboardData giờ được inject từ PHP, không khai báo ở đây.
// Dữ liệu được lấy từ database qua Model và Controller.
// kiểm tra data truyền vào
// Bật/tắt thanh bên trên thiết bị di động
const sidebarToggle = document.getElementById('sidebarToggle')
const sidebar = document.getElementById('sidebar')

sidebarToggle.addEventListener('click', () => {
  // Chuyển đổi lớp để hiển thị/ẩn thanh bên
  sidebar.classList.toggle('-translate-x-full')
})

// Hàm điều hướng giữa các phần
function showSection(sectionName) {
  // Ẩn tất cả các phần
  document.querySelectorAll('.section').forEach((section) => {
    section.classList.add('hidden')
  })

  // Hiển thị phần được chọn
  document.getElementById(sectionName + '-section').classList.remove('hidden')

  // Cập nhật trạng thái mục menu đang hoạt động
  document.querySelectorAll('nav a').forEach((link) => {
    link.classList.remove('bg-gray-700', 'text-white')
    link.classList.add('text-gray-300')
  })
  event.target.classList.add('bg-gray-700', 'text-white')
  event.target.classList.remove('text-gray-300')
}
// Khởi tạo bảng điều khiển
function initializeDashboard() {
  // Cập nhật số liệu thống kê từ dữ liệu dashboardData (từ DB)
  document.getElementById('total-products').textContent =
    dashboardData.stats.totalProducts.toLocaleString()
  document.getElementById('total-customers').textContent =
    dashboardData.stats.totalCustomers.toLocaleString()
  document.getElementById('monthly-revenue').textContent =
    '₫' + dashboardData.stats.monthlyRevenue / 1000000 + 'M'
  document.getElementById('today-orders').textContent =
    dashboardData.stats.todayOrders
  document.getElementById('yearly-revenue').textContent =
    '₫' + (dashboardData.stats.yearlyRevenue / 1000000000).toFixed(1) + 'B'
  document.getElementById('monthly-orders').textContent =
    dashboardData.stats.monthlyOrders.toLocaleString()
  document.getElementById('avg-order-value').textContent =
    '₫' + (dashboardData.stats.avgOrderValue / 1000000).toFixed(1) + 'M'
  document.getElementById('conversion-rate').textContent =
    dashboardData.stats.conversionRate + '%'
  // Cập nhật các phần tử với dữ liệu thong kê doanh thu tháng hiện tại, tháng trước và tỷ lệ tăng trưởng
  document.getElementById('current-month-revenue').textContent =
    '₫' + dashboardData.stats.monthlyRevenue / 1000000 + 'M'
  document.getElementById('last-month-revenue').textContent =
    'đ' + dashboardData.stats.lastMonthlyRevenue / 1000000 + 'M'
  document.getElementById('monthlyRevenueChange').textContent =
    dashboardData.stats.monthlyRevenueChange.toFixed(2) + '%'
  // Khởi tạo các biểu đồ
  initializeCharts()

  // Điền dữ liệu vào các bảng và danh sách từ DB
  populateTopCategories()
  populateRecentOrders()
  populateProductsTable()
  populateCustomersTable()
  populateCategoriesGrid()
}
// Lưu trữ các instance của biểu đồ
let revenueChart, salesPerformanceChart
// Khởi tạo các biểu đồ với dữ liệu từ dashboardData (DB)
function initializeCharts() {
  // Biểu đồ doanh thu
  const revenueCtx = document.getElementById('revenueChart').getContext('2d')
  revenueChart = new Chart(revenueCtx, {
    type: 'line',
    data: {
      labels: [...dashboardData.revenueData.month.labels].reverse(), // Đảo ngược labels khi khởi tạo
      datasets: [
        {
          label: 'Doanh thu (triệu VNĐ)',
          data: [...dashboardData.revenueData.month.data].reverse(), // Đảo ngược data khi khởi tạo
          borderColor: '#4F46E5',
          backgroundColor: 'rgba(79, 70, 229, 0.1)',
          tension: 0.4,
          fill: true,
          pointBackgroundColor: '#4F46E5',
          pointBorderColor: '#ffffff',
          pointBorderWidth: 2,
          pointRadius: 5
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: 'rgba(0,0,0,0.1)'
          }
        },
        x: {
          grid: {
            display: false
          },
          reverse: false // Đảm bảo trục x không tự đảo ngược
        }
      }
    }
  })
  // Biểu đồ hiệu suất bán hàng
  const salesPerformanceCtx = document
    .getElementById('salesPerformanceChart')
    .getContext('2d')
  salesPerformanceChart = new Chart(salesPerformanceCtx, {
    type: 'bar',
    data: {
      labels: dashboardData.salesPerformance.labels,
      datasets: dashboardData.salesPerformance.datasets
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top'
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  })

  // Biểu đồ sản phẩm bán chạy
  const topProductsCtx = document
    .getElementById('topProductsChart')
    .getContext('2d')
  new Chart(topProductsCtx, {
    type: 'doughnut',
    data: {
      labels: dashboardData.topProducts.labels,
      datasets: [
        {
          data: dashboardData.topProducts.data,
          backgroundColor: [
            '#4F46E5',
            '#7C3AED',
            '#EC4899',
            '#EF4444',
            '#F59E0B'
          ]
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  })

  // Biểu đồ doanh thu tháng và danh mục (nếu có)
  setTimeout(() => {
    const monthlyRevenueCtx = document.getElementById('monthlyRevenueChart')
    if (monthlyRevenueCtx) {
      new Chart(monthlyRevenueCtx.getContext('2d'), {
        type: 'bar',
        data: {
          labels: dashboardData.revenueData.month.labels, // Sửa để dùng month
          datasets: [
            {
              label: 'Doanh thu (triệu VNĐ)',
              data: dashboardData.revenueData.month.data,
              backgroundColor: '#4F46E5'
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
      })
    }

    const categoryRevenueCtx = document.getElementById('categoryRevenueChart')
    if (categoryRevenueCtx) {
      new Chart(categoryRevenueCtx.getContext('2d'), {
        type: 'pie',
        data: {
          labels: dashboardData.topCategories.map((cat) => cat.name),
          datasets: [
            {
              data: dashboardData.topCategories.map((cat) => cat.sales),
              backgroundColor: [
                '#4F46E5',
                '#7C3AED',
                '#EC4899',
                '#EF4444',
                '#F59E0B'
              ]
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
      })
    }
  }, 100)
}

// Điền dữ liệu danh mục bán chạy từ DB
function populateTopCategories() {
  const container = document.getElementById('top-categories')
  container.innerHTML = dashboardData.topCategories
    .map(
      (category) => `
          <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
              <div class="flex items-center space-x-3">
                  <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                      <i class="fas fa-tag text-blue-600"></i>
                  </div>
                  <div>
                      <p class="font-medium">${category.name}</p>
                      <p class="text-sm text-gray-500">${(
                        category.revenue / 1000000
                      )
                        .toFixed(2)
                        .toLocaleString()}M doanh thu</p>
                  </div>
              </div>
              <div class="text-right">
                  <p class="font-semibold text-green-600">${
                    category.products
                  } loại sản phẩm </p>
              </div>
          </div>
      `
    )
    .join('')
}
function getStatusClass(status) {
  switch (status.toLowerCase()) {
    case 'thanh_cong':
      return 'bg-green-300 text-green-800'
    case 'cho_xac_nhan':
      return 'bg-yellow-300 text-yellow-800'
    case 'huy':
      return 'bg-red-300 text-red-800'
    case 'da_xac_nhan':
      return 'bg-blue-300 text-red-800'
    case 'da_giao':
      return 'bg-orange-300 text-red-800'
    default:
      return 'bg-gray-300 text-gray-800'
  }
}
// Điền dữ liệu đơn hàng gần đây từ DB
function populateRecentOrders() {
  const tbody = document.getElementById('recent-orders')
  tbody.innerHTML = dashboardData.recentOrders
    .map(
      (order) => `
          <tr class="hover:bg-gray-50">
              <td class="px-4 py-2 font-medium">${order.id.toLocaleString()}</td>
              <td class="px-4 py-2">${order.customer}</td>
              <td class="px-4 py-2">₫${(order.total / 1000).toFixed(2)}K</td>
              <td class="px-4 py-2">
                  <span class="px-2 py-1 text-xs rounded-full ${getStatusClass(
                    order.status
                  )}">
                      ${order.status}
                  </span>
              </td>
          </tr>
      `
    )
    .join('')
}

// Điền dữ liệu bảng sản phẩm từ DB
function populateProductsTable() {
  const tbody = document.getElementById('products-table')
  tbody.innerHTML = dashboardData.products
    .map(
      (product) => `
          <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 font-medium">${product.name}</td>
              <td class="px-6 py-4">${product.category}</td>
              <td class="px-6 py-4">₫${product.price.toLocaleString()}</td>
              <td class="px-6 py-4">${product.stock}</td>
              <td class="px-6 py-4">
                  <span class="px-2 py-1 text-xs rounded-full ${
                    product.status === 'Còn hàng'
                      ? 'bg-green-100 text-green-800'
                      : 'bg-red-100 text-red-800'
                  }">
                      ${product.status}
                  </span>
              </td>
              <td class="px-6 py-4">
                  <button class="text-blue-600 hover:text-blue-800 mr-2">
                      <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                      <i class="fas fa-trash"></i>
                  </button>
              </td>
          </tr>
      `
    )
    .join('')
}
// Cập nhật biểu đồ doanh thu theo khoảng thời gian
function updateRevenueChart(period) {
  // Cập nhật trạng thái các nút
  document
    .querySelectorAll('[onclick^="updateRevenueChart"]')
    .forEach((btn) => {
      btn.classList.remove('bg-blue-100', 'text-blue-600')
      btn.classList.add('text-gray-600', 'hover:bg-gray-100')
    })
  event.target.classList.add('bg-blue-100', 'text-blue-600')
  event.target.classList.remove('text-gray-600', 'hover:bg-gray-100')

  // Cập nhật dữ liệu biểu đồ từ DB
  const data = dashboardData.revenueData[period]
  revenueChart.data.labels = [...data.labels].reverse() // Đảo ngược labels
  revenueChart.data.datasets[0].data = [...data.data].reverse() // Đảo ngược data

  // Cập nhật nhãn dựa trên khoảng thời gian
  let label = 'Doanh thu '
  switch (period) {
    case 'month':
      label += '(triệu VNĐ)'
      break
    case 'quarter':
      label += '(triệu VNĐ)'
      break
    case 'year':
      label += '(tỷ VNĐ)'
      break
  }
  revenueChart.data.datasets[0].label = label
  revenueChart.update()
}
// Khởi tạo bảng điều khiển khi trang tải xong
document.addEventListener('DOMContentLoaded', initializeDashboard)

// Script xác thực Cloudflare (giữ nguyên từ gốc)
;(function () {
  function c() {
    var b = a.contentDocument || a.contentWindow.document
    if (b) {
      var d = b.createElement('script')
      d.innerHTML =
        "window.__CF$cv$params={r:'985058e893da860a',t:'MTc1ODg2NDM5NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"
      b.getElementsByTagName('head')[0].appendChild(d)
    }
  }
  if (document.body) {
    var a = document.createElement('iframe')
    a.height = 1
    a.width = 1
    a.style.position = 'absolute'
    a.style.top = 0
    a.style.left = 0
    a.style.border = 'none'
    a.style.visibility = 'hidden'
    document.body.appendChild(a)
    if ('loading' !== document.readyState) c()
    else if (window.addEventListener)
      document.addEventListener('DOMContentLoaded', c)
    else {
      var e = document.onreadystatechange || function () {}
      document.onreadystatechange = function (b) {
        e(b)
        'loading' !== document.readyState &&
          ((document.onreadystatechange = e), c())
      }
    }
  }
})()
