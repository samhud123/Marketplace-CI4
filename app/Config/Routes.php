<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/categories', 'Home::category');
$routes->get('/category/(:segment)', 'Home::show/$1');
$routes->get('/services', 'Home::search');
$routes->get('/services/detail/(:num)', 'Home::detail/$1');
$routes->get('/order', 'Home::order', ['filter' => 'role:Buyer']);
$routes->post('/order', 'Home::attemptOrder', ['filter' => 'role:Buyer']);

// routes sellers
$routes->get('/seller', 'Seller::index', ['filter' => 'role:Seller']);
$routes->get('/seller/profile', 'Seller::profile', ['filter' => 'role:Seller']);
$routes->post('/seller/profile', 'Seller::updateProfile', ['filter' => 'role:Seller']);
$routes->post('/seller/profile/photo', 'Seller::photo', ['filter' => 'role:Seller']);

// routes sellers services
$routes->get('/seller/services', 'SellerService::index', ['filter' => 'role:Seller']);
$routes->get('/seller/services/add', 'SellerService::add', ['filter' => 'role:Seller']);
$routes->post('/seller/services/save', 'SellerService::save', ['filter' => 'role:Seller']);
$routes->get('/seller/services/edit/(:num)', 'SellerService::edit/$1', ['filter' => 'role:Seller']);
$routes->post('/seller/services/update/(:num)', 'SellerService::update/$1', ['filter' => 'role:Seller']);
$routes->delete('/seller/delService/(:num)', 'SellerService::delete/$1', ['filter' => 'role:Seller']);

// routes sellers orders
$routes->get('/seller/orders', 'SellerOrders::index', ['filter' => 'role:Seller']);
$routes->get('/seller/orders/invoice/(:num)', 'SellerOrders::invoice/$1', ['filter' => 'role:Seller']);
$routes->get('/seller/orders/detail/(:num)', 'SellerOrders::detail/$1', ['filter' => 'role:Seller']);
$routes->post('/seller/orders/price', 'SellerOrders::price', ['filter' => 'role:Seller']);
$routes->get('/seller/orders/reject/(:num)', 'SellerOrders::reject/$1', ['filter' => 'role:Seller']);

// routes sellers history
$routes->get('/seller/history', 'SellerHistory::index', ['filter' => 'role:Seller']);
$routes->get('/seller/history/detail/(:num)', 'SellerHistory::detail/$1', ['filter' => 'role:Seller']);
$routes->get('/seller/history/search', 'SellerHistory::search', ['filter' => 'role:Seller']);
$routes->get('/seller/history/test', 'SellerHistory::test', ['filter' => 'role:Seller']);

// routes buyers
$routes->get('/buyer', 'Buyer::index', ['filter' => 'role:Buyer']);
$routes->post('/buyer/profile', 'Buyer::saveProfile', ['filter' => 'role:Buyer']);
$routes->post('/buyer/updateFoto', 'Buyer::updateFoto', ['filter' => 'role:Buyer']);
$routes->get('/buyer/order', 'Buyer::order', ['filter' => 'role:Buyer']);
$routes->get('/buyer/order/datail/(:num)', 'Buyer::detail/$1', ['filter' => 'role:Buyer']);
$routes->get('/buyer/order/invoice/(:num)', 'Buyer::invoice/$1', ['filter' => 'role:Buyer']);
$routes->post('/buyer/order/payment/(:num)', 'Buyer::payment/$1', ['filter' => 'role:Buyer']);
$routes->post('/buyer/order/confirm/(:num)', 'Buyer::confirm/$1', ['filter' => 'role:Buyer']);
$routes->get('/buyer/order/cancel/(:num)', 'Buyer::cancel/$1', ['filter' => 'role:Buyer']);
$routes->get('/buyer/order/finish/(:num)', 'Buyer::finish/$1', ['filter' => 'role:Buyer']);

$routes->get('/buyer/history', 'BuyerHistory::index', ['filter' => 'role:Buyer']);
$routes->get('/buyer/history/detail/(:num)', 'BuyerHistory::detail/$1', ['filter' => 'role:Buyer']);
$routes->get('/buyer/history/comment/(:num)', 'BuyerHistory::comment/$1', ['filter' => 'role:Buyer']);
$routes->post('/buyer/history/comment/', 'BuyerHistory::create_comment', ['filter' => 'role:Buyer']);

// routes admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/admin/profile', 'Admin::profile', ['filter' => 'role:Admin']);
$routes->post('/admin/profile', 'Admin::updateProfile', ['filter' => 'role:Admin']);
$routes->post('/admin/profile/photo', 'Admin::photo', ['filter' => 'role:Admin']);

// routes admin categories
$routes->get('/admin/categories', 'Categories::index', ['filter' => 'role:Admin']);
$routes->post('/admin/categories', 'Categories::save', ['filter' => 'role:Admin']);
$routes->post('/admin/categories/update', 'Categories::update', ['filter' => 'role:Admin']);
$routes->delete('/admin/categories/delete/(:num)', 'Categories::delete/$1', ['filter' => 'role:Admin']);

// routes admin manage sellers
$routes->get('/admin/sellers', 'ManageSellers::index', ['filter' => 'role:Admin']);
$routes->get('/admin/sellers/disabled/(:num)', 'ManageSellers::disabled/$1', ['filter' => 'role:Admin']);
$routes->get('/admin/sellers/enabled/(:num)', 'ManageSellers::enabled/$1', ['filter' => 'role:Admin']);
$routes->get('/admin/sellers/detail/(:segment)', 'ManageSellers::detail/$1', ['filter' => 'role:Admin']);

// routes admin manage buyers
$routes->get('/admin/buyers', 'ManageBuyers::index', ['filter' => 'role:Admin']);
$routes->get('/admin/buyers/detail/(:segment)', 'ManageBuyers::detail/$1', ['filter' => 'role:Admin']);
$routes->get('/admin/buyers/disabled/(:num)', 'ManageBuyers::disabled/$1', ['filter' => 'role:Admin']);
$routes->get('/admin/buyers/enabled/(:num)', 'ManageBuyers::enabled/$1', ['filter' => 'role:Admin']);

// routes admin reports
$routes->get('/admin/reports', 'AdminReports::index', ['filter' => 'role:Admin']);
$routes->get('/admin/reports/search', 'AdminReports::search', ['filter' => 'role:Admin']);
$routes->get('/admin/reports/detail/(:num)', 'AdminReports::detail/$1', ['filter' => 'role:Admin']);
