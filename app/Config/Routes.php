<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/register', 'Register::index'); //register
$routes->post('/login', 'Login::index'); //login
$routes->get('/todolist', 'Todolist::index'); //menampilkan semua data todolist user yang login
$routes->get('/todolist/today', 'Todolist::today'); //menampilkan data todolist hari ini user yang login 
$routes->get('/todolist/todo', 'Todolist::todo'); //menampilkan data todolist yang belum dikerjakan hari ini
$routes->get('/todolist/overdue', 'Todolist::overdue'); //menampilkan data todolist yang sudah lewat dari waktu sekarang
$routes->get('/todolist/done', 'Todolist::done'); //menampilkan data yang sudah ditandai selesai
$routes->put('/todolist/markasdone/(:num)', 'Todolist::markasdone/$1'); //menandai todolist sudah selesai menggunakan put
$routes->patch('/todolist/markasdone/(:num)', 'Todolist::markasdone/$1'); //menandai todolist sudah selesai menggunakan patch
$routes->post('/todolist/create', 'Todolist::create'); //membuat todolist baru
$routes->put('/todolist/update/(:num)', 'Todolist::update/$1'); //mengedit todolist menggunakan put
$routes->patch('/todolist/update/(:num)', 'Todolist::update/$1'); //mengedit todolist menggunakan patch
$routes->delete('/todolist/delete/(:num)', 'Todolist::delete/$1'); //menghapus todolist
$routes->get('/todolist/stats', 'Todolist::stats'); //menampilkan statistik todolist

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
