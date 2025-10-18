<div class="min-h-screen">
  <!-- Breadcrumb -->
  <nav class="px-5 py-3 mt-0 overflow-x-auto text-gray-700 bg-gray-50 scrollbar-hide" aria-label="Breadcrumb">
    <div class="px-0 mx-auto max-w-7xl md:px-4">
      <ol class="inline-flex items-center w-full max-w-screen-xl mx-auto space-x-1 md:space-x-2 rtl:space-x-reverse flex-nowrap min-w-max">
        <li class="inline-flex items-center flex-shrink-0"><a href="<?= BASE_URL ?>" class="inline-flex items-center text-sm font-medium text-gray-700 transition-colors hover:text-brand-primary"><svg class="w-3 h-3 me-2.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"></path>
            </svg>Trang chủ</a></li>
        <li class="flex-shrink-0">
          <div class="flex items-center whitespace-nowrap"><svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
            </svg><a href="<?= BASE_URL ?>blog" class="text-sm font-medium text-gray-700 transition-colors ms-1 hover:text-brand-primary md:ms-2">Tin tức</a></div>
        </li>
        <li aria-current="page" class="flex-shrink-0">
          <div class="flex items-center whitespace-nowrap"><svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
            </svg><a href="" class="text-sm font-medium text-gray-700 transition-colors ms-1 hover:text-brand-primary md:ms-2"><?= $blog['title'] ?></a></div>
        </li>
      </ol>
    </div>
  </nav>


  <!-- Main Content with Sidebar -->
  <div class="max-w-6xl px-4 pb-4 mx-auto">
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">

      <div class="lg:col-span-2">
        <h1 class="py-2 text-xl font-bold text-gray-800"><?= $blog['title'] ?></h1>
        <div class="mb-4 overflow-hidden text-gray-800 bg-white shadow-lg rounded-2xl">
          <div class="p-4">
            <div class="prose prose-lg max-w-none">
              <?= $blog['content'] ?>
            </div>
          </div>
        </div>
        <?php include_once view_path("site/partials/sidebar_info.php"); ?>
      </div>
    </div>
  </div>
</div>