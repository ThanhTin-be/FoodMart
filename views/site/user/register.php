<div class="flex items-center justify-center min-h-screen rounded-3xl bg-gradient-to-br from-gray-50 to-gray-100">
  <div class="w-full max-w-6xl overflow-hidden shadow-2xl rounded-3xl">
    <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[600px]">
      
      <!-- Left Side -->
      <div class="relative flex items-center justify-center p-12 bg-gradient-to-br from-green-400 via-green-500 to-green-600">
        <div class="relative z-10 text-center text-white">
          <h2 class="text-4xl font-bold mb-4">Join Us Today!</h2>
          <p class="text-white/90 mb-6">Create your account to start your shopping journey.</p>
          <svg class="w-24 h-24 mx-auto animate-bounce" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1Z"></path>
          </svg>
        </div>
      </div>

      <!-- Right Side -->
      <div class="flex items-center justify-center p-12 bg-white">
        <div class="w-full max-w-md">
          <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900">Create Account</h2>
            <p class="text-gray-600">Fill in your details to register</p>
          </div>

          <?php if (!empty($error)): ?>
            <div class="p-3 mb-4 text-red-600 bg-red-100 border border-red-300 rounded">
              <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($success)): ?>
            <div class="p-3 mb-4 text-green-600 bg-green-100 border border-green-300 rounded">
              <?= htmlspecialchars($success) ?>
            </div>
          <?php endif; ?>

          <form method="POST" action="<?= BASE_URL ?>user/register" class="space-y-5">
            <div>
              <label for="name" class="block text-sm font-semibold text-gray-700">Full Name</label>
              <input id="name" name="name" type="text" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                class="w-full py-3 px-4 mt-1 border border-gray-300 rounded-xl bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>

            <div>
              <label for="email" class="block text-sm font-semibold text-gray-700">Email Address</label>
              <input id="email" name="email" type="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                class="w-full py-3 px-4 mt-1 border border-gray-300 rounded-xl bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>

            <div>
              <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
              <input id="password" name="password" type="password" required
                class="w-full py-3 px-4 mt-1 border border-gray-300 rounded-xl bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>

            <div>
              <label for="confirm_password" class="block text-sm font-semibold text-gray-700">Confirm Password</label>
              <input id="confirm_password" name="confirm_password" type="password" required
                class="w-full py-3 px-4 mt-1 border border-gray-300 rounded-xl bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>

            <div>
              <label for="phone" class="block text-sm font-semibold text-gray-700">Phone Number</label>
              <input id="phone" name="phone" type="text" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                class="w-full py-3 px-4 mt-1 border border-gray-300 rounded-xl bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>

            <div>
              <label for="address" class="block text-sm font-semibold text-gray-700">Address</label>
              <input id="address" name="address" type="text" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>"
                class="w-full py-3 px-4 mt-1 border border-gray-300 rounded-xl bg-gray-50 focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>

            <button type="submit"
              class="w-full py-3 font-semibold text-white bg-green-600 rounded-xl hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
              Register Now
            </button>

            <p class="text-sm text-center text-gray-600">
              Already have an account?
              <a href="<?= BASE_URL ?>user/login" class="font-semibold text-green-600 hover:underline">Sign in here</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
