jQuery.noConflict();
jQuery(document).ready(function ($) {


    function lightboxPhoto() {

        jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({
            animationSpeed: 'fast',
            slideshow: 5000,
            theme: 'light_rounded',
            show_title: false,
            overlay_gallery: false
        });

    }

    if (jQuery().prettyPhoto) {

        lightboxPhoto();

    }


    if (jQuery().quicksand) {

        // Clone applications to get a second collection
        var $data = $(".portfolio-area").clone();

        //NOTE: Only filter on the main portfolio page, not on the subcategory pages
        $('.portfolio-categ li').click(function (e) {
            $(".filter li").removeClass("active");
            // Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
            var filterClass = $(this).attr('class').split(' ').slice(-1)[0];

            if (filterClass == 'all') {
                var $filteredData = $data.find('.portfolio-item2');
            } else {
                var $filteredData = $data.find('.portfolio-item2[data-type=' + filterClass + ']');
            }
            $(".portfolio-area").quicksand($filteredData, {
                duration: 600,
                adjustHeight: 'auto'
            }, function () {

                lightboxPhoto();
            });
            $(this).addClass("active");
            return false;
        });

    }//if quicksand

});
$('.btn_open_btn_cart').click(function () {
    var id = $(this).data('id');
    var product_name = $(this).data('name');
    var product_price = $(this).data('price');
    var product_size = $(this).data('size');
    var product_color = $(this).data('color');
    var product_brand = $(this).data('brand');
    var product_image = $(this).data('image');

    $.ajax({
        type: "POST",
        url: "ShoppingCart/addproduct",
        data: {product_id: id, product_name: product_name, product_price: product_price, product_size: product_size, product_color: product_color, product_brand: product_brand, product_image: product_image}
    }).done(function () {
        window.scrollTo(0, 0);
        $('#minicart_dropdown').load('Home/index #minicart_dropdown');
        $('#btn_total_cart').load('Home/index #btn_total_cart');
        $('#cart_dropdown').css('display', 'block');
    });
});

$('.delete_product_cart').click(function () {
    var cart_id = $(this).data('id');
    $.ajax({
        type: "POST",
        url: "https://localhost/jhshop/ShoppingCart/removeproduct",
        data: {cart_id: cart_id}
    }).done(function () {
        window.location.href = 'https://localhost/jhshop/';
    });
});

$('.delete_product_cart_checkout').click(function () {
    var cart_id = $(this).data('id');
    $.ajax({
        type: "POST",
        url: "https://localhost/jhshop/ShoppingCart/removeproduct",
        data: {cart_id: cart_id}
    }).done(function () {
        window.location.href = 'https://localhost/jhshop/ShoppingCart/checkout';
    });
});

$(document).ready(function () {
    $('input[name="Qty').change(function () {
        var quantity = $(this).val();
        var cart_id = $(this).data('cart-id');
        $.ajax({
            url: 'https://localhost/jhshop/ShoppingCart/changequantity',
            type: "POST",
            data: {quantity: quantity, cart_id: cart_id},
            success: function () {
                window.location.href = 'https://localhost/jhshop/ShoppingCart/checkout';
            }
        });
    });
});

$('.confirm-cart').click(function () {
    $('.shopping-cart').css('opacity', '0.10');
    $('.confirm-cart').prop('disabled', true);
    if ($('.confirm-address').prop('disabled')) {
        $('.go_methods').prop('disabled', false);
    }
    $('input[name="Qty').prop('disabled', true);
    $('.delete_product_cart_checkout').prop('disabled', true);
    $('.confirmed_div-cart').css('display', 'block');
    $('.shopping-cart').css('cursor', 'not-allowed');
    $('.confirm').css('cursor', 'not-allowed');
    $('.confirm-cart').css('cursor', 'not-allowed');
    $('input[name="Qty').css('cursor', 'not-allowed');
    $('.delete_product_cart_checkout').css('cursor', 'not-allowed');
    $("#progressbar #delivery_data_bar").addClass("active");
});

$('.confirm-address').click(function () {
    var user_address = $('#inputAddress').val();
    var user_place = $('#inputPlace').val();
    var user_postal_code1 = $('#inputZip1').val();
    var user_postal_code2 = $('#inputZip2').val();
    var user_nif = $('#inputNIF').val();
    var user_phone = $('#inputPhone').val();
    if (user_address !== '' && user_place !== '' && user_postal_code1 !== '' && user_postal_code2 !== '' && user_nif !== '' && user_phone !== '') {
        $.ajax({
            url: 'https://localhost/jhshop/login/updateaccount',
            type: "POST",
            data: {user_address: user_address, user_place: user_place, user_postal_code1: user_postal_code1, user_postal_code2: user_postal_code2, user_nif: user_nif, user_phone: user_phone},
            success: function () {
                $('.adress-details').css('opacity', '0.10');
                $('.confirm-address').prop('disabled', true);
                $('.confirmed_div-address').css('display', 'block');
                if ($('.confirm-cart').prop('disabled')) {
                    $('.go_methods').prop('disabled', false);
                }
                $('.confirmed_div-address').css('display', 'block');
                $('#inputAddress').css('cursor', 'not-allowed');
                $('#inputPlace').css('cursor', 'not-allowed');
                $('#inputZip1').css('cursor', 'not-allowed');
                $('#inputZip2').css('cursor', 'not-allowed');
                $('#inputNIF').css('cursor', 'not-allowed');
                $('#inputPhone').css('cursor', 'not-allowed');
                $('.confirm-address').css('cursor', 'not-allowed');

            }
        });
    }
});

$('.go_methods').click(function () {
    window.location.href = 'https://localhost/jhshop/ShoppingCart/checkout_delivery_payment';
});

$('.confirm-methods-delivery').click(function () {
    var total_cart = $('.go_complete_btn2').val();
    var price_delivery = null;
    var soma = null;
    if ($('#cobranca_delivery').is(':checked') || $('#ctt_delivery').is(':checked') || $('#dhl_delivery').is(':checked')) {
        $('.method_delivery').css('opacity', '0.10');
        $('.confirm-methods-delivery').prop('disabled', true);
        $('.confirmed_div-methods-delivery').css('display', 'block');
        if ($('.confirm-methods-payment').prop('disabled')) {
            $('.go_complete_btn1').prop('disabled', false);
        }
        $('.confirm-methods-delivery').css('cursor', 'not-allowed');
        $('#cobranca_delivery').css('cursor', 'not-allowed');
        $('#ctt_delivery').css('cursor', 'not-allowed');
        $('#dhl_delivery').css('cursor', 'not-allowed');
        $("#progressbar #payment_method_bar").addClass("active");
    }
    if ($('#cobranca_delivery').is(':checked')) {
        price_delivery = $('#cobranca_delivery').val();
        soma = parseFloat(total_cart) + parseFloat(price_delivery);
        $('.go_complete_btn2').val(soma.toFixed(2));
        $('.go_complete_btn1').val('Efetuar Pagamento ' + soma.toFixed(2) + '€');
    } else if ($('#ctt_delivery').is(':checked')) {
        price_delivery = $('#ctt_delivery').val();
        soma = parseFloat(total_cart) + parseFloat(price_delivery);
        $('.go_complete_btn2').val(soma.toFixed(2));
        $('.go_complete_btn1').val('Efetuar Pagamento ' + soma.toFixed(2) + '€');
    } else {
        price_delivery = $('#dhl_delivery').val();
        soma = parseFloat(total_cart) + parseFloat(price_delivery);
        $('.go_complete_btn2').val(soma.toFixed(2));
        $('.go_complete_btn1').val('Efetuar Pagamento ' + soma.toFixed(2) + '€');
    }
});

$('.confirm-methods-payment').click(function () {
    $('.method_payment').css('opacity', '0.10');
    $('.confirm-methods-payment').prop('disabled', true);
    $('.confirmed_div-methods-payment').css('display', 'block');
    if ($('.confirm-methods-delivery').prop('disabled')) {
        $('.go_complete_btn1').prop('disabled', false);
    }
    $('.confirm-methods-payment').css('cursor', 'not-allowed');
    $('#cobranca_payment').css('cursor', 'not-allowed');
    $('#visa_master').css('cursor', 'not-allowed');
    $('#paypal').css('cursor', 'not-allowed');
    $('#amex').css('cursor', 'not-allowed');
    $('#inputPhone').css('cursor', 'not-allowed');
    $('.confirm-address').css('cursor', 'not-allowed');
});

$('.go_back').click(function () {
    window.location.href = 'javascript:history.go(-1)';
});

$('.go_complete_btn1').click(function () {
    var total_price = $('.go_complete_btn2').val();
    var type_delivery = null;
    var type_payment = null;

    if ($('#cobranca_delivery').is(':checked')) {
        type_delivery = "Cobrança";
    } else if ($('#ctt_delivery').is(':checked')) {
        type_delivery = "CTT Express";
    } else {
        type_delivery = "DHL Express";
    }
    if ($('#cobranca_payment').is(':checked')) {
        type_payment = "Cobrança";
    } else if ($('#visa_master').is(':checked')) {
        type_payment = "Cartão de Crédito";
    } else if ($('#paypal').is(':checked')) {
        type_payment = "Paypal";
    } else {
        type_payment = "American Express";
    }

    $.ajax({
        type: "POST",
        url: "https://localhost/jhshop/ShoppingCart/purchase",
        data: {total_price: total_price, type_delivery: type_delivery, type_payment: type_payment}
    }).done(function () {
        window.location.href = 'https://localhost/jhshop/ShoppingCart/confirm_order';
    });
});

function printContent(el) {
    $('.no_impress').css('display', 'none');
    var restorepage = $('body').html();
    var printcontent = $('#' + el).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
    $('.no_impress').css('display', 'block');

}




