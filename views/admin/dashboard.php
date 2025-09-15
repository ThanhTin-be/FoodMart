<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard - FoodMart</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- App CSS -->
  <link rel="stylesheet" href="<?= asset('assets/admin/css/app.css') ?>">
</head>
<body class="bg-gray-50">

  <!-- Navbar -->
  <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3 flex items-center justify-between">
      <div class="flex items-center">
        <a href="<?= BASE_URL ?>/admin/dashboard" class="text-xl font-bold flex items-center">
          <img src="<?= asset('assets/admin/images/logo.svg') ?>" class="h-6 mr-2" alt="Logo">
          <span class="self-center whitespace-nowrap">FoodMart Admin</span>
        </a>
      </div>
    </div>
  </nav>

  <!-- Layout -->
  <div class="flex overflow-hidden bg-white pt-16">
    <!-- Sidebar -->
    <aside id="sidebar" class="hidden lg:flex flex-col w-64 border-r border-gray-200 bg-white fixed h-full top-0 left-0 pt-16">
      <div class="flex-1 px-3 py-4">
        <ul class="space-y-2">
          <li><a href="<?= BASE_URL ?>/admin/dashboard" class="block p-2 rounded hover:bg-gray-100">Dashboard</a></li>
          <li><a href="#!" class="block p-2 rounded hover:bg-gray-100">Users</a></li>
          <li><a href="#!" class="block p-2 rounded hover:bg-gray-100">Products</a></li>
          <li><a href="#!" class="block p-2 rounded hover:bg-gray-100">Orders</a></li>
        </ul>
      </div>
    </aside>

    <!-- Main -->
    <div id="main-content" class="h-full w-full bg-gray-50 lg:ml-64 p-6">
      <main>
        <!-- Example Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-6">
          <div class="bg-white shadow rounded-lg p-4">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Sales this week</h3>
            <p class="text-2xl font-bold text-gray-800">$45,385</p>
            <p class="text-sm text-green-500">+12.5% vs last week</p>
          </div>
          <div class="bg-white shadow rounded-lg p-4">
            <h3 class="text-lg font-bold text-gray-900 mb-2">New Products</h3>
            <p class="text-2xl font-bold text-gray-800">2,340</p>
          </div>
          <div class="bg-white shadow rounded-lg p-4">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Visitors</h3>
            <p class="text-2xl font-bold text-gray-800">5,355</p>
          </div>
        </div>

        <!-- Latest Transactions Table -->
        <div class="bg-white shadow rounded-lg p-4 mb-6">
          <h3 class="text-xl font-bold text-gray-900 mb-4">Latest Transactions</h3>
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-500">
              <thead class="bg-gray-50 text-gray-700 uppercase">
                <tr>
                  <th class="px-4 py-2">Transaction</th>
                  <th class="px-4 py-2">Date</th>
                  <th class="px-4 py-2">Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b">
                  <td class="px-4 py-2">Payment from <b>Bonnie Green</b></td>
                  <td class="px-4 py-2">Apr 23, 2021</td>
                  <td class="px-4 py-2 font-semibold">$2,300</td>
                </tr>
                <tr class="border-b">
                  <td class="px-4 py-2">Payment refund to <b>#00910</b></td>
                  <td class="px-4 py-2">Apr 23, 2021</td>
                  <td class="px-4 py-2 font-semibold">-$670</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>

      <!-- Footer -->
      <footer class="bg-white shadow rounded-lg p-4 mt-6">
        <p class="text-center text-sm text-gray-500">
          &copy; 2019-<?= date('Y') ?> FoodMart. All rights reserved.
        </p>
      </footer>
    </div>
  </div>

  <!-- JS -->
  <script src="<?= asset('assets/admin/js/app.js') ?>"></script>
</body>
</html>
