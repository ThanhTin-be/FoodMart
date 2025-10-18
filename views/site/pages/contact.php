<div class="px-4 py-2 mx-auto max-w-7xl">
  <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
    <!-- Main Content -->
    <div class="lg:col-span-2">
      <h1 class="pb-4 text-2xl font-bold text-gray-800 font-cal-sans">
        Liên hệ </h1>
      <div class="mb-4 overflow-hidden text-gray-800 bg-white shadow-lg rounded-2xl">
        <div class="p-4">
          <div class="max-w-none">
            <form class="ajax-form space-y-5" data-form-name="contact" data-handler-attached="true">
              <!-- Config -->
              <input type="hidden" name="form_to" value="dev.zota@gmail.com">
              <input type="hidden" name="form_subject" value="Liên hệ từ {{name}} - {{email}}">
              <input type="hidden" name="form_required" value="name,email,message">
              <input type="hidden" name="form_validate" value="email:email,phone:phone">
              <input type="hidden" name="form_success_message" value="Cảm ơn bạn! Chúng tôi sẽ phản hồi trong 24h.">

              <!-- Fields -->
              <div class="grid md:grid-cols-2 gap-4">
                <div class="relative">
                  <i class="fa fa-user absolute left-3 top-1/2 -translate-y-1/2 text-green-500"></i>
                  <input name="name" placeholder="Họ tên" class="pl-10 pr-4 py-3 border border-green-500 rounded-lg focus:border-orange-600 focus:ring-2 focus:ring-orange-300 focus:outline-none transition-colors w-full" required="required">
                </div>
                <div class="relative">
                  <i class="fa fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-green-500"></i>
                  <input name="email" type="email" placeholder="Email" class="pl-10 pr-4 py-3 border border-green-500 rounded-lg focus:border-orange-600 focus:ring-2 focus:ring-orange-300 focus:outline-none transition-colors w-full" required="required">
                </div>
              </div>

              <div class="grid md:grid-cols-2 gap-4">
                <div class="relative">
                  <i class="fa fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-green-500"></i>
                  <input name="phone" type="tel" placeholder="Số điện thoại" class="pl-10 pr-4 py-3 border border-green-500 rounded-lg focus:border-orange-600 focus:ring-2 focus:ring-orange-300 focus:outline-none transition-colors w-full" pattern="[0-9+\-\s()]{8,15}">
                </div>
                <div class="relative">
                  <i class="fa fa-building absolute left-3 top-1/2 -translate-y-1/2 text-green-500"></i>
                  <input name="company" placeholder="Công ty" class="pl-10 pr-4 py-3 border border-green-500 rounded-lg focus:border-orange-600 focus:ring-2 focus:ring-orange-300 focus:outline-none transition-colors w-full">
                </div>
              </div>

              <div class="relative">
                <i class="fa fa-comment-dots absolute left-3 top-4 text-green-500"></i>
                <textarea name="message" rows="4" placeholder="Tin nhắn" class="pl-10 pr-4 py-3 border border-green-500 rounded-lg focus:border-orange-600 focus:ring-2 focus:ring-orange-300 focus:outline-none transition-colors resize-none w-full" required="required"></textarea>
              </div>

              <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg transition-colors font-medium flex items-center justify-center gap-2">
                <i class="fa fa-paper-plane"></i> Gửi tin nhắn
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Sidebar -->
    <?php include_once view_path("site/partials/sidebar_info.php") ?>;
  </div>
</div>
</div>

<script>
  const shop_ajax = {
    ajax_url: "<?= BASE_URL ?>ajax/contact/send",
    nonce: "<?= md5(session_id() . 'contact_form'); ?>"
  };
</script>

<script src="<?= BASE_URL ?>assets/js/contact.js"></script>