<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// $routes->get('login', 'FaqRedirectController::login');
// $routes->post('login', 'FaqRedirectController::login');
// $routes->get('logout', 'FaqRedirectController::logout');

$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});

$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);

$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);

$routes->get('profile', 'Home::profile', ['filter' => 'auth']);
$routes->get('faq', 'Home::faq', ['filter' => 'auth']);
$routes->get('contact', 'Home::contact', ['filter' => 'auth']);
$routes->get('admin/logout', 'AuthController::logout');


$routes->group('diskon', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'DiskonController::index');
    $routes->post('', 'DiskonController::create');
    // $routes->post('update/(:num)', 'DiskonController::update/$1');
    $routes->post('edit/(:any)', 'DiskonController::edit/$1');
    $routes->get('delete/(:any)', 'DiskonController::delete/$1');
});

$routes->resource('api', ['controller' => 'apiController']);


