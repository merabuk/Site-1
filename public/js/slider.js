(()=>{var s={infinite:!0,slidesToShow:3,slidesToScroll:1,autoplay:!0,autoplaySpeed:5e3,pauseOnHover:!1,responsive:[{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:1,autoplay:!0,autoplaySpeed:5e3}},{breakpoint:767,settings:{slidesToShow:1,slidesToScroll:1,autoplay:!0,autoplaySpeed:5e3,dots:!0}}]};$(".slider-sale").slick(s),$("#myTab-sale").on("shown.bs.tab",(function(e){$(".slider-sale").hasClass("slick-initialized")&&$(".slider-sale").slick("destroy"),$(".slider-sale").slick(s)})),$(".slider-brand").slick({infinite:!0,slidesToShow:4,slidesToScroll:1,autoplay:!0,pauseOnHover:!1,autoplaySpeed:5e3,responsive:[{breakpoint:767,settings:{slidesToShow:2,slidesToScroll:1,autoplay:!0,autoplaySpeed:5e3}}]});var e={infinite:!1,pauseOnHover:!1,mobileFirst:!0,adaptiveHeight:!0,responsive:[{breakpoint:320,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:992,settings:"unslick"}]},i=$(".brand-wrapper > .pills-wrapper > .nav");window.innerWidth<992&&i.slick(e),$('.pills-wrapper > .nav-pills a[data-toggle="tab"]').on("show.bs.tab",(function(s){$('.pills-wrapper > .nav-pills a[data-toggle="tab"]:not(#'+s.target.id+")").removeClass("active")})),$(".slider-photo-brand").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,autoplay:!0,pauseOnHover:!1,autoplaySpeed:5e3,mobileFirst:!0,responsive:[{breakpoint:767,settings:"unslick"}]}),$(window).resize((function(){window.innerWidth<992&&!1===i.hasClass("slick-initialized")&&(i.slick(e),$('.pills-wrapper > .nav-pills a[data-toggle="tab"]').on("show.bs.tab",(function(s){$('.pills-wrapper > .nav-pills a[data-toggle="tab"]:not(#'+s.target.id+")").removeClass("active")}))),window.innerWidth<768&&!1===$(".slider-photo-brand").hasClass("slick-initialized")&&$(".slider-photo-brand").slick({infinite:!0,slidesToShow:1,slidesToScroll:1,autoplay:!0,pauseOnHover:!1,autoplaySpeed:5e3,mobileFirst:!0,responsive:[{breakpoint:767,settings:"unslick"}]})})),$(".slider-banner").slick({infinite:!0,slidesToShow:3,slidesToScroll:1,autoplay:!0,autoplaySpeed:5e3,dots:!0,pauseOnHover:!1,arrows:!1,responsive:[{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:1,autoplay:!0,autoplaySpeed:5e3}},{breakpoint:767,settings:{slidesToShow:1,slidesToScroll:1,autoplay:!0,autoplaySpeed:5e3}}]}),$(".slider-for").slick({slidesToShow:1,slidesToScroll:1,arrows:!0,prevArrow:'<button class="slick-prev slick-arrow d-lg-none" aria-label="Previous" type="button" style="">Previous</button>',nextArrow:'<button class="slick-next slick-arrow d-lg-none" aria-label="Next" type="button" style="">Next</button>',dots:!0,dotsClass:"slick-dots dots-lg-hide",asNavFor:".slider-nav"}),$(".slider-nav").slick({slidesToShow:3,slidesToScroll:1,vertical:!0,asNavFor:".slider-for",dots:!1,arrows:!1,focusOnSelect:!0,verticalSwiping:!0,responsive:[{breakpoint:991,slidesToShow:3,slidesToScroll:1,settings:{vertical:!1}}]}),$(".btn-ordering").click((function(){$("#section-ordering").addClass("d-block")})),$("#button-info").click((function(){$("#button-info .block").toggle("slow",(function(){}))}));var o=$("#button-info");$(window).scroll((function(){$(window).scrollTop()>300?o.addClass("show"):o.removeClass("show")})),$(".block-mini-cart").click((function(){$(".block-mini-cart .mini-cart").toggle()})),$(".single-welcome").slick()})();