// ====== Dark Mode On Change ==========
$('#darkMode').on('change', function () {
    if ($(this).is(':checked')){
        localStorage.setItem('mode-type', 'dark-mode');
        $('body').addClass('dark-mode');
    } else {
        $('body').removeClass('dark-mode');
        localStorage.removeItem('mode-type');
    }
});

if (localStorage.getItem('mode-type') === 'dark-mode')
{
    $('#darkMode').prop('checked', true);
    $('body').addClass('dark-mode');
} else {
    $('#darkMode').prop('checked', false);
    $('body').removeClass('dark-mode');
}








// ========= For Set Perfect height and position of aside and body content ==============
var getNavHeight = 0;
getNavHeight = $('#wrappingNav').outerHeight();
$('#wrappingAside').css({
    'height': 'calc(100% - '+ getNavHeight + 'px' + ')',
    'top':  getNavHeight + 'px',
});
$('#wrappingBody').css({'top':  getNavHeight + 'px'});

// alert(getNavHeight);

// $(window).resize(function () {
//     getNavHeight = $('#wrappingNav').outerHeight();
// });

// console.log(getNavHeight);

// =========== Panel Wrapping ============
$('.make-resize').on('click', function (e) {
    e.preventDefault();
    $('body').stop().toggleClass('resize-wrapper');

    if ($(window).width() < 992)
    {
        $('.panel-wrapper').stop().toggleClass('wrapping-show')
    }
});

// ======== Click Toggle Item =============
$('.toggler').on('click', function (e) {
    e.preventDefault();
    $(this).stop().toggleClass('active');
    $(this).parents('.toggle-item').find('.toggleable-content').stop().slideToggle(300).queue(function () {
        $(this).toggleClass('show').dequeue();
    });
});


// ======= Nice Scroll ========
// if ($('.nice-scroll').length > 0)
// {
//     $('.nice-scroll').niceScroll();
// }
//
// // ===== Tooltip ======
// if ($('[data-bs-toggle="tooltip"]').length > 0) {
//     $('[data-bs-toggle="tooltip"]').tooltip();
// }


