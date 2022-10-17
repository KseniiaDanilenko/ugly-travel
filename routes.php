<?php

require_once(__DIR__.'/router.php');
get('/', 'pages/main.php');
get('/main', 'pages/main.php');
get('/about', 'pages/about.php');
get('/cart', 'pages/cart.php');
get('/checkout', 'pages/checkout.php');
get('/products', 'pages/products.php');
get('/single', 'pages/single.php');
get('/admin', 'pages/admin.php');
get('/admin/delete/$id' , 'store/deleteproduct.php');
get('/checkout/$result' , 'store/deleteproduct.php');

post('/addproduct', 'store/addproduct.php');
post('/deleteproduct' , 'store/deleteproduct.php');
post('/changeproduct' , 'store/changeproduct.php');
post('/order' , 'store/order.php');
any('/404','pages/404.php');