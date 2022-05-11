<?php
function debug($data): void
{
    echo '<pre>' .  print_r($data, 1) . '</pre>';
}

function get_products() : array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM products");
    return $res->fetchAll();
}

function get_product(int $id): array
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM products where id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

 function add_to_cart ($product): void
 {
     if(isset($_SESSION['cart'][$product['id']])){
         $_SESSION['cart'][$product['id']]['qty'] +=1;
     } else {
         $_SESSION['cart'][$product['id']] = [
             'title' => $product['title'],
             'slug' => $product['slug'],
             'price' => $product['price'],
             'qty' => 1,
             'img' => $product['img'],
         ];
     }

     $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
     $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : 1;

 }