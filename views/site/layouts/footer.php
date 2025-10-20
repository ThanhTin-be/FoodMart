<footer class="relative overflow-hidden text-white bg-gradient-to-br from-brand-darker to-brand-dark">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-32 h-32 rounded-full top-10 left-10 bg-brand-primary"></div>
        <div class="absolute w-24 h-24 rounded-full bottom-20 right-20 bg-brand-secondary"></div>
        <div class="absolute w-16 h-16 rounded-full top-1/2 left-1/3 bg-brand-accent"></div>
    </div>

    <div class="container relative z-10 px-4 mx-auto">
        <!-- Main Footer Content -->
        <div class="py-10">
            <div class="grid gap-8 lg:grid-cols-4 lg:gap-12">

                <!-- Company Info -->
                <div class="lg:col-span-1">
                    <h4 class="mb-6 text-xl font-bold font-league-spartan">Về chúng tôi</h4>
                    <!-- Logo -->
                    <h3 class="mb-2 font-bold text-md font-cal-sans"><b>Công Ty TNHH THỰC PHẨM FOODMART Việt Nam</b></h3>

                    <p class="mb-6 leading-relaxed text-gray-300 font-questrial">
                        Công Ty TNHH Thực Phẩm FoodMart Việt Nam
                        FoodMart tự hào là đơn vị phân phối thực phẩm sạch, an toàn và đa dạng hàng đầu, chuyên cung cấp trái cây, rau củ, thịt cá, dầu ăn, gia vị, đồ khô và sản phẩm thiết yếu cho người tiêu dùng Việt.
                    </p>

                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="" target="_blank" rel="noopener noreferrer" title="Facebook" class="flex items-center justify-center w-10 h-10 transition-all duration-300 transform bg-brand-primary hover:bg-brand-secondary rounded-xl hover:scale-110">
                            <i class="text-white fab fa-facebook"></i>
                        </a>
                        <a href="" target="_blank" rel="noopener noreferrer" title="Zalo" class="flex items-center justify-center w-10 h-10 transition-all duration-300 transform bg-brand-primary hover:bg-brand-secondary rounded-xl hover:scale-110">
                            <i class="text-white fab fa-twitter"></i>
                        </a>
                        <a href="" target="_blank" rel="noopener noreferrer" title="Instagram" class="flex items-center justify-center w-10 h-10 transition-all duration-300 transform bg-brand-primary hover:bg-brand-secondary rounded-xl hover:scale-110">
                            <i class="text-white fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <!-- Quick Links -->
                <div>
                    <h4 class="mb-6 text-xl font-bold font-league-spartan">Liên Kết Nhanh</h4>
                    <ul class="space-y-3 quick-links-menu">
                        <li>
                            <a href="<?= BASE_URL ?>" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>pages/about " class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Giới thiệu
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>blog" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Tin tức
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>shop/index" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Sản phẩm
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>pages/contact" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Policies -->
                <div>
                    <h4 class="mb-6 text-xl font-bold font-league-spartan">Chính Sách</h4>
                    <ul class="space-y-3 policies-menu">
                        <li>
                            <a href="<?= BASE_URL ?>pages/privacy" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Chính sách bảo mật
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>pages/return/" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Chính sách đổi trả
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>pages/shipping" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Chính sách giao hàng
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>pages/terms" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Điều khoản sử dụng
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>pages/payment" class="flex items-center text-gray-300 transition-colors duration-300 hover:text-brand-accent font-questrial">
                                <i class="mr-2 fas fa-chevron-right text-brand-primary text-xs"></i>
                                Phương thức thanh toán
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="mb-6 text-xl font-bold font-league-spartan">Thông Tin Liên Hệ</h4>
                    <div class="space-y-4">
                        <!-- Address -->
                        <div class="flex items-start space-x-3">
                            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-brand-primary rounded-xl">
                                <i class="text-white fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="font-medium text-white font-lexend">Địa chỉ</p>
                                <div class="text-sm text-gray-300 font-questrial">
                                    Số 613 Âu Cơ, phường Tân Phú, TP. Hồ Chí Minh </div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-3">
                            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-brand-primary rounded-xl">
                                <i class="text-white fas fa-phone"></i>
                            </div>
                            <div>
                                <p class="font-medium text-white font-lexend">Hotline</p>
                                <div class="text-sm text-gray-300 font-questrial">
                                    <a href="tel:0978379195" class="text-gray-300 hover:text-brand-accent transition-colors duration-300">0828797979</a>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-3">
                            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-brand-primary rounded-xl">
                                <i class="text-white fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="font-medium text-white font-lexend">Email</p>
                                <div class="text-sm text-gray-300 font-questrial">
                                    <a href="mailto:thanhtin.vhu@gmail.com" class="text-gray-300 hover:text-brand-accent transition-colors duration-300">thanhtin.vhu@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter Subscription -->
            <div class="py-8 mt-5 border-t border-brand-primary/20">
                <div class="grid items-center gap-8 lg:grid-cols-2">
                    <div>
                        <h4 class="mb-2 text-2xl font-bold font-cal-sans">Đăng Ký Nhận Tin</h4>
                        <p class="text-gray-300 font-questrial">Nhận thông tin khuyến mãi và tin tức mới nhất</p>
                    </div>

                    <!-- Newsletter Form -->
                    <form class="ajax-form" data-form-name="newsletter" data-form-required="email" data-form-validate="email:email" data-form-subject="Đăng ký newsletter từ {{email}}" data-form-success-message="Cảm ơn bạn đã đăng ký nhận tin!" data-handler-attached="true">

                        <!-- Hidden config -->
                        <input type="hidden" name="form_to" value="thanhphuongfood25@gmail.com">
                        <input type="hidden" name="form_form" value="newsletter">

                        <div class="flex space-x-4">
                            <div class="flex-1 form-group">
                                <input type="email" name="email" placeholder="Nhập email của bạn..." class="w-full px-6 py-3 text-white placeholder-gray-300 border rounded-full bg-white/10 backdrop-blur-sm border-white/20 focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-brand-primary font-questrial" required="required" fdprocessedid="dc67dc">
                            </div>
                            <button type="submit" class="px-8 py-3 font-semibold transition-all duration-300 transform rounded-full bg-gradient-to-r from-brand-primary to-brand-secondary hover:from-brand-secondary hover:to-brand-primary hover:scale-105 font-lexend" fdprocessedid="b0bmar">
                                Đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Copyright & Login -->
            <div class="py-6 border-t border-brand-primary/20">
                <div class="flex flex-col items-center justify-between space-y-4 lg:flex-row lg:space-y-0">
                    <div class="text-center lg:text-left">
                        <p class="text-sm text-gray-300 font-questrial">
                            © 2025 Công Ty TNHH THỰC PHẨM FOODMART Việt Nam. Tất cả quyền được bảo lưu.
                        </p>
                    </div>


                </div>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-1/4 right-8 opacity-10 animate-bounce">
            <div class="text-6xl"><img draggable="false" role="img" class="emoji" alt="🍎" src="https://s.w.org/images/core/emoji/16.0.1/svg/1f34e.svg"></div>
        </div>
        <div class="absolute delay-500 bottom-1/4 left-8 opacity-10 animate-bounce">
            <div class="text-5xl"><img draggable="false" role="img" class="emoji" alt="🍊" src="https://s.w.org/images/core/emoji/16.0.1/svg/1f34a.svg"></div>
        </div>
    </div>
</footer>

<!-- ===================== JS ===================== -->
<!-- Khai báo BASE_URL -->
<script>
    const BASE_URL = "<?= BASE_URL ?>";
    console.log("✅ PHP BASE_URL =", BASE_URL);
</script>
<!-- jQuery luôn load đầu tiên -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/cart.js"></script>
<!-- Sau đó load plugin phụ thuộc jQuery -->
<script src="<?= BASE_URL ?>assets/js/plugins.js"></script>

<!-- Các thư viện JS khác -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/wishlist.js"></script>

<!-- Cuối cùng mới đến script chính -->
<script src="<?= BASE_URL ?>assets/js/script.js"></script>

<?php
$uri = $uri ?? ($_SERVER['REQUEST_URI'] ?? '');
?>

<!-- Chỉ load khi ở trang checkout -->
<?php if (strpos($uri, 'checkout/index') !== false): ?>
    <script src="<?= BASE_URL ?>assets/js/checkout.js"></script>
<?php endif; ?>

</body>

</html>