let saleSlickConf = {
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,

    pauseOnHover: false,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
            }
        },
    ]
};
$('.slider-sale').slick(saleSlickConf);
$('#myTab-sale').on('shown.bs.tab', function (e) {
    if ($('.slider-sale').hasClass('slick-initialized')) {
        $('.slider-sale').slick('destroy');
    }

    $('.slider-sale').slick(saleSlickConf);
});

$('.slider-brand').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    pauseOnHover: false,
    autoplaySpeed: 5000,
    responsive: [{
        breakpoint: 767,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            // variableWidth: true,
        }
    }]
});
const brandConf = {
    infinite: false,
    pauseOnHover: false,
    mobileFirst: true,
    adaptiveHeight: true,
    responsive: [
        {
            breakpoint: 320,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 992,
            settings: "unslick"
        }
    ]
};
const brandWrapper = $('.brand-wrapper > .pills-wrapper > .nav');

if (window.innerWidth < 992) {
    brandWrapper.slick(brandConf);
}

$('.pills-wrapper > .nav-pills a[data-toggle="tab"]').on('show.bs.tab', function (e) {
    $('.pills-wrapper > .nav-pills a[data-toggle="tab"]:not(#'+e.target.id+')').removeClass('active');
});

$('.slider-photo-brand').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    pauseOnHover: false,
    autoplaySpeed: 5000,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 767,
            settings: 'unslick'
        },
    ]
});
$(window).resize(function () {
    if (window.innerWidth < 992) {
        if (false === brandWrapper.hasClass('slick-initialized')) {
            brandWrapper.slick(brandConf);
            $('.pills-wrapper > .nav-pills a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                $('.pills-wrapper > .nav-pills a[data-toggle="tab"]:not(#'+e.target.id+')').removeClass('active');
            });
        }
    }

    if (window.innerWidth < 768) {
        if (false === $('.slider-photo-brand').hasClass('slick-initialized')) {
            $('.slider-photo-brand').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                pauseOnHover: false,
                autoplaySpeed: 5000,
                mobileFirst: true,
                responsive: [
                    {
                        breakpoint: 767,
                        settings: 'unslick'
                    },
                ]
            });
        }
    }
});


$('.slider-banner').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnHover: false,
    arrows: false,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
            }
        },
    ]
});


$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<button class="slick-prev slick-arrow d-lg-none" aria-label="Previous" type="button" style="">Previous</button>',
    nextArrow: '<button class="slick-next slick-arrow d-lg-none" aria-label="Next" type="button" style="">Next</button>',
    dots: true,
    dotsClass: "slick-dots dots-lg-hide",
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    vertical:true,
    asNavFor: '.slider-for',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    verticalSwiping:true,
    responsive: [
        {
            breakpoint: 991,
            slidesToShow: 3,
            slidesToScroll: 1,
            settings: {
                vertical: false,
            }
        },
    ]
});

$('.btn-ordering').click(function (){
    $('#section-ordering').addClass('d-block');
})


// $( "#button-info" ).toggle();


$( "#button-info" ).click(function() {
    $( "#button-info .block" ).toggle( "slow", function() {
        // Animation complete.
    });
    // $( "#button-info .block" ).toggleClass('show');
});

var btn = $('#button-info');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

$( ".block-mini-cart" ).click(function() {
    $( ".block-mini-cart .mini-cart" ).toggle(); //("slow", function() {})
});


$('.single-welcome').slick();
