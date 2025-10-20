<?php
require_once ROOT . "models/BlogModel.php";
$blogModel = new BlogModel();

// Lấy chuyên mục + số bài viết
$categories = $blogModel->conn->query("
    SELECT category, COUNT(*) as total 
    FROM blogs 
    GROUP BY category 
    ORDER BY total DESC
")->fetch_all(MYSQLI_ASSOC);

// Lấy 4 bài viết nổi bật mới nhất
$featured = $blogModel->getBlogs(4, 0);
?>

<!-- sidebar hiển thị featured post cho trang about + contact -->
<div class="lg:col-span-1">
    <div class="py-4 space-y-4">
        <!-- Chuyên mục - Badge Style Title -->
        <div class="group">
            <div class="transition-all duration-300 shadow-lg bg-gradient-to-br from-white to-gray-50 rounded-2xl backdrop-blur-sm hover:shadow-xl">
                <div class="p-4 bg-gray-100 rounded-t-2xl">
                    <h3 class="pr-8 text-xl font-bold text-gray-800">Chuyên mục</h3>
                    <p class="mt-2 text-sm text-gray-600">Chuyên mục nhiều bài viết hay nhất</p>
                </div>

                <ul class="p-4 space-y-3">
                    <?php foreach ($categories as $cat): ?>
                        <li>
                            <a href="<?= BASE_URL ?>blog/category/<?= urlencode($cat['category']) ?>"
                                class="flex items-center justify-between p-3 transition-all duration-300 group/item rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-green-100 hover:shadow-md">
                                <span class="flex items-center">
                                    <div class="flex items-center justify-center w-8 h-8 mr-3 transition-transform duration-300 rounded-lg bg-gradient-to-br from-green-400 to-green-500 group-hover/item:scale-110">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9 3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-700 transition-colors duration-300 group-hover/item:text-green-600">
                                        <?= htmlspecialchars($cat['category']) ?>
                                    </span>
                                </span>
                                <span class="px-3 py-1 text-xs font-bold text-green-700 rounded-full shadow-sm bg-gradient-to-r from-green-100 to-green-200">
                                    <?= $cat['total'] ?>
                                </span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Bài viết mới - Underline Animation Title -->
        <div class="overflow-hidden bg-white shadow-sm rounded-xl">
            <div class="p-4 bg-gray-100 rounded-t-2xl">
                <h3 class="pr-8 text-xl font-bold text-gray-800">Bài viết nổi bật</h3>
                <p class="mt-2 text-sm text-gray-600">Danh sách những bài viết hay nhất</p>
            </div>

            <!-- Articles List -->
            <div class="divide-y divide-gray-100">
                <?php foreach ($featured as $b): ?>
                    <article class="group">
                        <a href="<?= BASE_URL ?>blog/detail/<?= $b['id'] ?>"
                            class="block px-4 py-3 transition-colors hover:bg-gray-50">
                            <div class="flex items-start gap-3">
                                <img src="<?= htmlspecialchars($b['thumbnail']) ?>"
                                    alt="<?= htmlspecialchars($b['title']) ?>"
                                    class="flex-shrink-0 object-cover w-12 h-12 transition-shadow rounded-lg group-hover:shadow-md">
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-medium text-gray-900 transition-colors line-clamp-2 group-hover:text-green-600">
                                        <?= htmlspecialchars($b['title']) ?>
                                    </h4>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs text-gray-500"><?= htmlspecialchars($b['author'] ?? 'Admin') ?></span>
                                        <span class="text-xs font-medium text-green-600"><?= htmlspecialchars($b['category']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>