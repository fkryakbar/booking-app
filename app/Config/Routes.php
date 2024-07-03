<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::loginPage');
$routes->post('/login', 'Home::loginAttempt');
$routes->get('/register', 'Home::registerPage');
$routes->post('/register', 'Home::registerPage');
$routes->get('/logout', 'Home::logout');

$routes->group('', ['filter' => 'adminOnly'], function ($routes) {
    $routes->get('admin/paket', 'AdminPaketController::index');
    $routes->post('admin/paket', 'AdminPaketController::create');
    $routes->get('admin/paket/(:segment)/delete', 'AdminPaketController::delete/$1');
    $routes->get('admin/paket/(:segment)', 'AdminPaketController::editPage/$1');
    $routes->post('admin/paket/(:segment)', 'AdminPaketController::update/$1');

    $routes->get('admin/tipe', 'AdminTipeController::index');
    $routes->post('admin/tipe', 'AdminTipeController::create');
    $routes->get('admin/tipe/(:segment)/delete', 'AdminTipeController::delete/$1');
    $routes->get('admin/tipe/(:segment)', 'AdminTipeController::editPage/$1');
    $routes->post('admin/tipe/(:segment)', 'AdminTipeController::update/$1');


    $routes->get('admin/akun', 'AdminController::settings');
});
$routes->group('', ['filter' => 'customerOnly'], function ($routes) {
    $routes->get('dashboard/booking', 'BookingController::index');
    $routes->post('dashboard/booking', 'BookingController::create');
    $routes->get('dashboard/booking/(:segment)', 'BookingController::upload/$1');
    $routes->post('dashboard/booking/(:segment)', 'BookingController::uploadPost/$1');
    $routes->get('dashboard/booking/(:segment)/cetak', 'BookingController::cetak/$1');
});
