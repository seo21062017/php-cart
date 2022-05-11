$(function() {


    function showCart(cart){
        $('#cart-modal .modal-cart-content').html(cart);
        $('#cart-modal').modal();

        let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
      //  alert(cartQty);
        $('.mini-cart-qty').text(cartQty);
    }




    $('.card-add-to-cart').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr("data-id");
console.log(id);
        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'add', id: id},
            dataType: 'json',
            success: function(res) {
                if (res.code == 'ok'){
                    showCart(res.answer);
                } else {
                    console.log(res.answer);
                }
            },
            error: function (res){
                console.log(res);
            }
        })
    })


    $('#get-cart').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'show'},
            success: function(res) {

                    showCart(res);

            },
            error: function (res){
                console.log(res);
            }
        })
    })



    $('#cart-modal .modal-cart-content').on('click', '#clear-cart', function() {


        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'clear'},
            success: function(res) {

                showCart(res);

            },
            error: function (res){
                console.log(res);
            }
        })
    })



















});