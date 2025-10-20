<div class="container px-4 py-4 mx-auto">

    <div class="mb-8">
        <h1 class="mb-4 text-3xl font-bold text-gray-900">Tin tức</h1>
        <div class="text-gray-600">
            <p class="mb-4 leading-relaxed">The description is not prominent by default; however, some themes may show it.</p>
        </div>
    </div>

    <div id="posts-container" class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($blogs as $blog): ?>
            <article class="overflow-hidden transition-all duration-500 bg-white shadow-lg rounded-3xl hover:shadow-2xl group">
                <div class="relative overflow-hidden">
                    <img width="300" height="199" src="<?= $blog['thumbnail'] ?>" class="object-cover w-full h-48 transition-transform duration-500 group-hover:scale-110 wp-post-image" alt="<?= htmlspecialchars($blog['title']) ?>" decoding="async">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 text-xs font-medium text-white rounded-full bg-yellow-500"><?= htmlspecialchars($blog['category']) ?></span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-3 space-x-2">
                        <span class="text-sm text-gray-500"><?= date("d F, Y", strtotime($blog['created_at'])) ?></span>
                        <span class="text-gray-300">•</span>
                        <span class="text-sm text-gray-500">6 phút đọc</span>
                    </div>
                    <h4 class="mb-3 text-xl font-bold transition-colors cursor-pointer text-brand-darker font-league-spartan group-hover:text-brand-primary">
                        <a href="<?= BASE_URL ?>blog/detail/<?= $blog['id'] ?>" class="hover:text-brand-primary"><?= htmlspecialchars($blog['title']) ?></a>
                    </h4>
                    <p class="mb-4 leading-relaxed text-gray-600 font-questrial"><?= htmlspecialchars($blog['excerpt']) ?></p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <i class="text-gray-400 fas fa-eye"></i>
                            <span class="text-sm text-gray-500">4.7K lượt xem</span>
                        </div>
                        <a href="<?= BASE_URL ?>blog/detail/<?= $blog['id'] ?>" class="font-medium transition-colors text-brand-primary hover:text-brand-dark">
                            Đọc thêm
                            <i class="ml-1 fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <div class="flex justify-center mt-12">
        <?php
        // Kiểm tra đã load hết hay chưa
        $disabled = ($blogTotal <= $limit) ? 'disabled' : '';
        $btnClass = ($blogTotal <= $limit)
            ? 'opacity-50 cursor-not-allowed bg-green-400 hover:from-green-500 hover:to-green-400'
            : 'bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-500';
        ?>
        <button id="load-more-posts"
            class="inline-flex items-center px-6 py-3 text-sm font-medium text-white rounded-full <?= $btnClass ?>"
            data-page="1" data-limit="<?= $limit ?>" data-total="<?= $blogTotal ?>"
            <?= $disabled ?>>
            Xem thêm bài viết
        </button>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('load-more-posts');
        if (!btn) return;

        btn.addEventListener('click', function() {
            // Nếu đã disabled → không làm gì
            if (btn.disabled) return;

            let page = parseInt(btn.dataset.page) + 1;
            let limit = parseInt(btn.dataset.limit);
            let total = parseInt(btn.dataset.total);

            fetch('<?= BASE_URL ?>blog/loadMore', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `page=${page}&limit=${limit}`
                })
                .then(res => res.json())
                .then(data => {
                    if (data && data.length > 0) {
                        const container = document.getElementById('posts-container');
                        data.forEach(blog => {
                            const html = `
<article class="overflow-hidden transition-all duration-500 bg-white shadow-lg rounded-3xl hover:shadow-2xl group">
    <div class="relative overflow-hidden">
        <img width="300" height="199" src="${blog.thumbnail}" class="object-cover w-full h-48 transition-transform duration-500 group-hover:scale-110 wp-post-image" alt="${blog.title}" decoding="async">
        <div class="absolute top-4 left-4">
            <span class="px-3 py-1 text-xs font-medium text-white rounded-full bg-yellow-500">${blog.category}</span>
        </div>
    </div>
    <div class="p-6">
        <div class="flex items-center mb-3 space-x-2">
            <span class="text-sm text-gray-500">${new Date(blog.created_at).toLocaleDateString()}</span>
            <span class="text-gray-300">•</span>
            <span class="text-sm text-gray-500">6 phút đọc</span>
        </div>
        <h4 class="mb-3 text-xl font-bold transition-colors cursor-pointer text-brand-darker font-league-spartan group-hover:text-brand-primary">
            <a href="<?= BASE_URL ?>blog/detail/${blog.id}" class="hover:text-brand-primary">${blog.title}</a>
        </h4>
        <p class="mb-4 leading-relaxed text-gray-600 font-questrial">${blog.excerpt}</p>
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="text-gray-400 fas fa-eye"></i>
                <span class="text-sm text-gray-500">4.7K lượt xem</span>
            </div>
            <a href="<?= BASE_URL ?>blog/detail/${blog.id}" class="font-medium transition-colors text-brand-primary hover:text-brand-dark">
                Đọc thêm
                <i class="ml-1 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</article>`;
                            container.insertAdjacentHTML('beforeend', html);
                        });

                        btn.dataset.page = page;

                        // Nếu đã load hết → disable + màu nhạt
                        const loadedCount = container.children.length;
                        if (loadedCount >= total) {
                            btn.disabled = true;
                            btn.classList.remove('from-green-500', 'to-green-600', 'hover:from-green-600', 'hover:to-green-500');
                            btn.classList.add('opacity-50', 'cursor-not-allowed', 'bg-green-400');
                        }
                    } else {
                        btn.disabled = true;
                        btn.classList.remove('from-green-500', 'to-green-600', 'hover:from-green-600', 'hover:to-green-500');
                        btn.classList.add('opacity-50', 'cursor-not-allowed', 'bg-green-400');
                    }
                })
                .catch(err => console.error(err));
        });
    });
</script>