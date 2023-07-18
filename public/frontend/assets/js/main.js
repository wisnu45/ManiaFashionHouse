(function ($) {
    "use strict";
    // stike manu
    // $(window).on('scroll',function() {
    //     var scroll = $(window).scrollTop();
    //     if (scroll < 100) {
    //      $(".header-scroll").removeClass("scroll-header");
    //     }else{
    //      $(".header-scroll").addClass("scroll-header");
    //     }
    //    });
    // top-search-bar

    // payment method
    let bkash_radio = document.getElementById('Bkash');
    let bkash_id = document.querySelector('.bkash_id')

    let payment_method = document.querySelectorAll('.pm_method')

    payment_method.forEach(function(pm){
        pm.addEventListener('change',function(e){

            if(pm.value=='Bkash'){
                bkash_id.classList.add('bkash_id_block');
            }else{
                bkash_id.classList.remove('bkash_id_block');
            }
        })
    })




    // payment method





    $('.my-profile').on("click", function () {
        $('.responsive-user-list').addClass('responsive-user-list-zero');
    });
    $('.cross').on("click", function () {
        $('.responsive-user-list').removeClass('responsive-user-list-zero');
    });

    // top-search-bar
    $('.shop-icon').on("click", function () {
        $('.responsive-shop-items-details').addClass('responsive-shop-items-details-zero');
    });
    $('.cross').on("click", function () {
        $('.responsive-shop-items-details').removeClass('responsive-shop-items-details-zero');
    });

    // top-search-bar
    $('.search-bar').on("click", function () {
        $('.searh-bar-top').addClass('searh-menu-main-top');
    });
    $('.cross').on("click", function () {
        $('.searh-bar-top').removeClass('searh-menu-main-top');
    });

    // shoting-jq

    $(document).ready(function () {
        $("#toggle-btn").click(function () {
            $("#toggle-example").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn2").click(function () {
            $("#toggle-example2").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn3").click(function () {
            $("#toggle-example3").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn4").click(function () {
            $("#toggle-example4").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn5").click(function () {
            $("#toggle-example5").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn11").click(function () {
            $("#toggle-example11").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn12").click(function () {
            $("#toggle-example12").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn13").click(function () {
            $("#toggle-example13").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn14").click(function () {
            $("#toggle-example14").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn15").click(function () {
            $("#toggle-example15").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn15").click(function () {
            $("#toggle-example15").collapse('toggle'); // toggle collapse
        });
    });
    $(document).ready(function () {
        $("#toggle-btn16").click(function () {
            $("#toggle-example16").collapse('toggle'); // toggle collapse
        });
    });

    // listing-js-activation
    $(document).ready(function () {
        $('.select').niceSelect();
    });
    // listing-js-activation
    $(document).ready(function () {
        $('.quick-select').niceSelect();
    });

    // filter j active
    $('.add-filter').on("click", function () {
        $('.filter-side-bar-wrapper').addClass('filter-side-bar-wrapper-zero');
    });
    $('.close-filter-side-bar').on("click", function () {
        $('.filter-side-bar-wrapper').removeClass('filter-side-bar-wrapper-zero');
    });
    $('.add-filter').on("click", function () {
        $('.filter-side-bar-wrapper').addClass('filter-side-bar-wrapper-zero');
    });
    $('.close-filter-side-bar').on("click", function () {
        $('.filter-side-bar-wrapper').removeClass('filter-side-bar-wrapper-zero');
    });

    // wishlist-quantity-section-counter
    $('.btn-plus, .btn-minus').on('click', function (e) {
        const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
        const input = $(e.target).closest('.input-group').find('input');
        if (input.is('input')) {
            input[0][isNegative ? 'stepDown' : 'stepUp']()
            input[0].value
        }
    });
    // meanmenu
    // $('#mobile-menu').meanmenu({
    // 	meanMenuContainer: '.mobile-menu',
    // 	meanScreenWidth: "992"
    // });

    // top-search-bar
    $('.search-bar').on("click", function () {
        $('.searh-bar-top').addClass('searh-menu-main-top');
    });
    $('.cross').on("click", function () {
        $('.searh-bar-top').removeClass('searh-menu-main-top');
    });




    /* magnificPopup img view */
    $('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    // mobile -menu
    $(document).ready(function () {
        ma5menu({
            menu: '.site-menu',
            activeClass: 'active',
            footer: '#ma5menu-tools',
            position: 'left',
            closeOnBodyClick: true
        });
    });

    // isotop
    $('.grid').imagesLoaded(function () {
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: 1.5,
            }
        });
    });


    // portfolio active
    var grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: 1.5,
        }
    });

    $('.prothfolio-isotop-manu').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        grid.isotope({
            filter: filterValue
        });
    });

    //for portfolio menu active class
    $('.prothfolio-isotop-manu button').on('click', function (event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });




    // scrollToTop
    $.scrollUp({
        scrollName: 'scrollUp', // Element ID
        topDistance: '300', // Distance from top before showing element (px)
        topSpeed: 300, // Speed back to top (ms)
        animation: 'fade', // Fade, slide, none
        animationInSpeed: 200, // Animation in speed (ms)
        animationOutSpeed: 200, // Animation out speed (ms)
        scrollText: '<i class="fas fa-angle-up"></i>', // Text for element
        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });


    // product-image-changing
    // $('.smail_thamb-img ul#thumbs li > a').on('click', function () {
    //     $('#thumbs li a').removeClass("active");
    //     $(this).addClass("active");
    // });
    // $('#thumbs').on('click', 'a', function (event) {
    //     $('#image').attr('src', this.href);
    //     $('#caption').html($(this).data('caption'));

    //     return false;

    // });
    let thumb = document.querySelectorAll('.thumbs a');


thumb.forEach(function(th,index){
    th.addEventListener('click',function(event){
        event.preventDefault();
        let href = this.getAttribute('href');
        let im = event.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.firstElementChild.firstElementChild.firstElementChild.firstElementChild
        im.setAttribute('src',href);

    })
})

    //
    $('.bar').on("click", function () {
        $('.btn-menu-main').addClass('btn-menu-main-right');
    });
    $('.crose').on("click", function () {
        $('.btn-menu-main').removeClass('btn-menu-main-right');
    });

    $(".mega-menu-slider02").slick({
        speed: 1000,
        dots: false,
        autoplay: true,
        autoplaySpeed: 500,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>'
    });
    $(".mega-menu-slider").slick({
        speed: 1000,
        dots: false,
        autoplay: true,
        autoplaySpeed: 500,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>'
    });
    // $(".owl-carousel").slick({
    //     speed: 1000,
    //     dots: false,
    //     autoplay: true,
    //     autoplaySpeed: 500,
    //     prevArrow: '<button class="slide-arrow prev-arrow"></button>',
    //     nextArrow: '<button class="slide-arrow next-arrow"></button>'
    // });

    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 245) {
            $(".header-sticky").removeClass("sticky");
        } else {
            $(".header-sticky").addClass("sticky");
        }
    });

    // slider - active
    function mainSlider() {
        var BasicSlider = $('.slider-active');

        BasicSlider.on('init', function (e, slick) {
            // ei-jayay-singel-slide-name ta chane korte hobe
            var $firstAnimatingElements = $('.singel-slider:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });

        BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.singel-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });

        BasicSlider.slick({
            autoplay: false,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: false,
            responsive: [{
                breakpoint: 767,
                settings: {
                    dots: false,
                    arrows: false
                }
            }]
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function () {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                });
            });
        }
    }
    mainSlider();

    // Quick view carousel
    $('.quick-view-left').owlCarousel({
        loop:true,
        margin:10,
        navText:['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
                loop:false
            }
        }
    })

})(jQuery);
