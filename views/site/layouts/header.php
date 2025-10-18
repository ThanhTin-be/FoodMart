<?php

/**
 * views/layouts/header.php
 * Tailwind-only header + Font Awesome icons (no Bootstrap).
 * - Keep Swiper/Chocolat/Preloader vendors as you requested.
 * - Mini dropdowns for Account & Cart (pure JS), hover/transition like the sample.
 * - Categories from $categories (controller must pass). Falls back gracefully.
 * - Cart total & item count from $_SESSION['cart'].
 */

$user = $_SESSION['user'] ?? null;
$cart = $_SESSION['cart'] ?? [];

// totals
$total = 0;
$totalQty = 0;
foreach ($cart as $item) {
    $price = isset($item['price']) ? (float)$item['price'] : 0;
    $qty   = isset($item['qty'])   ? (int)$item['qty']   : 0;
    $total += $price * $qty;
    $totalQty += $qty; // tổng số item
}

// categories (expected from controller)
$categories = $categories ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FoodMart - eCommerce Grocery Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Keep vendor CSS (Swiper) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- TailwindCSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome (icons like file mẫu) -->
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Your existing CSS bundles -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendor.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Giữ fix overlay khi hover product-card (nếu bạn đang dùng ở nơi khác) */
        .product-card .group:hover .absolute {
            opacity: 1 !important;
            background-color: rgba(0, 0, 0, 0.2) !important;
            z-index: 50 !important;
            pointer-events: auto !important;
        }

        .product-card img {
            pointer-events: none;
        }

        /* Ẩn scrollbar cho dropdown dài */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        /* 🌿 Brand colors - Green theme for Pricot */
                        'brand-primary': '#16a34a', // Green 600
                        'brand-secondary': '#22c55e', // Green 500
                        'brand-accent': '#4ade80', // Green 400
                        'brand-light': '#dcfce7', // Green 100
                        'brand-dark': '#15803d', // Green 700
                        'brand-darker': '#166534', // Green 800

                        /* 💙 Dashboard primary (xanh dương riêng cho dashboard) */
                        primarydb: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6', // xanh dương sáng
                            600: '#2563eb', // xanh dương đậm
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                    },

                    fontFamily: {
                        alata: ["Alata", "sans-serif"],
                        "cal-sans": ["Cal Sans", "sans-serif"],
                        "league-spartan": ["League Spartan", "sans-serif"],
                        lexend: ["Lexend", "sans-serif"],
                        questrial: ["Questrial", "sans-serif"],
                    },
                },
            },
        };
    </script>

    <!-- Google Identity Services -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
        window.googleClientId = '892127432562-io675ljvjp8tpo4cv76hu4j1g003d4bn.apps.googleusercontent.com';
    </script>
    <title>wppricot &#8211; WordPress site created automatically</title>
    <meta name='robots' content='noindex, nofollow' />
    <style>
        img:is([sizes="auto" i], [sizes^="auto," i]) {
            contain-intrinsic-size: 3000px 1500px
        }
    </style>
    <link rel="alternate" type="application/rss+xml" title="wppricot &raquo; Feed" href="https://dev.wptheme.store/s/wppricot/feed/" />
    <link rel="alternate" type="application/rss+xml" title="wppricot &raquo; Comments Feed" href="https://dev.wptheme.store/s/wppricot/comments/feed/" />
    <script type="text/javascript">
        /* <![CDATA[ */
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/16.0.1\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/16.0.1\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/dev.wptheme.store\/s\/wppricot\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.8.3"
            }
        };
        /*! This file is auto-generated */
        ! function(s, n) {
            var o, i, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e,
                        timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                    a = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === a[t]
                })
            }

            function u(e, t) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                for (var n = e.getImageData(16, 16, 1, 1), a = 0; a < n.data.length; a++)
                    if (0 !== n.data[a]) return !1;
                return !0
            }

            function f(e, t, n, a) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\udde8\ud83c\uddf6", "\ud83c\udde8\u200b\ud83c\uddf6") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");
                    case "emoji":
                        return !a(e, "\ud83e\udedf")
                }
                return !1
            }

            function g(e, t, n, a) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : s.createElement("canvas"),
                    o = r.getContext("2d", {
                        willReadFrequently: !0
                    }),
                    i = (o.textBaseline = "top", o.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    i[e] = t(o, e, n, a)
                }), i
            }

            function t(e) {
                var t = s.createElement("script");
                t.src = e, t.defer = !0, s.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", i = ["flag", "emoji"], n.supports = {
                everything: !0,
                everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                s.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + g.toString() + "(" + [JSON.stringify(i), f.toString(), p.toString(), u.toString()].join(",") + "));",
                            a = new Blob([e], {
                                type: "text/javascript"
                            }),
                            r = new Worker(URL.createObjectURL(a), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(r.onmessage = function(e) {
                            c(n = e.data), r.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = g(i, f, p, u))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function() {
                    n.DOMReady = !0
                }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
        /* ]]> */
    </script>
    <style id='wp-emoji-styles-inline-css' type='text/css'>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>


</head>

<body class="font-lexend bg-gray-50">

    <!-- ================= HEADER (Tailwind + Font Awesome) ================= -->
    <header class="sticky top-0 z-50 shadow-lg bg-white/95 backdrop-blur-md">
        <div class="container px-4 py-2 mx-auto">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="<?= BASE_URL ?>" class="inline-block"><img src="<?= BASE_URL ?>assets/images/logo.png" style="max-height:60px;" alt="" class="h-20"></a> <!-- Navigation Menu - Desktop -->
                <?php
                $current = $_SERVER['REQUEST_URI']; // Lấy đường dẫn hiện tại
                ?>

                <nav class="items-center hidden space-x-1 lg:flex">
                    <!-- HOME -->
                    <a href="<?= BASE_URL ?>"
                        class="flex items-center px-4 py-3 space-x-2 font-medium transition-all duration-300 rounded-full group 
     <?= $current === '/FoodMartLab/' ? 'text-brand-primary bg-brand-light' : 'text-gray-700 hover:text-brand-primary hover:bg-brand-light' ?>">
                        <i class="text-sm transition-transform fas fa-home group-hover:scale-110"></i>
                        <span>Home</span>
                    </a>

                    <!-- GIỚI THIỆU -->
                    <a href="<?= BASE_URL ?>pages/about"
                        class="flex items-center px-4 py-3 space-x-2 font-medium transition-all duration-300 rounded-full group 
     <?= str_contains($current, '/pages/about') ? 'text-brand-primary bg-brand-light' : 'text-gray-700 hover:text-brand-primary hover:bg-brand-light' ?>">
                        <span>Giới thiệu</span>
                    </a>

                    <!-- SẢN PHẨM -->
                    <a href="<?= BASE_URL ?>shop/index"
                        class="flex items-center px-4 py-3 space-x-2 font-medium transition-all duration-300 rounded-full group 
     <?= str_contains($current, '/shop') ? 'text-brand-primary bg-brand-light' : 'text-gray-700 hover:text-brand-primary hover:bg-brand-light' ?>">
                        <span>Sản Phẩm</span>
                    </a>
                    <!-- TIN TỨC -->
                    <a href="<?= BASE_URL ?>blog"
                        class="flex items-center px-4 py-3 space-x-2 font-medium transition-all duration-300 rounded-full group 
     <?= str_contains($current, '/blog') ? 'text-brand-primary bg-brand-light' : 'text-gray-700 hover:text-brand-primary hover:bg-brand-light' ?>">
                        <span>Tin tức</span>
                    </a>

                    <!-- LIÊN HỆ -->
                    <a href="<?= BASE_URL ?>pages/contact"
                        class="flex items-center px-4 py-3 space-x-2 font-medium transition-all duration-300 rounded-full group 
     <?= str_contains($current, '/pages/contact') ? 'text-brand-primary bg-brand-light' : 'text-gray-700 hover:text-brand-primary hover:bg-brand-light' ?>">
                        <span>Liên hệ</span>
                    </a>
                </nav>


                <!-- Search & Cart Section -->
                <div class="flex items-center space-x-4">
                    <!-- Search Bar -->
                    <div class="flex-1 max-w-lg mx-3 md:mx-6">
                        <div class="relative">
                            <!-- Mobile: Chỉ hiện icon search -->
                            <div class="block md:hidden">
                                <button class="flex items-center justify-center w-10 h-10 transition-all duration-300 rounded-full text-brand-primary bg-brand-light/30 hover:bg-brand-light/50" id="mobile-search-toggle" fdprocessedid="biszeb">
                                    <i class="text-sm fas fa-search"></i>
                                </button>
                            </div>

                            <!-- Desktop: Hiện full search box -->
                            <div class="hidden md:block">
                                <input type="text" id="autocomplete-search" placeholder="Tìm kiếm..." class="w-full px-5 py-2 pr-12 text-gray-700 placeholder-gray-500 transition-all duration-300 rounded-full outline-none bg-brand-light/30 hover:bg-brand-light/50 focus:bg-brand-light/50 font-questrial" data-limit="10" autocomplete="off" fdprocessedid="mkdxps">
                                <button class="absolute flex items-center justify-center w-6 h-6 transition-colors transform -translate-y-1/2 rounded-full right-3 top-1/2 text-brand-primary hover:text-brand-primary/80" fdprocessedid="xzqz2">
                                    <i class="text-sm fas fa-search"></i>
                                </button>

                                <!-- Results Container -->
                                <div class="absolute left-0 right-0 z-50 hidden w-full mt-1 overflow-y-auto bg-white shadow-lg rounded-xl max-h-96" id="autocomplete-results"></div>

                                <!-- Loading Indicator -->
                                <div class="absolute left-0 right-0 z-50 hidden w-full mt-1 bg-white rounded-full shadow-lg" id="autocomplete-loading">
                                    <div class="flex items-center justify-center p-4">
                                        <svg class="w-5 h-5 mr-3 -ml-1 animate-spin text-brand-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span class="text-gray-500">Đang tìm kiếm...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Cart Icon -->
                    <!-- Account Dropdown -->
                    <div class="relative group">
                        <?php include view_path('site/account/sidebar_user.php'); ?>
                    </div>

                    <!-- Mini Cart -->
                    <div class="relative">
                        <!-- Cart Button -->
                        <button onclick="toggleMiniCart()" class="relative flex items-center justify-center font-semibold text-green-800 transition-all duration-300 bg-green-100 rounded-full shadow-lg w-9 h-9 md:px-4 hover:bg-brand-primary hover:text-white hover:shadow-xl" fdprocessedid="ngx4w6">
                            <i class="text-xs fas fa-shopping-cart"></i>

                            <!-- Cart Count Badge -->
                            <span id="cart-count-badge" class="absolute flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-600 rounded-full shadow-md cart-count -top-1 -right-1"><?= $totalQty ?: 0 ?></span>
                        </button>

                        <!-- Mini Cart Dropdown -->
                        <div id="mini-cart" class="absolute right-0 z-50 hidden mt-2 bg-white rounded-lg shadow-lg top-full w-80">

                            <!-- Cart Header -->
                            <div class="px-4 py-3 bg-gray-100 rounded-t-lg">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold text-gray-900">Giỏ hàng</h3>
                                    <button onclick="closeMiniCart()" class="text-gray-400 hover:text-gray-600">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Cart Items -->
                            <div id="mini-cart-items" class="overflow-y-auto max-h-64">
                                <?php if (!empty($cart)): ?>
                                    <?php foreach ($cart as $item): ?>
                                        <div class="flex items-center justify-between p-3 border-b border-gray-100">
                                            <div class="flex items-center gap-3">
                                                <img src="<?= BASE_URL ?>assets/images/<?= htmlspecialchars($item['image']) ?>"
                                                    alt="<?= htmlspecialchars($item['name']) ?>"
                                                    class="w-12 h-12 rounded object-cover">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($item['name']) ?></p>
                                                    <p class="text-xs text-gray-500"><?= number_format($item['price'], 0, ',', '.') ?> đ</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <button class="text-gray-500 hover:text-gray-700 cart-minus" data-id="<?= $item['id'] ?>">−</button>
                                                <input type="text" value="<?= $item['qty'] ?>" data-id="<?= $item['id'] ?>"
                                                    class="cart-qty-input w-10 text-center border rounded">
                                                <button class="text-gray-500 hover:text-gray-700 cart-plus" data-id="<?= $item['id'] ?>">+</button>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="px-4 py-8 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                                        </svg>
                                        <p class="text-gray-500">Your cart is empty</p>
                                        <a href="<?= BASE_URL ?>shop" class="inline-block mt-4 bg-green-600 text-white rounded-full px-3 py-2 hover:bg-green-700 text-sm font-medium">
                                            Start Shopping
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Cart Footer -->
                            <div id="mini-cart-footer" class="<?= !empty($cart) ? 'px-4 py-3 bg-gray-100 rounded-b-lg' : 'hidden px-4 py-3 bg-gray-100 rounded-b-lg' ?>">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-sm font-medium text-gray-600">Tổng cộng:</span>
                                    <span id="mini-cart-total" class="text-lg font-bold text-primary"><?= number_format($total, 0, ',', '.') ?> ₫</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="<?= BASE_URL ?>cart/index" class="flex-1 px-4 py-2 text-sm font-medium text-center text-white transition-colors duration-200 rounded-md bg-brand-secondary hover:bg-orange-600">
                                        Xem giỏ hàng </a>
                                    <a href="<?= BASE_URL ?>checkout/index" class="flex-1 px-4 py-2 text-sm font-medium text-center text-white transition-colors duration-200 rounded-md bg-brand-secondary hover:bg-brand-primary">
                                        Thanh toán </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="flex items-center justify-center w-10 h-10 text-gray-700 transition-colors rounded-full lg:hidden hover:text-brand-primary hover:bg-brand-light" id="mobile-menu-btn" fdprocessedid="basvh">
                        <i class="text-xl fas fa-bars"></i>
                    </button>
                </div>
            </div>

        </div>
    </header>

    <script>
        /**
         * Mini Cart Toggle Logic (Tailwind + Vanilla JS)
         * ----------------------------------------------
         * - Show/hide mini cart dropdown when clicking the cart button
         * - Close when clicking outside or pressing the close button
         * - Works even if header is re-rendered dynamically
         */

        // Toggle mini cart visibility
        function toggleMiniCart() {
            const miniCart = document.getElementById('mini-cart');
            if (!miniCart) return;

            miniCart.classList.toggle('hidden'); // show/hide dropdown

            // Optional: smooth opening animation
            if (!miniCart.classList.contains('hidden')) {
                miniCart.classList.add('animate-fadeIn');
            } else {
                miniCart.classList.remove('animate-fadeIn');
            }
        }

        // Explicit close mini cart
        function closeMiniCart() {
            const miniCart = document.getElementById('mini-cart');
            if (!miniCart) return;
            miniCart.classList.add('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const miniCart = document.getElementById('mini-cart');
            const cartBtn = event.target.closest('[onclick="toggleMiniCart()"]');
            if (!miniCart) return;

            // Nếu click ngoài dropdown & không phải nút toggle → đóng
            if (!miniCart.contains(event.target) && !cartBtn) {
                miniCart.classList.add('hidden');
            }
        });

        // Optional: thêm animation CSS vào Tailwind
        document.addEventListener('DOMContentLoaded', function() {
            const style = document.createElement('style');
            style.innerHTML = `
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.25s ease-out;
    }
  `;
            document.head.appendChild(style);
        });
    </script>