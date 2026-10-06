<?php

namespace Config;

// CRITICAL FIX: Explicitly reference the fully qualified namespace for the Services class
$routes = \Config\Services::routes();

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// --- Public Access Routes ---
$routes->get('migrate-db', 'Migrate::index');
$routes->get('/', 'Home::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');

// --- Auth Portal Processing Handlers ---
$routes->get('login', 'Auth::login');
$routes->post('login/authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');

// --- Protected CRUD Management Routes ---
$routes->group('tasks', ['filter' => 'auth'], function($routes) {
    $routes->get('new', 'Tasks::new');
    $routes->post('create', 'Tasks::create');
    $routes->get('edit/(:num)', 'Tasks::edit/$1');
    $routes->post('update/(:num)', 'Tasks::update/$1');
    $routes->get('delete/(:num)', 'Tasks::delete/$1'); // Processes Soft Deletion
});
