<?php

/**
 * Page Header gradient cho mỗi trang con.
 * Biến yêu cầu:
 *   - $icon (SVG code)
 *   - $title (chuỗi)
 *   - $subtitle (chuỗi mô tả)
 *   - $color (primary, green, purple, ...)
 */
?>
<div class="p-8 text-white shadow-sm bg-gradient-to-r from-<?= $color ?>-500 to-<?= $color ?>-600 dark:from-<?= $color ?>-600 dark:to-<?= $color ?>-700 rounded-xl">
    <div class="flex flex-col items-start justify-between md:flex-row md:items-center">
        <div>
            <h1 class="flex items-center mb-2 text-3xl font-bold">
                <div class="flex items-center justify-center w-10 h-10 mr-4 rounded-lg bg-white/20">
                    <?= $icon ?>
                </div>
                <?= htmlspecialchars($title) ?>
            </h1>
            <p class="text-lg text-white/90"><?= htmlspecialchars($subtitle) ?></p>
        </div>
    </div>
</div>