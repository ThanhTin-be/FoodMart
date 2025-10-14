<?php

/**
 * Dashboard Layout – dùng chung cho tất cả các trang trong khu vực account.
 * Biến yêu cầu:
 *   - $pageTitle: tiêu đề breadcrumb (vd: “Orders”, “Profile”)
 *   - $content: phần nội dung riêng từng trang (HTML)
 */
?>
<div class="min-h-screen">

    <!-- Tabs Navigation -->
    <?php include __DIR__ . '/../partials/dashboard-nav.php'; ?>

    <!-- Quick Actions -->
    <?php include __DIR__ . '/../partials/dashboard-quick-actions.php'; ?>

    <!-- Nội dung trang -->
    <div class="max-w-6xl p-6 mx-auto">
        <?= $content ?>
    </div>

</div>