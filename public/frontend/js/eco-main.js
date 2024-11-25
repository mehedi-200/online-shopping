// ================== Tab Auto Active ======================
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    };
});




 $(document).ready(function() {
    var owl = $('.owl-carousel-5');
    owl.owlCarousel({
        stagePadding: 2,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        loop:true,
        margin:20,
        autoPlay: 5000,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },

            992:{
                items:3
            },

            1024: {
                item: 4
            },

            1200:{
                items:5
            }
        }
    })

    $(".next").click(function(){
        owl.trigger('next.owl.carousel');
    })
    $(".prev").click(function(){
        owl.trigger('prev.owl.carousel');
    })
});


$(document).ready(function() {
    var owl = $('.owl-carousel-5-no-gutters');
    owl.owlCarousel({
        stagePadding: 2,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        loop:true,
        autoPlay: 5000,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },

            992:{
                items:3
            },

            1024: {
                item: 4
            },

            1200:{
                items:5
            }
        }
    })

    $(".next").click(function(){
        owl.trigger('next.owl.carousel');
    })
    $(".prev").click(function(){
        owl.trigger('prev.owl.carousel');
    })
});




$(document).ready(function() {
    var owl = $('.owl-carousel-4');
    owl.owlCarousel({
        stagePadding: 2,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        loop:true,
        margin:20,
        autoPlay: 5000,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },

            992:{
                items:3
            },

            1200:{
                items:4
            }
        }
    })

    $(".next").click(function(){
        owl.trigger('next.owl.carousel');
    })
    $(".prev").click(function(){
        owl.trigger('prev.owl.carousel');
    })
});


$(document).ready(function() {
    var owl = $('.owl-carousel-4-no-gutters');
    owl.owlCarousel({
        stagePadding: 2,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        loop:true,
        autoPlay: 5000,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },

            992:{
                items:3
            },

            1200:{
                items:4
            }
        }
    })

    $(".next").click(function(){
        owl.trigger('next.owl.carousel');
    })
    $(".prev").click(function(){
        owl.trigger('prev.owl.carousel');
    })
});


$(document).ready(function() {
    var owl = $('.owl-carousel-3');
    owl.owlCarousel({
        stagePadding: 2,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        loop:true,
        margin:20,
        autoPlay: 5000,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },

            992:{
                items:2
            },

            1200:{
                items:3
            }
        }
    })

    $(".next").click(function(){
        owl.trigger('next.owl.carousel');
    })
    $(".prev").click(function(){
        owl.trigger('prev.owl.carousel');
    })
});


// ====================== Tooltips Call =======================================
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});


$(document).ready(function(){
    $('.item-remover').on('click',function(){
        $(this).parent('li').remove();
    });
});

$(document).ready(function(){
    $('.cart-item-remover').on('click',function(){
        $(this).parents('.cart-item').remove();
    });
});


$(document).ready(function(){
    $('.topbar-compare-clear').on('click',function(){
        $('.compare-drop').find('.topbar-compare-item').remove();
    });
    $('.header-cart-item-remover').on('click',function(){
        $(this).parent('li').remove();
    });
});


$(document).ready(function(){
    $('.sliding-toggler').on('click',function(){
        $('.sliding-box').find('.sliding-item').not($(this).parents('.sliding-box').children('.sliding-item')).slideUp();
        $(this).parents('.sliding-box').find('.sliding-item').stop().slideToggle();
        
        $('.sliding-toggler').not(this).children('i').stop().removeClass('fa-angle-up');
        $('.sliding-toggler').not(this).children('i').stop().addClass('fa-angle-down');
        $(this).children('i').stop().toggleClass('fa-angle-down fa-angle-up');
    });
});


$(document).ready(function(){
    $('.collapsible-toggler').on('click',function(){
        $(this).parents('.collapse-toggle-box').find('.collapsible-item').stop().slideToggle(300);
        $(this).children('i').stop().toggleClass('fa-angle-down fa-angle-up');
    });
});

$(document).ready(function(){
    $('.toggle-item').stop().hide();
    $('.toggler').on('click',function(){
        $(this).parents('.toggle-box').find('.toggle-item').stop().slideToggle(300);
        $(this).children('i').stop().toggleClass('fa-angle-down fa-angle-up');
    });
});





// ========= Primary Search box ==================
$('.primary-search-box-toggler').on('click', function(){
    $('.primary-search-box').stop().toggleClass('active');
});


$('.menubar-menu ul li').on('click', function(){
    $('.menubar-menu ul li').not(this).removeClass('active');
    $(this).addClass('active');
});






// ============== Img Full Screen ==================
// $(document).ready(function() {
//     $('.fullscreen').on('click', function() {

//         if($(this).siblings('.img-fullscreen').length <= 0){
//             $(this).parent().append('<div class="img-fullscreen"></div>');
//         };

//         if($('.img-fullscreen').children('img').length <= 0){
//             $(this).clone().appendTo('.img-fullscreen');
//         };

//         $(this).siblings('.img-fullscreen').toggleClass('zoom');

//         $('body').addClass('window-overflow');
//     });
//     $(document).on('click','.zoom', function() {
//         $('.zoom').remove();
//         $('body').removeClass('window-overflow');
//     });
// });


// ================ Load more ==============
$(document).ready(function(){

    var list = $(".category-menu-list > li");
    var numToShow = 13;
    var numInList = list.length;
    list.hide();
    list.slice(0, numToShow).show();

    $(document).on("click", ".all-load", function() {
        if (numToShow <  numInList) {
            list.fadeIn();
            $(this).stop().toggleClass("hide-more all-load");
            $(this).children("span").text("Hide More");
            $(this).children("i").stop().toggleClass("fa-caret-down fa-caret-up");
        }
    });

    $(document).on("click", ".hide-more", function() {
        list.hide();
        list.slice(0, numToShow).show();
        $(this).stop().toggleClass("hide-more all-load");
        $(this).children("span").text("Show More");
        $(this).children("i").stop().toggleClass("fa-caret-down fa-caret-up");
    });

});






// ===================     Mobail Category Toggler ===================
$(document).ready(function() {

    $(document).on('click','.mobail-category-toggler', function() {
        $('body').stop().toggleClass('mobail-body');
        $('.category-box').stop().toggleClass('category-toggle');
    });

    $(document).on('click','.sm-category-toggler', function() {
        $('body').removeClass('mobail-body');
        $('.category-box').removeClass('category-toggle');
    });



    $(document).on('click','.mobail-filter-panel-toggler', function() {
        $('body').addClass('mobail-body');
        $('.filter-panel').addClass('active');
    });

    $(document).on('click','.mobail-filter-panel-remover', function() {
        $('body').removeClass('mobail-body');
        $('.filter-panel').removeClass('active');
    });

});











$(document).ready(function() {
    $(".nicescroll").niceScroll({
        cursorborder:"",
        cursorcolor:"#FF3366"
    });
});



$(document).ready(function() {

    $(".cute-check input[type='checkbox']:checked").hide();
    $(".cute-check input[type='checkbox']:checked").parent('label').addClass('cute-checkbox');

    $(".cute-check input[type='checkbox']").change(function() {
        if($(this).is(':checked')){
            $(this).hide();
            $(this).parent('label').addClass('cute-checkbox');
        }
        else{
           $(this).parent('label').removeClass('cute-checkbox');
           $(this).show();
        }
    });
});



$(document).ready(function() {

    $('.member-login').hide();

    if($('.member-area').is(':checked')){
        $('.member-login').show();
    }else{
        $('.member-login').hide();
    }

    $('input[type="radio"]').on('change', function() {
        if($('.member-area').is(':checked')){
            $('.member-login').show();
        }
        else{
           $('.member-login').hide();
        }
    });
});





// ===================== Quantity Number ====================
$(document).ready(function(){
    var incrementPlus;
    var incrementMinus;

    var buttonPlus  = $(".cart-qty-plus");
    var buttonMinus = $(".cart-qty-minus");

    var incrementPlus = buttonPlus.click(function() {
        var $n = $(this)
            .parents(".quantity-box")
            .find(".quantity");
        $n.val(Number($n.val())+1 );
    });

    var incrementMinus = buttonMinus.click(function() {
            var $n = $(this)
            .parents(".quantity-box")
            .find(".quantity");
        var amount = Number($n.val());
        if (amount > 1) {
            $n.val(amount-1);
        }
    });

    $('.quantity-box input').keyup(function(){
      if ($(this).val() < 1){
        $(this).val('1');
      }
    });
});



$('.cart-item-remover').on('click',function(){
    $(this).parents('.cart-item').remove();
});

$('.t-item-remove').on('click',function(){
    $(this).parents('.t-item').remove();
});





$('.Sub-img-box ul > li').find("img").hover(function(){
    var $src = $(this).attr('src');
    $('.primary-img-box img').attr('src', $src);
});

$('.Sub-img-box ul > li').hover(function(){
    $('.Sub-img-box ul > li').not(this).removeClass('active');
    $(this).addClass('active');
});

$('.primary-img-box').on('mousemove', function(e){
    $(this).children('img').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
});