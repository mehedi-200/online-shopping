
// 1 this section start here
$(document).ready(function(){
    $('#upBtn1').click(function(){
        $('#coverInput').click();
        $('.cover2buttons').removeClass('cover3buttons');
    })
})

//1 section end here//

// 2 number section start // reposition cover image

function getCurrentTopValue() {
    let topValue = $('#coverImage').css('top'); // e.g., '50px'
    return Math.abs(parseFloat(topValue)); // Convert to number and get absolute value
}

$(document).ready(function () {
    let dragging = false;
    let offsetY;
    const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent) || window.innerWidth <= 768;

    $('#reposition').click(function () {
        $('#reposition_save_cancel').css('display', 'block');
        alert('After clicking the reposition button, you have to press on this cover image to make changes');

        if (isMobile) {
            $('#coverImage').on('touchstart', function (e) {
                dragging = true;
                offsetY = e.touches[0].clientY - $(this).offset().top;
            });

            $('#coverImage').on('touchmove', function (e) {
                if (dragging) {
                    e.preventDefault(); // Prevent scrolling
                    $(this).css({
                        'top': (e.touches[0].clientY - offsetY) + 'px'
                    });
                }
            });

            $('#coverImage').on('touchend', function () {
                dragging = false;
                let currentTop = getCurrentTopValue();
            });
        } else {
            $('#coverImage').on('mousedown', function (e) {
                dragging = true;
                offsetY = e.clientY - $(this).offset().top;
            });

            $(document).on('mousemove', function (e) {
                if (dragging) {
                    $('#coverImage').css({
                        'top': (e.clientY - offsetY) + 'px'
                    });
                }
            });

            $(document).on('mouseup', function () {
                dragging = false;
                let currentTop = getCurrentTopValue();
            });
        }
    });
});
// 2 number section end


// 3 number section start upload image position value
$(document).ready(function (){
    var id = $('#authUserIdForCoverImage').val();
    var image_id = $('#coverImage').data('coverid') ;
    var base_url = $('#base_url').val();

    $('#saveNewPosition').click(function (){
        let topValue = getCurrentTopValue();
        $.ajax({
            type:'GET',
            url:base_url+'/admin/profile/cover-reposition/'+id+'/'+image_id+'/'+topValue,
            success:function (){
                location.reload();
            },
            error:function (){
                alert('error');
            }
        })
    });


});

// 3 number section end





// 4 number section start upload cover image
$(document).on("change", "#form2Id", function (e) {

    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    const formData = new FormData(form[0]);

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function (info) {
            console.log("Form successfully submitted");
            // please add code here when form successfully summitted.
            location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
// 4 number section end






// 5 number section start
$('#cancel_reposition_button').click(function (){
    $('#reposition_save_cancel').css({
        'display':'none',
    });

});
// 5 number section end



// 6 number section start

$('#seeAll').click(function (){
    $(this).css({
        'display':'none',
    });
    $('#closeAll').css({
        'display':'block',
    });
    $('#seeAll_photos_block').css({
        'height':'auto',
    })
});
$('#closeAll').click(function (){
    $(this).css({
        'display':'none',
    });
    $('#seeAll').css({
        'display':'block',
    });
    $('#seeAll_photos_block').css({
        'height':'430px',
    })
});
// 6 number section end








// 7 number section start

document.querySelector('#profileButton').addEventListener('click',function(){
    document.getElementById('profileInput').click();
});
document.querySelector('#upload').addEventListener('click',function(){
    document.getElementById('coverInput').click();
})
$(document).ready(function(){
    $('#coverButton').click(function(){
        $('.cover2buttons').toggleClass('cover3buttons')
    });
});

// 7 number section end


// 8 number section start

$(document).ready(function(){
    $('#upBtn1').click(function(){
        $('#coverInput').click();
        $('.cover2buttons').removeClass('cover3buttons');
    });
});

// 8 number section end


// 9 number section start
$('#resize_profile_image_d_none_btn').click(
    function (){
        $('#resize_profile_image').addClass('d-none');

    }
);
// 9 number section end
