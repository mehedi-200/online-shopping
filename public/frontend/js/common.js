$(document).on("click", ".product-like-unlike", function () {
    var id = $(this).data('id');
    var base_url = $("#base_url").val();
    $.ajax({
        type: 'GET',
        url: base_url + '/product-like-unlike/' + id,
        success: function (data) {
            if (data.status === 404) {
                alert(data.message);
            }

            if (data.status === 200) {

                if (data.result === 'unlike') {
                    $('.product-' + id).removeClass('active');
                }
                if (data.result === 'like') {
                    $('.product-' + id).addClass('active');
                }
            }
        }
    });
});

$(document).on('dblclick','.click-product-like-unlike',function (){
     var id = $(this).data('id');
     var base_url = $("#base_url").val();
            $.ajax({
                type: 'GET',
                url: base_url + '/product-like-unlike/' + id,
                success: function (data) {
                    if (data.status === 404) {
                        alert(data.message);
                    }

                    if (data.status === 200) {

                        if (data.result === 'unlike') {
                            $('.product-' + id).removeClass('active');
                        }
                        if (data.result === 'like') {
                            $('.product-' + id).addClass('active');
                        }
                    }
                }
            });
});
// like function above below function


$(document).on('click', '.add-to-card', function () {
    var slug = $(this).data('slug');
    var qty = $(this).data('qty');
    var base_url = $('#base_url').val();
    $.ajax({
        type: 'GET',
        url: base_url + '/add-to-card/' + slug + '/' + qty,
        success: function (response) {
            if(response.status === 404)
            {
                alert(404);
            }
            if(response.status === 200)
            {
                $('.card-product'+slug).html(`Purchase Successful`).css({'background':'green'});
                $('#shopping_notification_card_total_price_and_count_on_header').html(response.total_count + ' ' + 'items ' + '- ' +'$'+ response.total_price);
                $('#shopping_notification_card_total_price_on_header').html('$'+response.total_price);
                $('#shopping_notification_card_total_pd_count_only_on_header').html(response.total_count);
                $('#shopping_notification_card_total_pd_count_with_items_only_on_header').html(response.total_count + ' ' + 'items');
                $('#single_pdName_for_shopping_notification').html(
                    response.addToCard.map(cart => {
                        // Check if product exists in the cart item
                        const productName = cart.product ? cart.product.name : 'No name available';
                        const productImage = cart.product ? cart.product.image : 'default.jpg';

                        return `
                                             <li class="header-cart-item item-${cart.product_id}">
                                                 <div class="header-cart-title">
                                                     <a href="#">
                                                        ${productName}
                                                     </a>
                                                     <span>${'$'+cart.total_price}</span>
                                                 </div>
                                                 <div class="header-cart-img">
                                                     <a href="#">
                                                         <img src="/product/${productImage}" alt="${productName}">
                                                     </a>
                                                 </div>
                                                 <a href="javascript:void(0)" data-id="${cart.product_id}" class="header-cart-item-remover text-danger delete-purchase-item">
                                                     <i class="fa fa-times"></i>
                                                 </a>
                                             </li>
                                         `;
                    }).join('') // Join all array elements into a single string
                );

            }
            },
        error:function () {
            alert('error');
        }
    })
});

//delete add to card here//

$(document).on('click','.delete-purchase-item',function () {

        var id = $(this).data('id');
        var base_url = $('#base_url').val();


        $.ajax({
            type: 'GET',
            url: base_url + '/destroy-add-to-card/' + id,
            success: function (response) {
                if(response.status === 404)
                {
                    alert(response.message);
                }
                if(response.status === 200)
                {
                    $(".item-"+id).remove();

                    $('#shopping_notification_card_total_price_and_count_on_header').html(response.total_count + ' ' + 'items ' + '- ' +'$'+ response.total_price);
                    $('#shopping_notification_card_total_price_on_header').html('$'+response.total_price);
                    $('#shopping_card_total_amount').html('$'+response.total_price);
                    $('#shopping_notification_card_total_pd_count_only_on_header').html(response.total_count);
                    $('#shopping_notification_card_total_pd_count_with_items_only_on_header').html(response.total_count + ' ' + 'items');


                }
            },
            error: function () {
                alert('error');

            }
        });
});
 // delete shopping cards page
$(document).on('click','.destroy-purchase-item',function () {

    var id = $(this).data('id');
    var base_url = $('#base_url').val();


    $.ajax({
        type: 'GET',
        url: base_url + '/destroy-add-to-card/' + id,
        success: function (response) {
            if(response.status === 404)
            {
                alert('error product not fount');
            }
            if(response.status === 200)
            {
                $('#shopping_notification_card_total_price_and_count_on_header').html(response.total_count + ' ' + 'items ' + '- ' +'$'+ response.total_price);
                $('#shopping_notification_card_total_price_on_header').html('$'+response.total_price);
                $('#shopping_card_total_amount').html('$'+response.total_price);
                $('#shopping_notification_card_total_pd_count_only_on_header').html(response.total_count);
                $('#shopping_notification_card_total_pd_count_with_items_only_on_header').html(response.total_count + ' ' + 'items');
                $('#single_pdName_for_shopping_notification').html(
                    response.addToCard.map(cart => {
                        // Check if product exists in the cart item
                        const productName = cart.product ? cart.product.name : 'No name available';
                        const productImage = cart.product ? cart.product.image : 'default.jpg';
                        const id = cart.product_id;

                        return `
                                             <li class="header-cart-item">
                                                 <div class="header-cart-title">
                                                     <a href="#">
                                                        ${productName}
                                                     </a>
                                                     <span>${'$'+cart.total_price}</span>
                                                 </div>
                                                 <div class="header-cart-img">
                                                     <a href="#">
                                                         <img src="/product/${productImage}" alt="${productName}">
                                                     </a>
                                                 </div>
                                                 <a href="javascript:void(0)" data-id="${cart.product_id}" class="header-cart-item-remover text-danger">
                                                     <i class="fa fa-times"></i>
                                                 </a>
                                             </li>
                                         `;
                    }).join('') // Join all array elements into a single string
                );

            }
        },
        error: function () {
            alert('error');

        }
    });
});


//increase quantity below//


