<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/categories', 'Home::category');
$routes->get('/category/(:segment)', 'Home::show/$1');
$routes->get('/services', 'Home::search');

// routes sellers
$routes->get('/seller', 'Seller::index', ['filter' => 'role:Seller']);
$routes->get('/seller/profile', 'Seller::profile', ['filter' => 'role:Seller']);

// routes sellers services
$routes->get('/seller/services', 'SellerService::index', ['filter' => 'role:Seller']);
$routes->get('/seller/services/add', 'SellerService::add', ['filter' => 'role:Seller']);
$routes->post('/seller/services/save', 'SellerService::save', ['filter' => 'role:Seller']);
$routes->get('/seller/services/edit/(:num)', 'SellerService::edit/$1', ['filter' => 'role:Seller']);
$routes->post('/seller/services/update/(:num)', 'SellerService::update/$1', ['filter' => 'role:Seller']);
$routes->delete('/seller/delService/(:num)', 'SellerService::delete/$1', ['filter' => 'role:Seller']);

// routes buyers
$routes->get('/buyer', 'Buyer::index', ['filter' => 'role:Buyer']);
$routes->post('/buyer/profile', 'Buyer::saveProfile', ['filter' => 'role:Buyer']);

// routes admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:Admin']);

// routes admin categories
$routes->get('/admin/categories', 'Categories::index', ['filter' => 'role:Admin']);
$routes->post('/admin/categories', 'Categories::save', ['filter' => 'role:Admin']);
$routes->post('/admin/categories/update', 'Categories::update', ['filter' => 'role:Admin']);
$routes->delete('/admin/categories/delete/(:num)', 'Categories::delete/$1', ['filter' => 'role:Admin']);

// routes admin manage sellers
$routes->get('/admin/sellers', 'ManageSellers::index', ['filter' => 'role:Admin']);
$routes->get('/admin/sellers/detail/(:segment)', 'ManageSellers::detail/$1', ['filter' => 'role:Admin']);

// routes admin manage buyers
$routes->get('/admin/buyers', 'ManageBuyers::index', ['filter' => 'role:Admin']);
