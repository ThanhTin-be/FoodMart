;(function ($) {
  'use strict'

  // Preloader
  var initPreloader = function () {
    $('body').addClass('preloader-site')
    $(window).on('load', function () {
      $('.preloader-wrapper').fadeOut('slow')
      $('body').removeClass('preloader-site')
    })

    // fallback nếu ảnh lỗi không load
    setTimeout(function () {
      if ($('.preloader-wrapper').is(':visible')) {
        $('.preloader-wrapper').fadeOut('slow')
        $('body').removeClass('preloader-site')
      }
    }, 3000)
  }

  // Lightbox Chocolat
  var initChocolat = function () {
    if ($('.image-link').length) {
      Chocolat(document.querySelectorAll('.image-link'), {
        imageSize: 'contain',
        loop: true
      })
    }
  }

  // Swiper sliders
  var initSwiper = function () {
    // Banner chính
    new Swiper('.main-swiper', {
      speed: 500,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      }
    })

    // Category slider
    new Swiper('.category-carousel', {
      slidesPerView: 6,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: '.category-carousel-next',
        prevEl: '.category-carousel-prev'
      },
      breakpoints: {
        0: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        991: { slidesPerView: 4 },
        1500: { slidesPerView: 6 }
      }
    })

    // Brand slider
    new Swiper('.brand-carousel', {
      slidesPerView: 4,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: '.brand-carousel-next',
        prevEl: '.brand-carousel-prev'
      },
      breakpoints: {
        0: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        991: { slidesPerView: 3 },
        1500: { slidesPerView: 4 }
      }
    })

    // 🔥 Products sliders theo category (id riêng cho từng section)
    $('.products-carousel').each(function () {
      var $el = $(this)
      var slug = $el.attr('id').replace('swiper-', '')

      new Swiper(this, {
        slidesPerView: 5,
        spaceBetween: 30,
        speed: 500,
        navigation: {
          nextEl: '#next-' + slug,
          prevEl: '#prev-' + slug
        },
        breakpoints: {
          320: { slidesPerView: 2 },
          768: { slidesPerView: 3 },
          991: { slidesPerView: 4 },
          1500: { slidesPerView: 6 }
        }
      })
    })

    new Swiper('#related-carousel', {
      slidesPerView: 2,
      spaceBetween: 15,
      navigation: {
        nextEl: '.related-carousel-next',
        prevEl: '.related-carousel-prev'
      },
      loop: true, // Cho phép quay vòng
      breakpoints: {
        768: { slidesPerView: 3 },
        1024: { slidesPerView: 5 }
      }
    })

    // Thumbnail slider
    var thumb_slider = new Swiper('.product-thumbnail-slider', {
      slidesPerView: 5,
      spaceBetween: 20,
      direction: 'vertical',
      breakpoints: {
        0: { direction: 'horizontal' },
        992: { direction: 'vertical' }
      }
    })

    // Large image slider (kết hợp với thumbnails)
    new Swiper('.product-large-slider', {
      slidesPerView: 2,
      spaceBetween: 0,
      effect: 'fade',
      thumbs: { swiper: thumb_slider },
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      }
    })
  }

  // Input spinner (quantity)
  var initProductQty = function () {
    $('.product-qty').each(function () {
      var $el_product = $(this)
      var $input = $el_product.find('input[name="quantity"]')

      $el_product.find('.quantity-right-plus').click(function (e) {
        e.preventDefault()
        var quantity = parseInt($input.val()) || 0
        $input.val(quantity + 1)
      })

      $el_product.find('.quantity-left-minus').click(function (e) {
        e.preventDefault()
        var quantity = parseInt($input.val()) || 0
        if (quantity > 1) {
          $input.val(quantity - 1)
        }
      })
    })
  }

  // Parallax
  var initJarallax = function () {
    if (typeof jarallax !== 'undefined') {
      jarallax(document.querySelectorAll('.jarallax'))
      jarallax(document.querySelectorAll('.jarallax-keep-img'), {
        keepImg: true
      })
    }
  }

  // Document ready
  $(document).ready(function () {
    initPreloader()
    initSwiper()
    initProductQty()
    initJarallax()
    initChocolat()
  })
})(jQuery)
