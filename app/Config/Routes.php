<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Masters');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// Route since we don't have to scan directories.
$routes->get('/', 'Masters::index');

// CRUD RESTful Routes For Masters
$routes->get('masters/list', 'Masters::index');
$routes->get('masters/form', 'Masters::create');
$routes->post('masters/add', 'Masters::store');
$routes->get('masters/edit/(:num)', 'Masters::singleUser/$1');
$routes->post('masters/update', 'Masters::update');
$routes->get('masters/delete/(:num)', 'Masters::delete/$1');



// CRUD RESTful Routes Auctions
$routes->get('auctions/list', 'Auctions::index');
$routes->get('auctions/form', 'Auctions::create');
$routes->post('auctions/add', 'Auctions::store');
$routes->get('auctions/edit/(:num)', 'Auctions::singleAuction/$1');
$routes->post('auctions/update', 'Auctions::update');
$routes->get('auctions/delete/(:num)', 'Auctions::delete/$1');


// CRUD RESTful Routes Buyers
$routes->get('buyers/list', 'Buyers::index');
$routes->get('buyers/form', 'Buyers::create');
$routes->post('buyers/add', 'Buyers::store');
$routes->get('buyers/edit/(:num)', 'Buyers::singleBuyer/$1');
$routes->post('buyers/update', 'Buyers::update');
$routes->get('buyers/delete/(:num)', 'Buyers::delete/$1');
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
