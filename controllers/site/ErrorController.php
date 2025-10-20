<?php
class ErrorController extends Controller
{
    public function notFound()
    {
        // echo "<pre>DEBUG ErrorController → notFound()</pre>";
        // Luôn gọi view 404 mà không kèm header/footer
        parent::view("errors/404", [], "none");
    }

    // ⚠️ Sau này nếu có admin 404 riêng thì thêm method:
    /*
    public function adminNotFound() {
        echo "<pre>DEBUG ErrorController → adminNotFound()</pre>";
        parent::view("errors/admin_404", [], "none");
    }
    */
}



// <script>

// document.addEventListener('DOMContentLoaded', function() {
//     const mobileSearchToggle = document.getElementById('mobile-search-toggle');
//     const mobileSearchOverlay = document.getElementById('mobile-search-overlay');
//     const closeMobileSearch = document.getElementById('close-mobile-search');
//     const mobileInput = document.getElementById('mobile-autocomplete-search');
//     const desktopInput = document.getElementById('autocomplete-search');
    
//     if (mobileSearchToggle) {
//         mobileSearchToggle.addEventListener('click', function() {
//             mobileSearchOverlay.classList.remove('hidden');
//             if (mobileInput) {
//                 mobileInput.focus();
//                 /** Sync value from desktop to mobile */
//                 if (desktopInput && desktopInput.value) {
//                     mobileInput.value = desktopInput.value;
//                 }
//             }
//         });
//     }
    
//     if (closeMobileSearch) {
//         closeMobileSearch.addEventListener('click', function() {
//             mobileSearchOverlay.classList.add('hidden');
//             /** Sync value from mobile to desktop */
//             if (mobileInput && desktopInput) {
//                 desktopInput.value = mobileInput.value;
//             }
//         });
//     }
    
//     if (mobileSearchOverlay) {
//         mobileSearchOverlay.addEventListener('click', function(e) {
//             if (e.target === mobileSearchOverlay) {
//                 mobileSearchOverlay.classList.add('hidden');
//                 if (mobileInput && desktopInput) {
//                     desktopInput.value = mobileInput.value;
//                 }
//             }
//         });
//     }
    
//     /** Apply same autocomplete logic to mobile input */
//     if (mobileInput && typeof initAutocomplete === 'function') {
//         initAutocomplete('mobile-autocomplete-search', 'mobile-autocomplete-results', 'mobile-autocomplete-loading');
//     }
// });
// </script>