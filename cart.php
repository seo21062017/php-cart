<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';

if (isset($_GET['cart'])){
    switch ($_GET['cart']){
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product = get_product($id);
            if (!$product){
                echo json_encode(['code' => 'error', 'answer' => 'Error product']);
           } else{
                add_to_cart($product);
                ob_start();
                require  __DIR__ . '/cart-modal.php';
                $cart = ob_get_clean();
                echo json_encode(['code' => 'ok', 'answer' => $cart]);
            }
            break;

        case 'show':
            require __DIR__. '/cart-modal.php';
            break;


        case 'clear':
            if(!empty($_SESSION['cart'])){
                unset($_SESSION['cart']);
                unset($_SESSION['cart.qty']);
                unset($_SESSION['cart.sum']);
            }
            require __DIR__. '/cart-modal.php';
            break;
    }
}