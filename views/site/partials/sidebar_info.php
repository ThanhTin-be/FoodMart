<!-- sidebar hiển thị featured post cho trang about + contact -->
<!-- views/site/partials/sidebar_info.php -->
<div class="lg:col-span-1">
    <div class="py-4 space-y-4">
        <!-- Chuyên mục - Badge Style Title -->
        <div class="group">
            <div class="transition-all duration-300 shadow-lg bg-gradient-to-br from-white to-gray-50 rounded-2xl backdrop-blur-sm hover:shadow-xl">
                <div class="p-4 bg-gray-100 rounded-t-2xl">
                    <h3 class="pr-8 text-xl font-bold text-gray-800">
                        Chuyên mục
                    </h3>
                    <p class="mt-2 text-sm text-gray-600">Chuyên mục nhiều bài viết hay nhất</p>
                </div>

                <ul class="p-4 space-y-3">
                    <li>
                        <a href="https://dev.wptheme.store/s/wppricot/category/tin-tuc/" class="flex items-center justify-between p-3 transition-all duration-300 group/item rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-green-100 hover:shadow-md">
                            <span class="flex items-center">
                                <div class="flex items-center justify-center w-8 h-8 mr-3 transition-transform duration-300 rounded-lg bg-gradient-to-br from-green-400 to-green-500 group-hover/item:scale-110">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9 3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-700 transition-colors duration-300 group-hover/item:text-green-600">
                                    Tin tức </span>
                            </span>
                            <span class="px-3 py-1 text-xs font-bold text-green-700 rounded-full shadow-sm bg-gradient-to-r from-green-100 to-green-200">
                                4 </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Bài viết mới - Underline Animation Title -->
        <div class="overflow-hidden bg-white shadow-sm rounded-xl">
            <div class="p-4 bg-gray-100 rounded-t-2xl">
                <h3 class="pr-8 text-xl font-bold text-gray-800">
                    Bài viết nổi bật
                </h3>
                <p class="mt-2 text-sm text-gray-600">Danh sách những bài viết hay nhất</p>
            </div>

            <!-- Articles List -->
            <div class="divide-y divide-gray-100">

                <!-- Article 1 -->
                <article class="group">
                    <a href="https://dev.wptheme.store/s/wppricot/trai-cay-theo-mua-lua-chon-thong-minh/" class="block px-4 py-3 transition-colors hover:bg-gray-50">
                        <div class="flex items-start gap-3">
                            <!-- Small thumbnail -->
                            <img src="https://dev.wptheme.store/s/wppricot/wp-content/uploads/2025/09/trai-cay-theo-mua-lua-chon-thong-minh-7-scaled.jpg" alt="Trái Cây Theo Mùa: Lựa Chọn Thông Minh" class="flex-shrink-0 object-cover w-12 h-12 transition-shadow rounded-lg group-hover:shadow-md">
                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 transition-colors line-clamp-2 group-hover:text-green-600">
                                    Trái Cây Theo Mùa: Lựa Chọn Thông Minh </h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs text-gray-500">
                                        WP Theme </span>
                                    <span class="text-xs font-medium text-green-600">
                                        Tin tức </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>

                <!-- Article 2 -->
                <article class="group">
                    <a href="https://dev.wptheme.store/s/wppricot/5-cong-thuc-smoothie-detox-tu-trai-cay/" class="block px-4 py-3 transition-colors hover:bg-gray-50">
                        <div class="flex items-start gap-3">
                            <!-- Small thumbnail -->
                            <img src="https://dev.wptheme.store/s/wppricot/wp-content/uploads/2025/09/5-cong-thuc-smoothie-detox-tu-trai-cay-8-scaled.jpg" alt="5 Công Thức Smoothie Detox Từ Trái Cây" class="flex-shrink-0 object-cover w-12 h-12 transition-shadow rounded-lg group-hover:shadow-md">
                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 transition-colors line-clamp-2 group-hover:text-green-600">
                                    5 Công Thức Smoothie Detox Từ Trái Cây </h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs text-gray-500">
                                        WP Theme </span>
                                    <span class="text-xs font-medium text-green-600">
                                        Tin tức </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>

                <!-- Article 3 -->
                <article class="group">
                    <a href="https://dev.wptheme.store/s/wppricot/7-cach-bao-quan-trai-cay-tuoi-lau-hon/" class="block px-4 py-3 transition-colors hover:bg-gray-50">
                        <div class="flex items-start gap-3">
                            <!-- Small thumbnail -->
                            <img src="https://dev.wptheme.store/s/wppricot/wp-content/uploads/2025/09/7-cach-bao-quan-trai-cay-tuoi-lau-hon-8.jpg" alt="7 Cách Bảo Quản Trái Cây Tươi Lâu Hơn" class="flex-shrink-0 object-cover w-12 h-12 transition-shadow rounded-lg group-hover:shadow-md">
                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 transition-colors line-clamp-2 group-hover:text-green-600">
                                    7 Cách Bảo Quản Trái Cây Tươi Lâu Hơn </h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs text-gray-500">
                                        WP Theme </span>
                                    <span class="text-xs font-medium text-green-600">
                                        Tin tức </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>

                <!-- Article 4 -->
                <article class="group">
                    <a href="https://dev.wptheme.store/s/wppricot/10-loi-ich-tuyet-voi-cua-trai-cay-organic-doi-voi-suc-khoe/" class="block px-4 py-3 transition-colors hover:bg-gray-50">
                        <div class="flex items-start gap-3">
                            <!-- Small thumbnail -->
                            <img src="https://dev.wptheme.store/s/wppricot/wp-content/uploads/2025/09/10-loi-ich-tuyet-voi-cua-trai-cay-organic-doi-voi-suc-khoe-3-scaled.jpg" alt="10 Lợi Ích Tuyệt Vời Của Trái Cây Organic Đối Với Sức Khỏe" class="flex-shrink-0 object-cover w-12 h-12 transition-shadow rounded-lg group-hover:shadow-md">
                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 transition-colors line-clamp-2 group-hover:text-green-600">
                                    10 Lợi Ích Tuyệt Vời Của Trái Cây Organic Đối Với Sức Khỏe </h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs text-gray-500">
                                        WP Theme </span>
                                    <span class="text-xs font-medium text-green-600">
                                        Tin tức </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
            </div>

        </div>
    </div>
</div>