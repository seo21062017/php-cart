<?php
$a = 'boolean';
switch ($a) {
    case 'boolean':
        echo 'boolean';
        break;

    case 'integer':
        echo 'integer';
        break;
}

$arr = array(
    'a1' => 1,
    'a2' => 2,
    'a3' => 3,
    'a4' => 4,
    'a5' => array(
        'b1' => 1,
        'b2' => 2,
        'b3' => 3,
        'b4' => 4,
        'b5' => array(
            'c1' => 1,
            'c2' => 2,
            'c3' => 'dfvdvdv'
        )
    )
);



$arr2 = array(

    'a5' => array(

        'b5' => array(

            'c3' => 'dfvdvdv6546454656645'
        )
    )
);







function debug($message) {
    echo '<pre>' .  print_r($message, 1) . '</pre>';
}

debug($arr2);

debug($arr2['a5']['b5']['c3']);