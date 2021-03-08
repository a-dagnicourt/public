<?php
require '../vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../src/View');
$twig = new Twig\Environment($loader);

$products = ['product1', 'product2', 'product3', 'product4', 'product5'];

// echo $twig->render('hello.html.twig', array(
//     'name' => 'Jean',
//     'age' => 42
// ));

echo $twig->render('base.html.twig', ['products' => $products]);
